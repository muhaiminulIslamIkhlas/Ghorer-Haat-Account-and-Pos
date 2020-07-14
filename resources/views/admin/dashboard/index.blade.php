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

                    <!-- <div class="col-xl-3 col-md-6 mb-4 m-3">
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
                    </div> -->

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
