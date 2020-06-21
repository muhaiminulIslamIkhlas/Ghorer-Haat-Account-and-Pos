@extends('admin.master')

@section('body')



	<div class="card">
		<br>
		<br>
		<br>
		<div class="container">
			<form action="{{URL('/admin/upload/save/listening')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
		         	<div class="row">
		         		<div class="col-md-2 text-right"><strong>Exam Set:</strong></div>
		         		<div class="col-md-10"><select id="selectlist" name="exam_set_id" class="form-control">
		         			@foreach($data as $row)
		         			<option value="{{$row->id}}">{{$row->exam_set}}</option>
		         			@endforeach
		         		</select></div>
		         	</div>
		        </div>
		        	<div class="form-group">
		         	<div class="row">
		         		<div class="col-md-2 text-right"><strong>Audio File:</strong></div>
		         		<div class="col-md-10"><input type="file" class="form-control" name="audio"></div>
		         	</div>
		        </div>
				 </div>
		        	<div class="form-group">
		         	<div class="row">
		         		<div class="col-md-2 text-right"><input type="submit" class="btn btn-success" value="Upload"></div>
		         		<div class="col-md-10"></div>
		         	</div>
		        </div>			
			</form>
</div>


@endsection