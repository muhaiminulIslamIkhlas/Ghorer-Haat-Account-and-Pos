@extends('admin.master')

@section('body')
<div class="sl-page-title">
    <a href="{{url('/admin/pdf/report/'.$date)}}" class="btn btn-danger rounded text-white">Generate Report</a>
    <br>
    <br>


        <div class="row">
        <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-transparent pd-20 bd-b bd-gray-200">
                <h3 class="card-title tx-uppercase tx-12 mg-b-0 text-danger text-center ">Income</h3>
            </div>
        <table class="table table-white table-responsive">
            <thead>
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
                    @if($onlineSellAmount)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                    @else
                        <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                    @endif Taka: {{$onlineSellAmount}}
                </td>
            </tr>
            <tr>

                <td>
                    Direct Sales
                </td>
                <td class="tx-12">

                    @if($directSellAmount)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                    @else
                        <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                    @endif
                    Taka: {{$directSellAmount}}
                </td>
            </tr>
            <tr>

                <td>
                    Others Income
                </td>
                <td class="tx-12">
                    @if($othersIncome)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                    @else
                        <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                    @endif Taka: {{$othersIncome}}
                </td>
            </tr>
            <tr>

                <td>
                    Total Income
                </td>
                <td class="tx-12">
                    @if($directSellAmount)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                    @else
                        <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                    @endif Taka: {{$onlineSellAmount+$onlineSellAmount+$othersIncome}}
                </td>
            </tr>
            </tbody>

        </table>

        </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-transparent pd-20 bd-b bd-gray-200">
                    <h3 class="card-title tx-uppercase tx-12 mg-b-0 text-danger text-center">Balance</h3>
                </div>
                <table class="table table-white table-responsive">
                    <thead>
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
                            @if($bank)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                            @else
                                <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                            @endif Taka: {{$bank}}
                        </td>
                    </tr>
                    <tr>

                        <td>
                            Bkash
                        </td>
                        <td class="tx-12">

                            @if($bkash)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                            @else
                                <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                            @endif
                            Taka: {{$bkash}}
                        </td>
                    </tr>
                    <tr>

                        <td>
                            In Cash
                        </td>
                        <td class="tx-12">
                            @if($cash)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                            @else
                                <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                            @endif Taka: {{$cash}}
                        </td>
                    </tr>
                    <tr>

                        <td>
                            Total Income
                        </td>
                        <td class="tx-12">
                            @if($directSellAmount)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                            @else
                                <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                            @endif Taka: {{$cash+$bank+$bkash}}
                        </td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-transparent pd-20 bd-b bd-gray-200">
                        <h3 class="card-title tx-uppercase tx-12 mg-b-0 text-danger text-center">Expenses</h3>
                    </div>
                    <table class="table table-white table-responsive">
                        <thead>
                        <tr class="tx-10">

                            <th class="pd-y-5">Expenses Type</th>
                            <th class="pd-y-5">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td>
                                Company purchase
                            </td>
                            <td class="tx-12">
                                @if($company_purchases)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                                @else
                                    <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                                @endif Taka: {{$company_purchases}}
                            </td>
                        </tr>
                        <tr>

                            <td>
                                Sort purchase
                            </td>
                            <td class="tx-12">

                                @if($purchases)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                                @else
                                    <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                                @endif
                                Taka: {{$purchases}}
                            </td>
                        </tr>
                        <tr>

                            <td>
                                Office Cost
                            </td>
                            <td class="tx-12">
                                @if($office_costs)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                                @else
                                    <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                                @endif Taka: {{$office_costs}}
                            </td>
                        </tr>
                        <tr>
                        <tr>

                            <td>
                                Other Expenses
                            </td>
                            <td class="tx-12">
                                @if($expense_others)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                                @else
                                    <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                                @endif Taka: {{$expense_others}}
                            </td>
                        </tr>
                        <tr>

                            <td>
                                Total Expenses
                            </td>
                            <td class="tx-12">
                                @if($directSellAmount)<span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                                @else
                                    <span class="square-8 bg-danger mg-r-5 rounded-circle"></span>
                                @endif Taka: {{$purchases+$office_costs+$expense_others+$company_purchases}}
                            </td>
                        </tr>
                        </tbody>

                    </table>

                </div>
            </div>
            <div class="container text-danger"><h2>Due : {{$due}}</h2></div>

</div>

@endsection()
