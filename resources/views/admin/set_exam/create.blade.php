@extends('admin.master')

@section('body')

	<div class="card pd-20 pd-sm-40">
		<div class="container">
			<form action="{{route('create-exam_set')}}" method="post">
				@csrf
				<div class="form-group">
		         	<div class="row">
		         		<div class="col-md-2 text-right"><strong>Exam Set:</strong></div>
		         		<div class="col-md-10"><input type="text" name="exam_set" class="form-control" placeholder="Exam Set"></div>
		         	</div>
		        </div>
		        <div class="form-group">
		        	<div class="row">
		         		<div class="col-md-2 text-right"></div>
		         		<div><input type="submit" id="send_form" class="btn btn-success btn-submit" value="Submit" /></div>
		         	</div>
		            
		        </div>
			</form>
		</div>
	</div>

@endsection