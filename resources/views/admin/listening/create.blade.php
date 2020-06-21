@extends('admin.master')

@section('body')



	<div class="card">
		<br>
		<br>
		<br>
		<div class="container">
			<form enctype="multipart/form-data">
			{{ csrf_field() }}
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
		<div class="card">
			<div class="card-header bg-primary text-white">
				Record Audio
			</div>
			<div class="card-body">
				<div id="controls">
			  	 <button id="recordButton" >Record</button>
			  	 <button id="pauseButton" disabled>Pause</button>
			  	 <button id="stopButton" disabled>Stop</button>
			    </div>
			</div>
			<div class="card-footer" style="list-style: none;">
				<p><strong>Recordings:</strong></p>
  				<ol id="recordingsList"></ol>
			</div>
		</div>
		 
    
    <div id="formats" class="text-white">Format: start recording to see sample rate</div>
  	
	</div>
</form>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
	<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
  	<script src="{{asset('backend/js/app.js')}}"></script>

@endsection