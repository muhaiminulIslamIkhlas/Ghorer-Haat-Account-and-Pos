@extends('admin.master')

@section('body')



<div class="row ">
            <div class="col-md-4" >
                    <div class="customCard bg-white">
                        <div class="text-center bg-dark text-white">Get Daily Report</div>
                            <div class="container p-4">
                                <form action="{{URL('/admin/create/report')}}" method="post" class="form-inline">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputPassword6">Date</label>
                                        <input type="date"  name="date" class="form-control mx-sm-3" required >
                                        <small id="passwordHelpInline" class="text-muted">
                                            <input type="submit" value="Submit" class="btn btn-primary rounded" >
                                        </small>
                                    </div>
                                </form>
                            </div>

                    </div>

            </div>
        <div class="col-md-4" >
            <div class="customCard bg-white">
                <div class="text-center bg-dark text-white">Sales</div>
                <div class="container p-4">
                    <form action="{{URL('/admin/onlineSales/report')}}" method="post" class="form-inline">
                        @csrf
                        <div class="form-group">
                            <label for="inputPassword6">Date</label>
                            <input type="date"  name="date" class="form-control mx-sm-3" required >
                            <small id="passwordHelpInline" class="text-muted">
                                <input type="submit" value="Submit" class="btn btn-primary rounded" >
                            </small>
                        </div>
                    </form>
                </div>

            </div>

        </div>

            <div class="col-md-4" >
                <div class="customCard bg-white">
                    <div class="text-center bg-dark text-white">Purchase</div>
                    <div class="container p-4">
                        <form action="{{URL('/admin/purchase/report')}}" method="post" class="form-inline">
                            @csrf
                            <div class="form-group">
                                <label for="inputPassword6">Date</label>
                                <input type="date"  name="date" class="form-control mx-sm-3" required >
                                <small id="passwordHelpInline" class="text-muted">
                                    <input type="submit" value="Submit" class="btn btn-primary rounded" >
                                </small>
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div>
        <br />

        <div class="" >
            <div class="customCard bg-white">
                <div class="text-center bg-dark text-white">Monthly Report</div>
                <div class="container p-4 ">
                    <form action="{{URL('/admin/monthly/report')}}" method="post" class="form-inline">
                        @csrf
                        <div class="form-group">
                            <label for="inputPassword6">Month</label>
                            <select class="form-control ml-3 mr-3" name="month" required>

                                <option value="1">January</option>
                                <option value="2">Febuary</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <label for="inputPassword6">Year</label>
                            <select class="form-control ml-3 mr-3" name="year" required>

                                <option value="2020">2020</option>
                                <option value="2020">2021</option>
                                <option value="2020">2022</option>
                                <option value="2020">2023</option>
                                <option value="2020">2024</option>
                                <option value="2020">2025</option>
                            </select>
                            <small id="passwordHelpInline" class="text-muted">
                                <input type="submit" value="Submit" class="btn btn-primary rounded" >
                            </small>
                        </div>
                    </form>
                </div>

            </div>
</div>

@endsection