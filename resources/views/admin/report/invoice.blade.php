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
        body {
    font-family: DejaVu Sans;
}
    </style>

</head>
<body  style="background: white">

<div>

    <div class="col-xs-9">

        <span><h4>Ghorer Haat</h4></span>
    </div>
    <div class="date">
        Date : 

    </div>
        <div class="date">
        Order Number : {{$orderNumber}}

    </div>
    <br>


        <div class="col-xs-4">
            <h3>Online Sales</h3>
            <table class="table">
                <thead style="background: #F5F5F5;">
                <tr class="tx-10">

                    <th class="pd-y-5">Product Name</th>
                    <th class="pd-y-5">Qty</th>
                    <th class="pd-y-5">Price</th>
                </tr>
                </thead>
                <tbody>

                @foreach($content as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->price*$item->qty}}</td>


                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
  

     <h3>Summary</h3>
            <table>
                <thead style="background: #F5F5F5;">
                <tr class="tx-10">

                    <th class="pd-y-5">Cost type</th>
                    <th class="pd-y-5">Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <td>
                        Price Total
                    </td>
                    <td class="tx-12">
                         Taka: {{$total}}
                    </td>
                </tr>
                <tr>

                    <td>
                        Processing Cost
                    </td>
                    <td class="tx-12">

                        Taka: {{$processingCost}}
                    </td>
                </tr>
                <tr>

                    <td class="bt">
                        Delivery Charge
                    </td>
                    <td class="bt">
                         Taka: {{$deliveryCharge}}
                    </td>
                </tr>
                                <tr>

                    <td class="bt">
                        Total
                    </td>
                    <td class="bt">
                         Taka: 
                    </td>
                </tr>
                </tbody>

            </table>




</body>
</html>
