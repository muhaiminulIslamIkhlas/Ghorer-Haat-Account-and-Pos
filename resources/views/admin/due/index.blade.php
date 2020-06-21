@extends('admin.master')

@section('body')





        <div class="card pd-20 pd-sm-40">
            <div class="row">
                <div class="col-md-10"><h6 class="card-body-title">Due List</h6></div>
                <div class="col-md-2"><a href="#" class="btn btn-primary text-white">See All Payment</a></div>
            </div>
            <br>
            <br>



            <div class="table-wrapper text-black" >
                <table id="datatable1" class="table table-bordered" >
                    <thead>
                    <tr>
                        <th class="wd-15p">Name/Order Number</th>
                        <th class="wd-15p">Date</th>
                        <th class="wd-20p">Sales Type</th>
                        <th class="wd-15p">Due</th>
                        <th class="wd-10p">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($due as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->date}}</td>
                            <td>{{$row->sales_type}}</td>
                            <td>{{$row->amount}}</td>

                            <td>
                                <a href="" id="myButton" class="btn btn-danger btn-icon rounded" data-id="{{$row->id}}" data-toggle="modal" data-target="#exampleModal">
                                    <div><i class="fa fa-money" ></i></div>
                                </a>
                            </td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title  text-white" id="exampleModalLabel">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="myForm">
                        <div class="modal-body bg-white">
                            Please check before you submit :

                            @csrf
                            <input type="hidden" id="field" name="due_id" >
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Date :</label>
                                <input type="date" class="form-control" name="date" id="recipient-name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Amount :</label>
                                <input type="number" class="form-control" name="amount" id="recipient-name" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Payment Type:</label>
                                <select class="form-control" name="cash_type">
                                    <option value="cash">Cash</option>
                                    <option value="bkash">Bkash</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success rounded" id="save" value="Save" />
                            <button type="button" class="btn btn-primary rounded" data-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>
            </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){

                $('.modal').on('show.bs.modal', function(e) {
                    var userid = $(e.relatedTarget).data('id');
                    $(e.currentTarget).find('input[name="due_id"]').val(userid);
                });

                $('#myForm').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:'{{URL('/admin/payment/due')}}',
                        method:'post',
                        data:$(this).serialize(),
                        dataType:'json',
                        beforeSend:function(){
                            $('#save').prop('value','Please wait....');
                            $("#save").attr("disabled", true);
                        },
                        success:function(data)
                        {
                            if(data.error)
                            {
                                $.notify(""+data.error+"", "error");
                            }
                            else
                            {
                                $('#myForm').trigger("reset");
                                $('.modal').modal('hide');


                                $.notify(""+data.success+"", "success");
                                window.setTimeout(function(){window.location.href="http://localhost/RajuProject/public/admin/index/due";},2000)




                            }
                            $('#save').prop('value','Save');
                            $("#save").attr("disabled", false);


                        }
                    })
                });

            });
        </script>



@endsection()
