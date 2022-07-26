{{--<div class="card-body  border-top p-9">--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--            @include('layouts.search-component-for-detail', ['id' => 1])--}}
{{--            <div class="table-responsive viewList">--}}
{{--                <table id="clientInvoiceTbl"--}}
{{--                       class="table table-responsive-sm align-middle table-row-dashed fs-6 gy-5 dataTable no-footer w-100">--}}
{{--                    <thead>--}}
{{--                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                        <th>{{ __('messages.invoice.invoice_id') }}</th>--}}
{{--                        <th>Created At</th>--}}
{{--                        <th>{{ __('messages.invoice.invoice_date') }}</th>--}}
{{--                        <th>{{ __('messages.invoice.due_date') }}</th>--}}
{{--                        <th>{{ __('messages.invoice.amount') }}</th>--}}
{{--                        <th>{{ __('messages.invoice.transactions') }}</th>--}}
{{--                        <th>{{ __('messages.common.status') }}</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody class="text-gray-600 fw-bold">--}}
{{--                    @foreach($client->invoices as $invoice)--}}
{{--                        <tr id="tbl-{{$invoice->id}}">--}}
{{--                            <td>--}}
{{--                                <a href="{{ route('invoices.show',$invoice->id) }}" class="badge badge-light-info">--}}
{{--                                    {{ $invoice->invoice_id }}--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                            <td>{{ $invoice->updated_at }}</td>--}}
{{--                            <td>--}}
{{--                                <div class="badge badge-light">--}}
{{--                                    {{ Carbon\Carbon::parse($invoice->invoice_date)->format(currentDateFormat()) }}--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div class="badge badge-light">--}}
{{--                                    {{ Carbon\Carbon::parse($invoice->due_date)->format(currentDateFormat()) }}--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>{{ getCurrencySymbol() }}&nbsp;{{ numberFormat($invoice->final_amount) }}</td>--}}
{{--                            <td>--}}
{{--                                @if($invoice->status == \App\Models\Invoice::Partially || $invoice->payments->sum('amount') == $invoice->final_amount)--}}
{{--                                <span class="badge badge-light-success fs-7 cur-margin">Paid: {{ getCurrencySymbol() }}--}}
{{--                                    &nbsp;{{ numberFormat($invoice->payments->sum('amount')) }}</span>--}}
{{--                                <br>--}}
{{--                                @endif--}}
{{--                                @if($invoice->payments->sum('amount') == $invoice->final_amount)--}}
{{--                                @else--}}
{{--                                    <span class="badge badge-light-danger fs-7 cur-margin mt-1">Due: {{ getCurrencySymbol() }}--}}
{{--                                    &nbsp;  {{ numberFormat($invoice->final_amount - $invoice->payments->sum('amount')) }}--}}
{{--                                     </span>--}}
{{--                                 @endif--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                @if($invoice->status == \App\Models\Invoice::DRAFT)--}}
{{--                                    <span class="badge badge-light-warning fs-7">{{ $invoice->status_label }}</span>--}}
{{--                                @elseif($invoice->status == \App\Models\Invoice::UNPAID)--}}
{{--                                    <span class="badge badge-light-danger fs-7">{{ $invoice->status_label }}</span>--}}
{{--                                @elseif($invoice->status == \App\Models\Invoice::PAID)--}}
{{--                                    <span class="badge badge-light-success fs-7">{{ $invoice->status_label }}</span>--}}
{{--                                @elseif($invoice->status == \App\Models\Invoice::Partially)--}}
{{--                                    <span class="badge badge-light-primary fs-7">{{ $invoice->status_label }}</span>--}}
{{--                                @elseif($invoice->status == \App\Models\Invoice::OVERDUE)--}}
{{--                                    <span class="badge badge-light-danger fs-7">{{ $invoice->status_label }}</span>--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="card-body">--}}
    <div class="row">
        <div class="col-lg-12 livewire-table">
            <livewire:client-detail-invoice-table clientId="{{ $client->id }}" />
        </div>
    </div>
{{--</div>--}}
