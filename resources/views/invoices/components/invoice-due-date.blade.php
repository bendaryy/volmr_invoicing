@if(isset($value['invoice-date']))
    <div class="badge bg-primary">
        <div>{{ \Carbon\Carbon::parse($value['invoice-date'])->format(currentDateFormat()) }}</div>
    </div>
@endif

@if(isset($value['due-date']))
    <div class="badge bg-primary">
        <div>{{ \Carbon\Carbon::parse($value['due-date'])->format(currentDateFormat()) }}</div>
    </div>
@endif
