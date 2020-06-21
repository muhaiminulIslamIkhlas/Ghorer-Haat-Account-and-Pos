<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        

        <title>Exam</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        </head>
    <body>


    	<br>
    	<div class="ml-4 mr-2">
    		<div class="row">
    			<div class="col-md-3">
    				
                    <div class=" mb-2">
                    <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                      <div class="card-header bg-white text-left">
                        
                      </div>
                      <div class="card-body">
                        
                         <p class="card-text text-danger">
                           <a href="{{URL('/exam/question/writting')}}" class="btn btn-primary btn-block text-dark bg-white" ><strong>Writting</strong></a><br>
                           <a href="{{URL('/exam/question/speaking')}}" class="btn btn-primary btn-block text-dark bg-white" ><strong>Speaking</strong></a><br>
                           <a href="#" class="btn btn-primary btn-block text-dark bg-white"><strong>Listening</strong></a><br>
                           <a href="{{URL('/exam/question/reading')}}" class="btn btn-primary btn-block text-dark bg-white" ><strong>Reading</strong></a><br>
                           
                        </p>
                        
                      </div>
                      
                    </div>
                    
                </div>
    			</div>
    			<div class="col-md-9">
    				
                    <div class="mr-1 mb-2">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                    	@foreach($data as $row)
                      <div class="card ">
                      	<div class="card m-2">
                      		<p class="p-1"><strong>Read the passage below and summarize it using one sentence. Type your response in the box at the bottom of the screen. You have 10 minutes to finish this task. Your response will be judged on the quality of your answer.</strong></p>
                      	</div>
                      	
                      	<p class="p-2">
							{{$row->question}}
						</p>
						<br>
						<div class="card m-2">
                      		<div class="card-header bg-primary text-white">Write Your Answer Here</div>
                      		<div class="card-body">
                      		<textarea class="form-control"></textarea></div>
                      		
                      	</div>
                      </div>
                      @endforeach
                    </div>
                    
                </div>
    			</div>
    		</div>
    	</div>






   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>



