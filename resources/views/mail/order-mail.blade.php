@component('mail::message')
# Invoice No : {{$order['invoice_number']}}

@component('mail::table')
    | Name          | Email         | Amount  | Shipping cost  | Total amount  |
    | ------------- |:-------------:| --------:| -------------:| -------------:|
    | {{$order['name']}}| {{$order['email']}}| {{$order['amountbefore']}}EGP | {{$order['cost']}} | {{$order['amount']}}EGP |
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
