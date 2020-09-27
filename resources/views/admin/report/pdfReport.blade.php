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
        .bt{
            border-bottom: 1px solid black;
        }
    </style>

</head>
<body  style="background: white">

<div>

        <div class="col-xs-9">

            <span><h4>Ghorer Haat</h4></span>
        </div>
        <div class="date">
                Date :  {{$date}}

        </div>
    <br>

    <div style="margin-bottom: 0px">&nbsp;</div>

    <div class="row">

        <div class="col-xs-4">
            <h3>Income</h3>
            <table>
                <thead style="background: #F5F5F5;">
                <tr class="tx-10">

                    <th class="pd-y-5">Income Source</th>
                    <th class="pd-y-5">Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <td>
                        Online Sales
                    </td>
                    <td class="tx-12">
                         Taka: {{$onlineSellAmount}}
                    </td>
                </tr>
                <tr>

                    <td>
                        Direct Sales
                    </td>
                    <td class="tx-12">

                        Taka: {{$directSellAmount}}
                    </td>
                </tr>
                <tr>

                    <td class="bt">
                        Others Income
                    </td>
                    <td class="bt">
                         Taka: {{$othersIncome}}
                    </td>
                </tr>
                <tr>

                    <td>
                        Total Income
                    </td>
                    <td class="tx-12">
                         Taka: {{$onlineSellAmount+$onlineSellAmount+$othersIncome}}
                    </td>
                </tr>
                </tbody>

            </table>

            <div style="margin-bottom: 0px">&nbsp;</div>


        </div>
        <div class="col-xs-4">
            <h3>Balance</h3>
            <table class="table">
                <thead style="background: #F5F5F5;">
                <tr class="tx-10">

                    <th class="pd-y-5">Income Source</th>
                    <th class="pd-y-5">Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <td>
                        Bank
                    </td>
                    <td class="tx-12">
                         Taka: {{$bank}}
                    </td>
                </tr>
                <tr>

                    <td>
                        Bkash
                    </td>
                    <td class="tx-12">

                        Taka: {{$bkash}}
                    </td>
                </tr>
                <tr>

                    <td class="bt">
                        In Cash
                    </td>
                    <td class="bt">
                         Taka: {{$cash}}
                    </td>
                </tr>
                <tr>

                    <td>
                        Total Income
                    </td>
                    <td class="tx-12">
                         Taka: {{$cash+$bank+$bkash}}
                    </td>
                </tr>
                </tbody>

            </table>
        </div>
        <div class="col-xs-3">
            <h3>Due</h3>
            <table style="width: 100%">
                <tbody>
                <tr class="well" style="padding: 5px">
                    <th style="padding: 5px"><div> Due </div></th>
                    <td style="padding: 5px" class="text-right"><strong> {{$due}} </strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<div class="">
    <h3>Expenses</h3>
    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr class="tx-10">

            <th >Expenses Type</th>
            <th >Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td>
                Company purchase
            </td>
            <td>
                 Taka: {{$company_purchases}}
            </td>
        </tr>
        <tr>

            <td>
                Sort purchase
            </td>
            <td>
                Taka: {{$purchases}}
            </td>
        </tr>
        <tr>

            <td>
                Office Cost
            </td>
            <td>
                 Taka: {{$office_costs}}
            </td>
        </tr>
        <tr>

            <td class="bt">
                Other Expenses
            </td>
            <td class="bt">
                 Taka: {{$expense_others}}
            </td>
        </tr>
        <tr>

            <td>
                Total Expenses
            </td>
            <td>
                Taka: {{$purchases+$office_costs+$expense_others+$company_purchases}}
            </td>
        </tr>
        </tbody>

    </table>

</div>


</div>

</body>
</html>
