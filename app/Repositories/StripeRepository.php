<?php

namespace App\Repositories;

use App\Mail\ClientMakePaymentMail;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class StripeRepository
 */
class StripeRepository
{

    public function clientPaymentSuccess($sessionId)
    {
        setStripeApiKey();
        $sessionData = \Stripe\Checkout\Session::retrieve($sessionId);

        $stripeID = $sessionData->id;
        $paymentStatus = $sessionData->payment_status;
        $amount =  (getCurrencyCode() != 'JPY') ? $sessionData->amount_total / 100 : $sessionData->amount_total;
        $invoiceId = $sessionData->client_reference_id;

        /** @var Invoice $invoice */
        $invoice = Invoice::with(['payments', 'client'])->findOrFail($invoiceId);

        $userId = Auth::check() ? getLogInUserId() : $invoice->client->user_id;

        $transactionData = [
            'transaction_id' => $stripeID,
            'amount'         => $amount,
            'user_id'        => $userId,
            'status'         => $paymentStatus,
            'meta'           => $sessionData->toArray(),
        ];


        try {
            DB::beginTransaction();

            $invoice = Invoice::with('payments')->findOrFail($invoiceId);
            if ($invoice->status == Payment::PARTIALLYPAYMENT) {
                $totalAmount = ($invoice->final_amount - $invoice->payments->sum('amount'));
            } else {
                $totalAmount = $invoice->final_amount;
            }

            $transaction = Transaction::create($transactionData);
            $PaymentData = [
                'invoice_id'     => $invoiceId,
                'amount'         => $amount,
                'payment_mode'   => Payment::STRIPE,
                'payment_date'   => Carbon::now(),
                'transaction_id' => $transaction->id,
            ];

            // update invoice bill

            $invoicePayment = Payment::create($PaymentData);

            if (round($totalAmount, 2) == $amount) {
                $invoice->status = Payment::FULLPAYMENT;
                $invoice->save();
            } else {
                if (round($totalAmount, 2) != $amount) {
                    $invoice->status = Payment::PARTIALLYPAYMENT;
                    $invoice->save();
                }
            }
            $this->saveNotification($PaymentData);
            $invoiceData = [];
            $invoiceData['amount'] = $PaymentData['amount'];
            $invoiceData['payment_date'] = $PaymentData['payment_date'];
            $invoiceData['invoice_id'] = $invoice->id;
            $invoiceData['invoice'] = $invoice;

            if(getSettingValue('mail_notification')) {
                Mail::to(getAdminUser()->email)->send(new ClientMakePaymentMail($invoiceData));
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     *
     */
    public function saveNotification($input)
    {
        $adminUserId = getAdminUser()->id;
        $invoice = Invoice::find($input['invoice_id']);
        $title = "Payment ".getCurrencySymbol().$input['amount']." received successfully for #".$invoice->invoice_id.".";
        addNotification([
            Notification::NOTIFICATION_TYPE['Invoice Payment'],
            $adminUserId,
            $title,
        ]);
    }
}
