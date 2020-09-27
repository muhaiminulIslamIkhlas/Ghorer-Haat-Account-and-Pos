<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>

    <!-- Bootstrap core CSS -->


    <style>
        .text-right {
            text-align: right;
        }
        img{
            width: 50px;
            height: 50px;
        }
        .page-break {
            page-break-after: always;}
        .date{
            float: left;
        }
        table{
            border: 1px solid;
            width: 100%;
        }
        th{
            text-align: left;
        }
    </style>

</head>
<body  style="background: white">

<div>

    <div class="col-xs-9">

        <span><h4>Ghorer Haat</h4></span>
    </div>
    <div class="date">
        Date : {{$date}}

    </div>
    <br>


        <div class="col-xs-4">
            <h3>Online Sales</h3>
            <table class="table">
                <thead style="background: #F5F5F5;">
                <tr class="tx-10">

                    <th class="pd-y-5">Order Number</th>
                    <th class="pd-y-5">Cash</th>
                    <th class="pd-y-5">Bkash</th>
                    <th class="pd-y-5">Due</th>
                    <th class="pd-y-5">Due Source</th>
                </tr>
                </thead>
                <tbody>

                @foreach($incomeOnline as $item)
                <tr>
                    <td>{{$item->order_number}}</td>

                    <td>@if($item->cash_type=='cash'){{$item->amount}}@endif</td>
                    <td>@if($item->cash_type=='bkash'){{$item->amount}}@endif</td>
                    <td>{{$item->due}}</td>
                    <td>{{$item->due_source}}</td>


                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <div class="">
        <h3>Direct Sales</h3>
        <table class="table">
            <thead style="background: #F5F5F5;">
            <tr class="tx-10">

                <th class="pd-y-5">Customer Name</th>
                <th class="pd-y-5">Cash</th>
                <th class="pd-y-5">Bkash</th>
                <th class="pd-y-5">Due</th>
                <th class="pd-y-5">Due Source</th>
            </tr>
            </thead>
            <tbody>
            @foreach($incomeDirect as $item)
                <tr>
                    <td>{{$item->customer_name}}</td>

                    <td>@if($item->cash_type=='cash'){{$item->amount}}@endif</td>
                    <td>@if($item->cash_type=='bkash'){{$item->amount}}@endif</td>
                    <td>{{$item->due}}</td>
                    <td>{{$item->due_source}}</td>


                </tr>
            @endforeach
            </tbody>

        </table>

    </div>




</body>
</html>
