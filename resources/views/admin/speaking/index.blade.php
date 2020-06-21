@extends('admin.master')

@section('body')


	 <div class="sl-page-title">
          

        <div class="card pd-20 pd-sm-40">
        	<div class="row">
        		<div class="col-md-10"><h6 class="card-body-title">Writting Questions List</h6></div>
        		<div class="col-md-2"><a href="{{URL('/admin/create/speaking')}}" class="btn btn-primary text-white">Set Question</a></div>
        	</div>
        	<br>
        	<br>
          
          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Exam Set</th>
                  <th class="wd-15p">Question</th>
                  <th class="wd-20p">Sort Code</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-10p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              	@foreach($data as $row)
                <tr>
                  <td>{{$row->exam_set}}</td>
                  <td>{{$row->question}}</td>
                  <td>{{$row->question_sort_code}}</td>
                  <td class="text-center text-white">
                  	@if($row->status==1)
                  		<p class="bg-success rounded">Available</p>
                  	@else
                  		<p class="bg-danger rounded">Closed</p>
                  	@endif
                  </td>
                  <td>
                  	@if($row->status==1)
                  		<a href="#"  class="btn btn-danger btn-icon rounded">
					  <div><i class="fa fa-toggle-off"></i></div>
					</a>
                  	@else
                  		<a href="#" class="btn btn-success btn-icon rounded">
					  <div><i class="fa fa-toggle-on"></i></div>
					</a>
                  	@endif
                  	
					<a href="" class="btn btn-primary btn-icon rounded" data-toggle="modal" data-target="#exampleModal">
					  <div><i class="fa fa-trash"></i></div>
					</a>
					<a href="#" class="btn btn-warning btn-icon rounded">
					  <div><i class="fa fa-cog"></i></div>
					</a>
                  </td>
                  
                </tr>

		        <!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        Are you sure ? You want to delete this.
				      </div>
				      <div class="modal-footer">
				      	<a type="button" href="{{URL('/admin/delete/speaking/'.$row->id)}}" class="btn btn-danger" >Delete</a>
				        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				        
				      </div>
				    </div>
				  </div>
				</div>
				<!--End Modal -->

                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>




	 
@endsection()