@php
    $auth =  Auth::check();
@endphp
<div>
    @if($auth && $isPublicView)
        <div class="d-flex overflow-auto h-55px">
            <ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap">
                <li class="nav-item position-relative me-7 mb-3" role="presentation">
                    <button class="nav-link active p-0" id="overview-tab" data-bs-toggle="tab"
                            data-bs-target="#overview"
                            type="button" role="tab" aria-controls="overview" aria-selected="true">
                        {{ __('messages.invoice.overview') }}
                    </button>
                </li>
                <li class="nav-item position-relative me-7 mb-3" role="presentation">
                    <button class="nav-link p-0" id="note_terms-tab" data-bs-toggle="tab" data-bs-target="#note_terms"
                            type="button" role="tab" aria-controls="note_terms" aria-selected="false">
                        {{ __('messages.invoice.note_terms') }}
                    </button>
                </li>
                <li class="nav-item position-relative me-7 mb-3" role="presentation">
                    <button class="nav-link p-0" id="paymentHistory-tab" data-bs-toggle="tab"
                            data-bs-target="#paymentHistory"
                            type="button" role="tab" aria-controls="paymentHistory" aria-selected="false">
                        {{ __('messages.invoice.payment_history') }}
                    </button>
                </li>
            </ul>
        </div>
    @endif
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="overview" role="tabpanel">
            <div class="card">
                <div class="d-flex flex-column">
                    <div class="card-body">
                        <div class="row">
{{--                            <div class="col-lg-8 col-md-6 col-sm-6">--}}
{{--                                <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">--}}
{{--                                    <div class="mt-n1">--}}
{{--                                        <div class="d-flex flex-stack pb-10">--}}
{{--                                            <img alt="Logo" src="{{ getLogoUrl() }}" height="100px"--}}
{{--                                                 width="100px"--}}
{{--                                                 class="object-contain">--}}
{{--                                            @if($isPublicView)--}}
{{--                                                <a target="_blank"--}}
{{--                                                   href="{{ route('invoices.pdf',['invoice' => $invoice->id]) }}"--}}
{{--                                                   class="btn btn-sm btn-success">{{ __('messages.invoice.print_invoice') }}</a>--}}
{{--                                            @else--}}
{{--                                                <a target="_blank"--}}
{{--                                                   href="{{ route('public-view-invoice.pdf',['invoice' => $invoice->invoice_id]) }}"--}}
{{--                                                   class="btn btn-sm btn-success">{{ __('messages.invoice.print_invoice') }}</a>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                        <div class="m-0">--}}
{{--                                            <div class="fw-bolder fs-3 text-gray-800 mb-8">{{ __('messages.invoice.invoice') }}--}}
{{--                                                #{{ $invoice->invoice_id }}</div>--}}
{{--                                            <div class="row g-5 mb-11">--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <div class="fw-bold fs-7 text-gray-600 mb-1">{{ __('messages.invoice.invoice_date').':' }}</div>--}}
{{--                                                    <div--}}
{{--                                                            class="fw-bolder fs-6 text-gray-800">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format(currentDateFormat()) }}</div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <div class="fw-bold fs-7 text-gray-600 mb-1">{{ __('messages.invoice.due_date').':' }}</div>--}}
{{--                                                    <div--}}
{{--                                                            class="fw-bolder fs-6 text-gray-800">{{ \Carbon\Carbon::parse($invoice->due_date)->format(currentDateFormat()) }}</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row g-5 mb-12">--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <div class="fw-bold fs-7 text-gray-600 mb-1">{{ __('messages.invoice.issue_for').':' }}</div>--}}
{{--                                                    <div class="fw-bolder fs-6 text-gray-800">{{ $invoice->client->user->full_name }}</div>--}}
{{--                                                    <div class="fw-bold fs-7 text-gray-600">@if(isset($invoice->client->address) && !empty($invoice->client->address))--}}
{{--                                                            {{ ucfirst($invoice->client->address) }}--}}
{{--                                                        @else--}}
{{--                                                            {{ "N/A" }}--}}
{{--                                                        @endif</div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <div class="fw-bold fs-7 text-gray-600 mb-1">{{ __('messages.invoice.issue_by').':' }}</div>--}}
{{--                                                    <div class="fw-bolder fs-6 text-gray-800">{{ getAppName() }}</div>--}}
{{--                                                    <div class="fw-bold fs-7 text-gray-600">{{ getSettingValue('company_address') }}</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <div class="table-responsive border-bottom mb-9">--}}
{{--                                                    <table class="table mb-3">--}}
{{--                                                        <thead>--}}
{{--                                                        <tr class="border-bottom fs-6 fw-bolder text-muted">--}}
{{--                                                            <th class="min-w-175px pb-2">{{ __('messages.product.product') }}</th>--}}
{{--                                                            <th class="min-w-70px text-end pb-2">{{ __('messages.invoice.qty') }}</th>--}}
{{--                                                            <th class="min-w-150px text-end pb-2">{{ __('messages.invoice.price') }}</th>--}}
{{--                                                            <th class="min-w-90px text-end pb-2">{{ __('messages.invoice.tax').' (in %)' }}</th>--}}
{{--                                                            <th class="min-w-100px text-end pb-2">{{ __('messages.invoice.amount') }}</th>--}}
{{--                                                        </tr>--}}
{{--                                                        </thead>--}}
{{--                                                        <tbody>--}}
{{--                                                        @foreach($invoice->invoiceItems as $index => $invoiceItem)--}}
{{--                                                            <tr class="fw-bolder text-gray-700 fs-5 text-end">--}}
{{--                                                                <td class="d-flex align-items-center pt-6">{{ isset($invoiceItem->product->name)?$invoiceItem->product->name:$invoiceItem->product_name??'N/A' }}</td>--}}
{{--                                                                <td class="pt-6">{{ $invoiceItem->quantity }}</td>--}}
{{--                                                                <td class="pt-6">--}}
{{--                                                                    <b>{{ getCurrencySymbol() }}</b> {{ numberFormat($invoiceItem->price)??'N/A' }}--}}
{{--                                                                </td>--}}
{{--                                                                <td class="pt-6">--}}
{{--                                                                    @foreach($invoiceItem->invoiceItemTax as $keys => $tax)--}}
{{--                                                                        {{ ($tax->tax != 0) ? $tax->tax : 'N/A' }}--}}
{{--                                                                        @if (!$loop->last)--}}
{{--                                                                            ,--}}
{{--                                                                        @endif--}}
{{--                                                                    @endforeach--}}
{{--                                                                </td>--}}
{{--                                                                <td class="pt-6 text-dark fw-boldest">--}}
{{--                                                                    <b>{{ getCurrencySymbol() }}</b> {{ numberFormat($invoiceItem->total)??'N/A' }}--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                        @endforeach--}}
{{--                                                        </tbody>--}}
{{--                                                    </table>--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex justify-content-end">--}}
{{--                                                    <div class="mw-300px">--}}
{{--                                                        <div class="d-flex flex-stack mb-3">--}}
{{--                                                            <div class="fw-bold pe-10 text-gray-600 fs-7">{{ __('messages.invoice.sub_total').(':') }}</div>--}}
{{--                                                            <div class="text-end fw-bolder fs-6 text-gray-800">--}}
{{--                                                                <b>{{ getCurrencySymbol() }}</b> {{ numberFormat($invoice->amount)??'N/A' }}--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="d-flex flex-stack mb-3">--}}
{{--                                                            <div class="fw-bold pe-10 text-gray-600 fs-7">{{ __('messages.invoice.discount').(':') }}</div>--}}
{{--                                                            <div class="text-end fw-bolder fs-6 text-gray-800">--}}
{{--                                                                @if($invoice->discount == 0 || !isset($invoice))--}}
{{--                                                                    <span>N/A</span>--}}
{{--                                                                @else--}}
{{--                                                                    @if( $invoice->discount_type == \App\Models\Invoice::FIXED)--}}
{{--                                                                        <b>{{ getCurrencySymbol() }}</b>--}}
{{--                                                                        &nbsp;{{ numberFormat($invoice->discount) }}--}}
{{--                                                                    @else--}}
{{--                                                                        <b>{{ getCurrencySymbol() }}</b>--}}
{{--                                                                        &nbsp;{{numberFormat($invoice->amount *                                                                                        $invoice->discount / 100,2)}}--}}
{{--                                                                    @endif--}}
{{--                                                                @endif--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="d-flex flex-stack mb-3">--}}
{{--                                                            <div class="fw-bold pe-10 text-gray-600 fs-7">{{ __('messages.invoice.tax').(':') }}</div>--}}
{{--                                                            <div class="text-end fw-bolder fs-6 text-gray-800">--}}
{{--                                                                {!!   (numberFormat(array_sum($totalTax)) != 0 )--}}
{{--                                                               ? '<b>'.getCurrencySymbol().'</b>&nbsp;' . numberFormat(array_sum($totalTax)) :'N/A' !!}--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="d-flex flex-stack">--}}
{{--                                                            <div class="fw-bold pe-10 text-gray-600 fs-7">{{ __('messages.invoice.total').(':') }}</div>--}}
{{--                                                            <div class="text-end fw-bolder fs-6 text-gray-800">--}}
{{--                                                                <b>{{ getCurrencySymbol() }}</b> {{ numberFormat($invoice->final_amount) }}--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                                <div class="m-0">--}}
{{--                                    <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 p-9 bg-lighten">--}}
{{--                                        <div class="mb-8">--}}
{{--                                            @if($invoice->status == \App\Models\Invoice::UNPAID)--}}
{{--                                                <span class="badge badge-light-danger">Pending Payment</span>--}}
{{--                                            @elseif($invoice->status == \App\Models\Invoice::PAID)--}}
{{--                                                <span class="badge badge-light-success me-2">Paid</span>--}}
{{--                                            @elseif($invoice->status == \App\Models\Invoice::Partially)--}}
{{--                                                <span class="badge badge-light-primary">Partially Paid</span>--}}
{{--                                            @elseif($invoice->status == \App\Models\Invoice::DRAFT)--}}
{{--                                                <span class="badge badge-light-warning me-5">Draft</span>--}}
{{--                                            @elseif($invoice->status == \App\Models\Invoice::OVERDUE)--}}
{{--                                                <span class="badge badge-light-danger">Overdue</span>--}}
{{--                                            @endif--}}
{{--                                            @if($invoice->status == \App\Models\Invoice::DRAFT)--}}
{{--                                                <button class="btn btn-success send-btn btn-sm"--}}
{{--                                                        data-id="{{ $invoice->id }}">Send--}}
{{--                                                </button>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                        <h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary">{{ __('messages.invoice.client_overview') }}</h6>--}}
{{--                                        <div class="mb-6">--}}
{{--                                            <div class="fw-bold text-gray-600 fs-7">{{ __('messages.invoice.client_name') }}</div>--}}
{{--                                            <div class="fw-bolder fs-6 text-gray-800">--}}
{{--                                                @if($auth)--}}
{{--                                                    <a href="{{ route('clients.show', ['client' => $invoice->client->id]) }}"--}}
{{--                                                       class="link-primary">{{ $invoice->client->user->full_name }}</a>--}}
{{--                                                @else--}}
{{--                                                    <div class="fw-bolder text-gray-800 fs-6">{{ $invoice->client->user->full_name }}</div>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="mb-6">--}}
{{--                                            <div class="fw-bold text-gray-600 fs-7">{{ __('messages.invoice.client_email') }}</div>--}}
{{--                                            <div class="fw-bolder text-gray-800 fs-6">{{ $invoice->client->user->email }}</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="m-0 mt-3">--}}
{{--                                    <div--}}
{{--                                        class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 p-9 bg-lighten">--}}
{{--                                        <div class="mb-6">--}}
{{--                                            <div--}}
{{--                                                class="fw-bold text-gray-600 fs-7">{{ __('messages.invoice.paid_amount') }}</div>--}}
{{--                                            <div class="fw-bolder text-gray-800 fs-6">--}}
{{--                                                {{ getCurrencySymbol() }}--}}
{{--                                                &nbsp;{{ numberFormat($invoice->payments->sum('amount')) }}--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="mb-6">--}}
{{--                                            <div--}}
{{--                                                    class="fw-bold text-gray-600 fs-7">{{ __('messages.invoice.remaining_amount') }}</div>--}}
{{--                                            <div class="fw-bolder text-gray-800 fs-6">--}}
{{--                                                {{ getCurrencySymbol() }}--}}
{{--                                                &nbsp;{{ numberFormat($invoice->final_amount - $invoice->payments->sum('amount')) }}--}}
{{--                                            </div>--}}
{{--                                            @if(!$auth && $invoice->status !== \App\Models\Invoice::PAID)--}}
{{--                                                <a target="_blank"--}}
{{--                                                   data-id="{{$invoice->id}}"--}}
{{--                                                   class="btn btn-sm btn-warning mt-5 payment">{{ __('messages.invoice.make_payment') }}</a>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-xxl-9">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="d-flex mb-md-10 mb-5">
                                            <div class="image image-circle image-lg-small">
                                                <img src="{{ getLogoUrl() }}" alt="user" class="object-contain">
                                            </div>
                                            <h3 class="ps-7">{{ __('messages.invoice.invoice') }}
                                                #{{ $invoice->invoice_id }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="d-flex flex-column mb-md-10 mb-5 mt-3 mt-md-0">
                                            <label for="name"
                                                   class="pb-2 fs-4 text-gray-600">{{ __('messages.invoice.invoice_date').':' }}</label>
                                            <span class="fs-4 text-gray-800">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format(currentDateFormat()) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="d-flex flex-column mb-md-10 mb-5 mt-3 mt-md-0">
                                            <label for="name"
                                                   class="pb-2 fs-4 text-gray-600">{{ __('messages.invoice.due_date').':' }}</label>
                                            <span class="fs-4 text-gray-800">{{ \Carbon\Carbon::parse($invoice->due_date)->format(currentDateFormat()) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        @if($isPublicView)
                                            <a target="_blank"
                                               href="{{ route('invoices.pdf',['invoice' => $invoice->id]) }}"
                                               class="btn btn-sm btn-success text-white">{{ __('messages.invoice.print_invoice') }}</a>
                                        @else
                                            <a target="_blank"
                                               href="{{ route('public-view-invoice.pdf',['invoice' => $invoice->invoice_id]) }}"
                                               class="btn btn-sm btn-success text-white">{{ __('messages.invoice.print_invoice') }}</a>
                                        @endif
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <div class="d-flex flex-column mb-md-10 mb-5">
                                            <label for="name"
                                                   class="pb-2 fs-4 text-gray-600">{{ __('messages.invoice.issue_for').':' }}</label>
                                            <span class="fs-4 text-gray-800 mb-3">{{ $invoice->client->user->full_name }}</span>
                                            <p class="text-gray-700 fs-4 mb-0">
                                                @if(isset($invoice->client->address) && !empty($invoice->client->address))
                                                    {{ ucfirst($invoice->client->address) }}
                                                @else
                                                    {{ "N/A" }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-md-6">
                                        <div class="d-flex flex-column mb-md-10 mb-5">
                                            <label for="name"
                                                   class="pb-2 fs-4 text-gray-600">{{ __('messages.invoice.issue_by').':' }}</label>
                                            <span class="fs-4 text-gray-800 mb-3">{{ getAppName() }}</span>
                                            <p class="text-gray-700 fs-4 mb-0">
                                                {{ getSettingValue('company_address') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <table class="table table-striped box-shadow-none mt-4">
                                            <thead>
                                            <tr>
                                                <th scope="col">{{ __('messages.product.product') }}</th>
                                                <th scope="col">{{ __('messages.invoice.qty') }}</th>
                                                <th scope="col">{{ __('messages.invoice.price') }}</th>
                                                <th scope="col">{{ __('messages.invoice.tax').' (in %)' }}</th>
                                                <th scope="col">{{ __('messages.invoice.amount') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($invoice->invoiceItems as $index => $invoiceItem)
                                                <tr>
                                                    <td class="py-4">{{ isset($invoiceItem->product->name)?$invoiceItem->product->name:$invoiceItem->product_name??'N/A' }}</td>
                                                    <td class="py-4">{{ $invoiceItem->quantity }}</td>
                                                    <td class="py-4">{{ getCurrencySymbol() }}{{ numberFormat($invoiceItem->price)??'N/A' }}</td>
                                                    <td class="py-4">
                                                        @foreach($invoiceItem->invoiceItemTax as $keys => $tax)
                                                            {{ ($tax->tax != 0) ? $tax->tax : 'N/A' }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="py-4">{{ getCurrencySymbol() }} {{ numberFormat($invoiceItem->total)??'N/A' }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-5 ms-lg-auto mt-4">
                                        <div class="border-top">
                                            <table class="table table-borderless box-shadow-none mb-0 mt-5">
                                                <tbody>
                                                <tr>
                                                    <td class="ps-0">{{ __('messages.invoice.sub_total').(':') }}</td>
                                                    <td class="text-gray-900 text-end pe-0">{{ getCurrencySymbol() }} {{ numberFormat($invoice->amount)??'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-0">{{ __('messages.invoice.discount').(':') }}</td>
                                                    <td class="text-gray-900 text-end pe-0">
                                                        @if($invoice->discount == 0 || !isset($invoice))
                                                            <span>N/A</span>
                                                        @else
                                                            @if( $invoice->discount_type == \App\Models\Invoice::FIXED)
                                                                {{ getCurrencySymbol() }}
                                                                &nbsp;{{ numberFormat($invoice->discount) }}
                                                            @else
                                                                {{ getCurrencySymbol() }}
                                                                &nbsp;{{numberFormat($invoice->amount * $invoice->discount / 100,2)}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-0">{{ __('messages.invoice.tax').(':') }}</td>
                                                    <td class="text-gray-900 text-end pe-0">
                                                        {!!   (numberFormat(array_sum($totalTax)) != 0 )
                                                          ? getCurrencySymbol().'&nbsp;' . numberFormat(array_sum($totalTax)) :'N/A' !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-0">{{ __('messages.invoice.total').(':') }}</td>
                                                    <td class="text-gray-900 text-end pe-0">
                                                        {{ getCurrencySymbol() }} {{ numberFormat($invoice->final_amount) }}
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3">
                                <div class="bg-gray-100 rounded-15 p-md-7 p-5 h-100 mt-xxl-0 mt-5 col-xxl-9 ms-xxl-auto w-100">
                                    <div class="mb-8">
                                        @if($invoice->status == \App\Models\Invoice::UNPAID)
                                            <span class="badge bg-light-danger">Pending Payment</span>
                                        @elseif($invoice->status == \App\Models\Invoice::PAID)
                                            <span class="badge bg-light-success me-2">Paid</span>
                                        @elseif($invoice->status == \App\Models\Invoice::Partially)
                                            <span class="badge bg-light-primary">Partially Paid</span>
                                        @elseif($invoice->status == \App\Models\Invoice::DRAFT)
                                            <span class="badge bg-light-warning me-5">Draft</span>
                                        @elseif($invoice->status == \App\Models\Invoice::OVERDUE)
                                            <span class="badge bg-light-danger">Overdue</span>
                                        @endif
                                        @if($invoice->status == \App\Models\Invoice::DRAFT)
                                            <button class="btn btn-success send-btn btn-sm"
                                                    data-id="{{ $invoice->id }}">Send
                                            </button>
                                        @endif
                                    </div>

                                    <h3 class="mb-5">{{ __('messages.invoice.client_overview') }}</h3>
                                    <div class="row">
                                        <div class="col-xxl-12 col-lg-4 col-sm-6 d-flex flex-column mb-xxl-7 mb-lg-0 mb-4">
                                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.invoice.client_name') }}</label>
                                            @if($auth)
                                                <a href="{{ route('clients.show', ['client' => $invoice->client->id]) }}"
                                                   class="link-primary text-decoration-none">{{ $invoice->client->user->full_name }}</a>

                                            @else
                                                <a href="#" class="link-primary fs-4 text-decoration-none">{{ $invoice->client->user->full_name }}</a>
                                            @endif
                                        </div>
                                        <div class="col-xxl-12 col-lg-4 col-sm-6 d-flex flex-column mb-xxl-7 mb-lg-0 mb-4">
                                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.invoice.client_email') }}</label>
                                            <span class="fs-4 text-gray-900">{{ $invoice->client->user->email }}</span>
                                        </div>
                                        <div class="col-xxl-12 col-lg-4 col-sm-6 d-flex flex-column mb-xxl-7">
                                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.invoice.paid_amount') }}</label>
                                            <span class="fs-4 text-gray-900">{{ getCurrencySymbol() }}
                                                &nbsp;{{ numberFormat($invoice->payments->sum('amount')) }}</span>
                                        </div>
                                        <div class="col-xxl-12 col-lg-4 col-sm-6 d-flex flex-column mb-xxl-7">
                                            <label for="name"
                                                   class="pb-2 fs-4 text-gray-600">{{ __('messages.invoice.remaining_amount') }}</label>
                                            <span class="fs-4 text-gray-900">{{ getCurrencySymbol() }}
                                                &nbsp;{{ numberFormat($invoice->final_amount - $invoice->payments->sum('amount')) }}
                                                </span>
                                        </div>
                                        @if(!$auth && $invoice->status !== \App\Models\Invoice::PAID)
                                            <a target="_blank"
                                               data-id="{{$invoice->id}}"
                                               class="btn btn-warning mt-5 payment">{{ __('messages.invoice.make_payment') }}</a>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="note_terms" role="tabpanel">
            <div class="card">
                <div class="card-body pt-5">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="fw-bold text-gray-600 fs-7">{{ __('messages.invoice.note').':' }}</div>
                            <div class="fw-bolder text-gray-800 fs-6">{!! $invoice->note ?? __('messages.invoice.note_not_found') !!}</div>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div class="fw-bold text-gray-600 fs-7">{{ __('messages.invoice.terms').':' }}</div>
                            <div class="fw-bolder text-gray-800 fs-6">{!! $invoice->term ?? __('messages.invoice.terms_not_found') !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="paymentHistory" role="tabpanel">
            <div class="card">
                <div class="card-body pt-5">
                    <div class="row">
                        <div class="col-lg-12 livewire-table">
                            <livewire:payment-history-table invoiceId="{{ $invoice->id }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
