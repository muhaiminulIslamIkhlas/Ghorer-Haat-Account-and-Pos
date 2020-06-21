@extends('admin.master')

@section('body')
    <div class="col-md-8">
        <div class="customCard">
            <div class="container p-4 bg-white">
                <div class="bg-danger text-center text-white p-2">Add Amount</div>
                <br>

                <form id="myForm">
                    @csrf
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Expenses Type</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payable_type"  value="Sort purchase" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Sort purchase
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payable_type" id="gridRadios1" value="Company purchase" >
                                    <label class="form-check-label" for="gridRadios1">
                                        Company Purchase
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payable_type" id="gridRadios1" value="Others" >
                                    <label class="form-check-label" for="gridRadios1">
                                        Others
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payable_type" id="gridRadios1" value="Office Cost" >
                                    <label class="form-check-label" for="gridRadios1">
                                        Office Cost
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label for="inputEmail3" id="labelText" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" id="inputForname" class="form-control" name="reason" placeholder="Name" required>
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
            $('input[type="radio"]').click(function() {
                var radioValue = $("input[name='payable_type']:checked").val();
                if (radioValue=="Others") {
                    $('#labelText').text('Reason')
                    $("#inputForname").prop('placeholder', "Reason");
                }else if(radioValue=="Sort purchase"){
                    $('#labelText').text('Purchaser Name')
                    $("#inputForname").prop('placeholder', "Purchaser Name");
                }else if(radioValue=="Company purchase"){
                    $('#labelText').text('Company Name')
                    $("#inputForname").prop('placeholder', "Company Name");
                }else if(radioValue=="Office cost"){
                    $('#labelText').text('Reason')
                    $("#inputForname").prop('placeholder', "Reason");
                }
            });
            $('#myForm').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:'{{URL('/admin/save/payable')}}',
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


                            $.notify(""+data.success+"", "success");
                            $('#myForm').trigger("reset");
                        }
                        $('#save').prop('value','Submit');
                        $("#save").prop('disabled', false);

                    }
                })
            });

        });
    </script>

@endsection
