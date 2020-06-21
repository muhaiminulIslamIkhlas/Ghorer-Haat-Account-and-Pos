@extends('admin.master')

@section('body')


    <div class="sl-page-title" disabled style="height: 100vh;" id="index">

                <div class="row">
                <div class="col-xl-3 col-md-6 mb-4 m-3">
                    <div class="customCard bg-white border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cash</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Taka : {{$cash}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4 m-3">
                    <div class="customCard bg-white border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bkash Amount</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Taka : {{$bkash}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4 m-3">
                    <div class="customCard bg-white border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Due</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Taka : {{$due}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-file-excel-o fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4 m-3">
                    <div class="customCard bg-white border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-black-50 text-uppercase mb-1">Bank Balance</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Taka : {{$bank}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-cc-visa fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4 m-3">
                    <div class="customCard bg-white border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Payable</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Taka : {{$accountPayable}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-xl-3 col-md-6 mb-4 m-3">
                        <div class="customCard bg-white border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="#" id="btn"> <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Update All Product</div></a>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-spinner fa-spin fa-2x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        <br>
        <br>
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
        <br>
        <div class="" >
            <div class="customCard bg-white">
                <div class="text-center bg-dark text-white">Purchase</div>
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
        </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-danger">
                    Please wait.... Dont cancel, Otherwise system can crash.
                </div>
                <div class="modal-body ">
                    <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-7">
                        <i class="fa fa-refresh fa-spin" style="font-size:150px;color: #1D2939"></i>
                    </div>
                    <div class="col-md-1"></div>
                    </div>


                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn').on('click',function(){
                $('#myModal').modal({backdrop: 'static', keyboard: false})
                $('#myModal').modal('show')
                $.ajax({
                    url:'{{URL('/admin/product/all')}}',
                    method:'get',
                    success:function(data){
                        $('#myModal').modal('hide')
                        $.notify(""+data.success+"", "success");
                    }
                })
            })


        })
</script>






@endsection()
