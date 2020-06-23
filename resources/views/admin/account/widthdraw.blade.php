@extends('admin.master')

@section('body')
    <div class="col-md-8">
        <div class="customCard">
            <div class="container p-4 bg-white">
                <div class="bg-danger text-center text-white p-2">Widthdraw Amount</div>
                <br>

                <form id="myForm">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Amount</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" min="0" name="amount" placeholder="Amount" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="date" placeholder="Date" required>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Account Type</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="account_type" id="gridRadios1" value="bkash" >
                                    <label class="form-check-label" for="gridRadios1" >
                                        Bkash
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="account_type" id="gridRadios1" value="bank"  checked>
                                    <label class="form-check-label" for="gridRadios1" >
                                        Bank
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="submit" id="save" class="btn btn-danger" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#myForm').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:'{{URL('/admin/save/widthdraw')}}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    beforeSend:function(){
                        $("#save").prop('disabled', true);
                        $('#save').prop('value','Please wait....');
                    },
                    success:function(data)
                    {
                        if(data.error)
                        {

                            for(var count = 0; count < data.error.length; count++)
                            {

                                $.notify(""+data.error[count]+"", "error");
                            }

                        }
                        else
                        {

                            if(data.errors){
                                $.notify(""+data.errors+"", "error");
                            }else{
                                $.notify(""+data.success+"", "success");
                                $('#myForm').trigger("reset");
                            }

                        }
                        $("#save").prop('disabled', false);
                        $('#save').prop('value','Submit');

                    }
                })
            });

        });
    </script>

@endsection
