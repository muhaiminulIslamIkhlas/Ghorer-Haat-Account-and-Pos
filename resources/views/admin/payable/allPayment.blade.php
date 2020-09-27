@extends('admin.master')

@section('body')





    <div class="card pd-20 pd-sm-40">
        <div class="row">
            <div class="col-md-11"><h6 class="card-body-title">All Payment</h6></div>
            <div class="col-md-1 justify-content-end"><a href="{{URL('/admin/index/payable')}}" class="btn btn-primary text-white">Back</a></div>
        </div>
        <br>
        <br>



        <div class="table-wrapper text-black" >
            <table id="datatable1" class="table table-bordered" >
                <thead>
                <tr>
                    <th class="wd-15p">Name/Company name/Others</th>
                    <th class="wd-15p">Date</th>
                    <th class="wd-15p">Amount</th>


                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{$row->reason}}</td>
                        <td>{{$row->date}}</td>
                        <td>{{$row->amount}}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div><!-- table-wrapper -->
    </div>




@endsection()
