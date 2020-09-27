<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Monthly Report</title>

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
        <span><h4>Ghorer Haat</h4></span>
    </div>
    <div class="date">
        Month : @if($month==1)January@elseif($month==2)February
        @elseif($month==3)March
        @elseif($month==4)April
        @elseif($month==5)May
        @elseif($month==6)June
        @elseif($month==7)July
        @elseif($month==8)August
        @elseif($month==8)September
        @elseif($month==8)October
        @elseif($month==8)November
        @elseif($month==8)December
                    @endif

    </div>
    <br>
    <div class="date">
        Year : {{$year}}

    </div>
    <br>

    <h3>Income</h3>
    <hr>


    <!--Income online-->
    <h5>Online Sell income</h5>
    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">

            <th class="pd-y-5">Order Number</th>
            <th class="pd-y-5">Paid</th>
            <th class="pd-y-5">Due</th>
            <th class="pd-y-5">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($incomeOnline as $item)
            <tr>
                <td>{{$item->order_number}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->due}}</td>
                <td>{{$item->date}}</td>
            </tr>
        @endforeach

        </tbody>

    </table>

    <!--Income Direct-->
    <h5>Direct Sell income</h5>
    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">

            <th class="pd-y-5">Customer Name</th>
            <th class="pd-y-5">Paid</th>
            <th class="pd-y-5">Due</th>
            <th class="pd-y-5">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($incomeDirect as $item)
            <tr>
                <td>{{$item->customer_name}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->due}}</td>
                <td>{{$item->date}}</td>
            </tr>
        @endforeach

        </tbody>

    </table>

    <!--Income Others-->

    <h5>Others income</h5>
    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">

            <th class="pd-y-5">Name</th>
            <th class="pd-y-5">Amount</th>
            <th class="pd-y-5">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($incomeOthers as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->date}}</td>
            </tr>
        @endforeach


        </tbody>

    </table>

    <!--Income addMoney-->

    <h5>Added Balance</h5>
    <table class="table page-break">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">

            <th class="pd-y-5">Depositor</th>
            <th class="pd-y-5">Amount</th>
            <th class="pd-y-5">Account Type</th>
            <th class="pd-y-5">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($addMoney as $item)
            <tr>
                <td>{{$item->depositor}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->account_type}}</td>
                <td>{{$item->date}}</td>
            </tr>
        @endforeach


        </tbody>

    </table>

    <!--Income Summary-->

    <h5>Summary of Income</h5>
    <table class="table page-break">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">
            <th>Item</th>
            <th>Amount</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total Online Sell Income</td>
                <td>{{$incomeOnlineTotal}}</td>
            </tr>
            <tr>
                <td>Total Direct Sell Income</td>
                <td>{{$incomeDirectTotal}}</td>
            </tr>
            <tr>
                <td>Total Other Income</td>
                <td>{{$incomeOthersTotal}}</td>
            </tr>
            <tr>
                <td>Total Due</td>
                <td>{{$dueTotal}}</td>
            </tr>
            <tr>
                <td>Total Due Payment</td>
                <td>{{$duePaymentTotal}}</td>
            </tr>
            <tr>
                <td>Total Added Balance</td>
                <td>{{$addMoneyTotal}}</td>
            </tr>


        <tr>
            <td  style="color: red">Total : </td>
            <td  style="color: red" >{{$incomeOnlineTotal+$incomeDirectTotal+$incomeOthersTotal+$dueTotal+$addMoneyTotal}}</td>
        </tr>
        </tbody>

    </table>

    <h3>Expenses</h3>
    <hr>

    <h5>Sort Purchase</h5>
    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">

            <th class="pd-y-5">Purchaser Name</th>
            <th class="pd-y-5">Paid</th>
            <th class="pd-y-5">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($purchases as $item)
            <tr>
                <td>{{$item->purchaser_name}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->date}}</td>


            </tr>
        @endforeach

        </tbody>

    </table>

    <h5>Company Purchase</h5>
    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">

            <th class="pd-y-5">Company Name</th>
            <th class="pd-y-5">Paid</th>
            <th class="pd-y-5">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($company_purchases as $item)
            <tr>
                <td>{{$item->company_name}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->date}}</td>


            </tr>
        @endforeach

        </tbody>

    </table>


    <h5>Office Cost</h5>
    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">

            <th class="pd-y-5">Reason</th>
            <th class="pd-y-5">Amount</th>
            <th class="pd-y-5">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($office_costs as $item)
            <tr>
                <td>{{$item->reason}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->date}}</td>


            </tr>
        @endforeach

        </tbody>

    </table>

    <h5>Other Expenses</h5>
    <table class="table page-break">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">

            <th class="pd-y-5">Name</th>
            <th class="pd-y-5">Amount</th>
            <th class="pd-y-5">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($expense_others as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->date}}</td>
            </tr>
        @endforeach


        </tbody>

    </table>

    <h5>Summary of Expenses</h5>
    <table class="table page-break">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">
            <th>Item</th>
            <th>Amount</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Total Company Purchase</td>
            <td>{{$company_purchasesTotal}}</td>
        </tr>
        <tr>
            <td>Total Sort Purchase</td>
            <td>{{$purchasesTotal}}</td>
        </tr>
        <tr>
            <td>Total Other Expenses</td>
            <td>{{$expense_othersTotal}}</td>
        </tr>
        <tr>
            <td>Total Office Cost</td>
            <td>{{$office_costsTotal}}</td>
        </tr>
        <tr>
            <td>Total Widthdraw Balance</td>
            <td>{{$widthdraw_moneyTotal}}</td>
        </tr>

        <tr>
            <td  style="color: red">Total : </td>
            <td  style="color: red" >{{$company_purchasesTotal+$purchasesTotal+$expense_othersTotal+$office_costsTotal+$widthdraw_moneyTotal}}</td>
        </tr>
        </tbody>

    </table>

    <h3>Account Payable</h3>
    <table class="table page-break">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">

            <th class="pd-y-5">Reason</th>
            <th class="pd-y-5">Amount</th>
            <th class="pd-y-5">Payable Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payable as $item)
            <tr>
                <td>{{$item->reason}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->payable_type}}</td>
            </tr>
        @endforeach


        </tbody>

    </table>



    <h3>Over all Summary of month {{$month}} : year {{$year}} </h3>
    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">
            <th>Item</th>
            <th>Amount</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Total Income</td>
            <td>{{$incomeOnlineTotal+$incomeDirectTotal+$incomeOthersTotal+$dueTotal+$addMoneyTotal}}</td>
        </tr>
        <tr>
            <td>Total Expenses</td>
            <td>{{$company_purchasesTotal+$purchasesTotal+$expense_othersTotal+$office_costsTotal+$widthdraw_moneyTotal}}</td>
        </tr>
        <tr>
            <td>Total Due</td>
            <td>{{$dueTotal}}</td>
        </tr>
        <tr>
            <td>Total Account Payable</td>
            <td>{{$payableTotal}}</td>
        </tr>



        </tbody>

    </table>





</body>
</html>
