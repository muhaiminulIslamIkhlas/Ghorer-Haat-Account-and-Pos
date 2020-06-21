@extends('admin.master')

@section('body')

	<div class="card ">
		<div class="card-header bg-primary text-white text-center text-bold">Set Ans For Question</div>
		<div class="card-body">
		<div class="container">
			<form action="{{URL('/admin/save/multiple/ans/reading')}}" method="post">
				@csrf
				<div class="form-group">
		         	<div class="row">
		         		<div class="col-md-2 text-right"><strong>Question:</strong></div>
		         		<div class="col-md-10"><select name="question_no" class="form-control">
		         			@foreach($data as $row)
		         			<option value="{{$row->id}}">{{$row->question_sort_code}}</option>
		         			@endforeach
		         		</select></div>
		         	</div>
		        </div>
		        <div class="form-group">
		         	<div class="row">
		         		<div class="col-md-2 text-right"><strong>Ans:</strong></div>
		         		<div class="col-md-10"><textarea name="ans" class="form-control"></textarea></div>
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