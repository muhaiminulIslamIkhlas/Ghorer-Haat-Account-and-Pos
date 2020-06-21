@extends('admin.master')

@section('body')

	<div class="card ">
		<div class="card-header bg-primary text-white text-center text-bold">Set Question For Writting</div>
		<div class="card-body">
		<div class="container">
			<form action="{{URL('/admin/save/writting')}}" method="post">
				@csrf
				<div class="form-group">
		         	<div class="row">
		         		<div class="col-md-2 text-right"><strong>Exam Set:</strong></div>
		         		<div class="col-md-10"><select name="exam_set_id" class="form-control">
		         			@foreach($exam_set as $row)
		         			<option value="{{$row->id}}">{{$row->exam_set}}</option>
		         			@endforeach
		         		</select></div>
		         	</div>
		        </div>
		        <div class="form-group">
		         	<div class="row">
		         		<div class="col-md-2 text-right"><strong>Question:</strong></div>
		         		<div class="col-md-10"><textarea name="question" class="form-control"></textarea></div>
		         	</div>
		        </div>
		         <div class="form-group">
		         	<div class="row">
		         		<div class="col-md-2 text-right"><strong>Question Sort Code:</strong></div>
		         		<div class="col-md-10"><input type="text" name="question_sort_code" class="form-control" placeholder="Question Sort Code"></div>
		         	</div>
		        </div>
		        
		        <div class="form-group">
		        	<div class="row">
		         		<div class="col-md-2 text-right"></div>
		         		<div><input type="submit" class="btn btn-success btn-submit rounded" value="Submit" /></div>
		         	</div>
		            
		        </div>
			</form>
		</div>
		</div>
	</div>

@endsection