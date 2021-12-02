@component('mail::message')
# Invoice No : {{$order['invoice_number']}}

@component('mail::table')
    | Name          | Email         | Amount  |
    | ------------- |:-------------:| --------:|
    | {{$order['name']}}| {{$order['email']}}| {{$order['amount']}}EGP |
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
