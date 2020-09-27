<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color:#333;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="information">
        <table width="100%">
            <tr>
                <td align="left" style="width: 40%;">
                    <h3>Mini Store</h3>
                </td>
                <td align="right" style="width: 50%;">
                    <img src="{{asset('images/logo.png')}}" alt="Logo" class="logo"/>
                </td>
            </tr>

        </table>
    </div>
    <div class="invoice">
        <div  class="row" >
            <h2> INV_{{ $orders->id }}</h2>
            <div class="col-md-6"> <h3  style="font-size: 18px">Date: {{$orders->O_date }}</h3></div>
            <div class="col-md-6"><h3  style="font-size: 18px"> Name: {{$orders->user->name}} </h3></div>
        </div>
        <div class="row">
            <h3> Details </h3>
            <table class="table table-bordered" style="font-size:16px">
                <tr>
                    <th> Item Name </th>
                    <th> Quantity </th>
                    <th> price</th>
                </tr>
                @foreach($orders-> orderItems as $item)
                <tr>
                    <td> {{$item->name}} </th>
                    <td> {{$item->pivot->qty}}</th>
                    <td> {{$item->pivot->price}}</th>
                </tr>
                @endforeach
                <tr > <th colspan="3" style="text-align:center">Total {{$orders->total}} </th></tr>
            </table>
        </div>
    </div>
    <div class="information" style="position: absolute; bottom: 0;">
        <table width="100%">
            <tr>
                <td align="left" style="width: 50%;">
                    &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
