@extends('admin.master')

@section('body')
<div class="row">
    <div class="col-md-6">
        <div class="customCard">
            <div class="container p-4 bg-white">
                <div class="bg-danger text-center text-white p-2">Add Amount</div>
                <br>

            <form id="myForm">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Depositor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="depositor" placeholder="Depositor" required>
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
                                <input class="form-check-input" type="radio" name="account_type"  value="cash" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Cash
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="account_type" id="gridRadios1" value="bkash" >
                                <label class="form-check-label" for="gridRadios1">
                                    Bkash
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="account_type" id="gridRadios1" value="bank" >
                                <label class="form-check-label" for="gridRadios1">
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

<div class="col-md-6">
    <div class="customCard">
      <div class="container p-4 bg-white">
              <table class="table table-bordered table-responsive bg-white" id="myTableId">
                <thead >

                <tr>
                    <th scope="col" >Depositor</th>
                    <th scope="col">Date</th>
                    <th scope="col">Cash Type</th>
                    <th scope="col">Amount</th>
                </tr>
                </thead >
                <tbody id="row">

                </tbody>
            </table>
  
</div>
</div>
</div>

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            List();
            $('#myForm').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:'{{URL('/admin/save/addmoney')}}',
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
                        }
                        List();
                        $("#save").prop('disabled', false);
                        $('#save').prop('value','Save');
                        $('#myForm').trigger("reset");
                    }
                })
            });

        });


        function List(){
        console.log('clicked');
        $.ajax({
            url:"{{URL('/admin/list/addMoney')}}",
            method:"get",
            success:function(data){
                //$('#add').attr('disabled', false);
                var tb='<tbody>';
                $.each(data.incomeOthers, function (index, value) {
                    var html = '<tr>';
                    html += '<td>' + value.depositor + '</td>';
                    html += '<td>' + value.date + '</td>';
                    html += '<td>' + value.cash_type + '</td>';
                    html += '<td>' + value.amount+'</td>';
                    
                    tb +=html;
                    /*$('.cart tr:last').after(html);*/1

                })
                /*$('#row').replaceWith(tb);*/
                $('#myTableId tbody').replaceWith(tb);


            }
        })
    }
    </script>

@endsection
