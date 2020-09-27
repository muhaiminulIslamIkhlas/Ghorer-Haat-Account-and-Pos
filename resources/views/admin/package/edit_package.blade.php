@extends('admin.master')

@section('body')
 <style>
   .error{ color:red; } 
  </style>


	<div class="card pd-20 pd-sm-40">

  
 <div class="row">
 	<div class="card-title col-md-10 text-primary">
 		Update Package
 	</div>
 	<div class="col-md-2"><a href="{{route('all-package')}}" class="btn btn-primary text-white">Back to list</a></div>
 </div>

  
<div class="container">
    </h2>
    <br>
    <br>
    
 
    	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
        </div>

        <form id="myForm">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Package Name:</label>
            <input type="text" name="package_name" class="form-control" value="{{$data->package_name}}" disabled>
        </div>


        <div class="form-group">
            <label>Details:</label>
            <input type="text" name="details" class="form-control" value="{{$data->details}}">
        </div>


        <div class="form-group">
            <strong>Cost:</strong>
            <input type="text" name="cost" class="form-control" value="{{$data->cost}}">
        </div>


        


        <div class="form-group">
            <button id="send_form" class="btn btn-success btn-submit">Submit</button>
        </div>
    </form>
  
</div>
</div><!-- card -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>


<script type="text/javascript">


    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var package_name = $("input[name='package_name']").val();
            var details = $("input[name='details']").val();
            var cost = $("input[name='cost']").val();
            $('#send_form').html('Sending..');

            $.ajax({
                url: "/TravelCompany/public/admin/update/packages/"+{{$data->id}},
                type:'POST',
                data: {_token:_token, package_name:package_name, details:details, cost:cost},
                success: function(data) {
                	
                	 
                	$('#send_form').html('Submit');
                    if($.isEmptyObject(data.error)){
                    	document.getElementById("myForm").reset();
                    	$(".print-error-msg").hide;
                    	window.location.replace("/TravelCompany/public/admin/all/packages");
                        $.notify("Data updated successfully","warn");
                    }else{
                    	$(".print-error-msg").show;
                        printErrorMsg(data.error);
                    }
                }
            });


        }); 


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>
@endsection()