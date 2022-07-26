<?php

namespace App\Http\Controllers\Client;

use App\DataTables\PaymentDataTable;
use App\Exports\ClientTransactionsExport;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreatePaymentRequest;
use App\Models\Invoice;
use App\Models\Payment;
use App\Repositories\PaymentRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Yajra\DataTables\DataTables;

class PaymentController extends AppBaseController
{
    /** @var  PaymentRepository */
    public $paymentRepository;

    /**
     * @param  PaymentRepository  $paymentRepo
     */
    public function __construct(PaymentRepository $paymentRepo)
    {
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of((new PaymentDataTable())->get($request->all()))->make(true);
        }
        $paymentModeArr = Payment::PAYMENT_MODE;

        return view('client_panel.transactions.index', compact('paymentModeArr'));
    }

    /**
     * @param  CreatePaymentRequest  $request
     *
     * @return mixed
     */
    public function store(CreatePaymentRequest $request)
    {
        $input = $request->all();
        $input['payment_date'] = Carbon::now();

        if ($input['payment_type'] != Payment::FULLPAYMENT && $input['payable_amount'] < $input['amount']) {
            return $this->sendError('Partially Paid Amount is Always Less For Full Amount');
        } else {
            if ($input['payment_type'] == Payment::FULLPAYMENT && $input['payable_amount'] != $input['amount']) {
                return $this->sendError('Enter only Payable Amount');
            }
        }

        $payment = $this->paymentRepository->store($input);
        if ($payment) {
            $this->paymentRepository->saveNotification($input);
        }

        return $this->sendResponse($payment, 'Payment successfully done.');
    }

    /**
     * @param  Invoice  $invoice
     *
     * @return mixed
     */
    public function show(Invoice $invoice)
    {
        $totalPayable = $this->paymentRepository->getTotalPayable($invoice);

        return $this->sendResponse($totalPayable, 'Invoice retrieved successfully.');
    }

    /**
     *
     * @return BinaryFileResponse
     */
    public function exportTransactionsExcel(): BinaryFileResponse
    {

        return Excel::download(new ClientTransactionsExport(),'transactions-excel.xlsx');
    }

}
