@extends('admin.master')

@section('body')

   <div class="col-md-8">
    <div class="text-center bg-danger"><h4>Office Cost</h4></div>
    <form method="post" id="dynamic_form">
        <br />
     <br />
        <div class="form-group">
            <div class="col-md-8">
            <div class="row">
                <div class="col-md-2 text-right"><strong>Date</strong></div>
                <div class="col-md-6"><input type="date" name="date" class="form-control"></div>
            </div>
            </div>
        </div>
                
              <table class="table table-responsive" id="user_table">
               <thead class="bg-danger">
                <tr>
                    <th width="40%">Purchaser Name</th>
                    <th width="25%">Amount</th>
                    <th width="25%">Cash Type</th>

                    <th width="10%">Action</th>
                </tr>
               </thead>
               <tbody>

               </tbody>
               <tfoot>
                <tr>
                    <td colspan="3" align="right">&nbsp;</td>
                    <td>
                  @csrf
                  <input type="submit" name="save" id="save" class="btn btn-primary" value="Insert All Data" />
                 </td>
                </tr>
               </tfoot>
           </table>
           
                </form>
  
</div>


	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

 var count = 1;

 dynamic_field(count);

 function dynamic_field(number)
 {
  html = '<tr>';
        html += '<td><input type="text" name="purchaser_name[]" class="form-control" /></td>';
        html += '<td><input type="number" min="0" name="amount[]" class="form-control" /></td>';
        html += '<td><select class="form-control" name="cash_type[] "><option value="cash">Cash</option><option value="bkash">Bkash</option></select></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn rounded-circle remove"><i class="fa fa-trash" style="font-size:24px;color:red"></i></button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn rounded-circle"><i class="fa fa-plus" style="font-size:24px;color:red"></i></button></td></tr>';
            $('tbody').html(html);
        }
 }

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{URL('/admin/save/shortPurchase')}}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
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
                    dynamic_field(1);
                   // $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                    $.notify(""+data.success+"", "success");
                }
                $('#save').prop('value','Insert All Data');
            }
        })
 });

});
</script>

@endsection