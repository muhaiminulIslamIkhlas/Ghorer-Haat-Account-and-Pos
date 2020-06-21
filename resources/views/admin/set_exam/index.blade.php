@extends('admin.master')

@section('body')


	 <div class="sl-page-title">
          

        <div class="card pd-20 pd-sm-40">
        	<div class="row">
        		<div class="col-md-10"><h6 class="card-body-title">Packages List</h6></div>
        		<div class="col-md-2"><a href="{{URL('/admin/add/exam_set')}}" class="btn btn-primary text-white">Exam Set</a></div>
        	</div>
        	<br>
        	<br>
          
          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Exam Set</th>
                  
                  <th class="wd-10p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              	@foreach($data as $row)
                <tr>
                  <td>{{$row->exam_set}}</td>
                  
                  <td>
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
				      	<a type="button" href="{{URL('/admin/exam_set/delete/'.$row->id)}}" class="btn btn-danger" >Delete</a>
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