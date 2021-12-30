<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: #157ED2;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: #157ED2;;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>
<body>

<table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
        <!-- {{-- <img src="" alt="" width="150"/> --}} -->
            <h2 style="color: #157ED2; font-size: 26px;"><strong>Mobile Care Store</strong></h2>
        </td>
        <td align="right">
            <pre class="font">
               Mobile Care Head Office
               Email:support@mobilecarestore.com <br>
               Mob: 01095226151 <br>
               Giza, Sheikh zaid <br>
            </pre>
        </td>
    </tr>

</table>


<table width="100%" style="background:white; padding:2px;"></table>
<table width="100%" style="background: #F7F7F7; padding:0 5px 0 5px;" class="font">
    <tr>
        <td>
            <p class="font" style="margin-left: 20px;">
                <strong>Name:</strong> {{ $order->name }}<br>
                <strong>Email:</strong> {{ $order->email }} <br>
                <strong>Phone:</strong> {{ $order->phone }} <br>
                @php
                    $div = $order->division->name_en;
                @endphp

                <strong>Address:</strong> {{ $div }},{{ $order->address }} <br>
            </p>
        </td>
        <td>
            <p class="font">
            <h3><span style="color: #157ED2;">Invoice:</span> {{ $order->invoice_number}}</h3>
            <h4><span style="color: #157ED2;">Order number:</span> #{{ $order->order_number}}</h4>
            Order Date: {{ $order->created_at->format('Y-m-d') }} <br>
            {{--Delivery Date: {{ $order->delivered_date }} <br>--}}
            Payment Type : {{ $order->payment_method }} </span>
            </p>
        </td>
    </tr>
</table>
<br>
<table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <center>
            {{--<h2><span style="color: #157ED2;">Subtotal:</span>{{ $order->amount }}{{'EGP'}}</h2>--}}
            <h2><span style="color: #157ED2;">Total:</span> {{ $order->amount }}{{'EGP'}}</h2>
            {{-- <h2><span style="color: #157ED2;">Full Payment PAID</h2> --}}
        </center>
    </tr>
</table>
</body>
</html>
