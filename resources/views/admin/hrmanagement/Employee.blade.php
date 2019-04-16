@extends('layouts.master')
@section('content')
<section class="content-header">
  <h1>
  Latest Employee

  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
  </ol>
</section>

<section class="content">
  <!-- TABLE: LATEST ORDERS -->
  <div class="box box-info">
  <!-- /.box-body -->
    <div class="box-header clearfix">
      <a href="#" class="add-modal btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> Add Department</a>
    </div>
    <!-- /.box-header -->
    
    <!-- /.box-footer -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-hover no-margin text-center" id="table">
          <thead>
          <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Job Title</th>
          </tr>
          </thead>
          <tbody>
            @foreach($employees as $emp)
	          <tr class="employe{{$emp->id}}">
	            <td><a href="#">{{$emp->name}}</a></td>
	            <td>{{$emp->mobile}}</td>
	            <td>{{$emp->email}}</td>
	            <td>{{$emp->getDescription->title}}</td>
	            <td>
	            	<a href="#" class="edit-modal btn btn-sm btn-warning btn-flat center" data-id="{{$emp->id}}" data-name="{{$emp->name}}" data-mobile="{{$emp->mobile}}" data-email="{{$emp->email}}" data-job="{{$emp->job}}"><i class="fa fa-edit"></i> Edit</a>

	            	<a href="#" class="delete-modal btn btn-sm btn-danger btn-flat center" data-id="{{$emp->id}}" data-name="{{$emp->name}}" data-mobile="{{$emp->mobile}}" data-email="{{$emp->email}}" data-job="{{$emp->job}}" ><i class="fa fa-times"></i> Delete</a>
	            </td>
	          </tr>
	        @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    
  </div>

   <!-- Modal Add -->
	<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <form class="form-horizontal" role="form">
              {{csrf_field()}}
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="title">Name</label>

                  <div class="col-sm-10">
                    <input type="name" name="name" class="form-control" id="name" placeholder="Your Name Here"  required="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="mobile">Mobile</label>

                  <div class="col-sm-10">
                    <input type="mobile" name="mobile" class="form-control" id="mobile" placeholder="Your Mobile Here"  required="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="email">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Your Email Here"  required="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Job Title</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="job" id="job"  for="job">
	                	@foreach($description as $job)
	                  	<option value="{{$job->id}}">{{$job->title}}</option>
	                 	 @endforeach
                	</select>
                  </div>
                </div>
              </form>
            </div>
              <!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
                <button id="save" class="btn btn-success pull-right"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
	    </div>
	  </div>
	</div>

	<!-- Modal Edit -->
	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <form class="form-horizontal" role="form">
              {{csrf_field()}}
                <div class="form-group" hidden="">
                  <label class="col-sm-2 control-label">ID</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="upid" disabled="" required="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="name" class="form-control" id="upname" required="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="mobile">Mobile</label>

                  <div class="col-sm-10">
                    <input type="mobile" class="form-control" id="upmobile" required="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="email">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="upemail" required>
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Job Title</label>

                  <div class="col-sm-10">
                    <select class="form-control" id="upjob">
	                	@foreach($description as $job)
	                  	<option value="{{$job->id}}">{{$job->title}}</option>
	                 	 @endforeach
                	</select>
                  </div>
                </div>
              </form>
            </div>
              <!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
                <button id="update" class="btn btn-success pull-right"><i class="fa fa-save"></i> Update</button>
              </form>
            </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
	    </div>
	  </div>
	</div>

	<!-- Modal Delete -->
	<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <form class="form-horizontal" role="form">
              {{csrf_field()}}
                <div class="form-group" hidden="">
                  <label class="col-sm-2 control-label">ID</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="delid" disabled="" required="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="name" class="form-control" id="delname" required="" disabled="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="mobile">Mobile</label>

                  <div class="col-sm-10">
                    <input type="mobile" class="form-control" id="delmobile" required="" disabled="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="email">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="delemail" required disabled="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Job Title</label>

                  <div class="col-sm-10">
                    <select class="form-control" id="deljob">
	                	@foreach($description as $job)
	                  	<option value="{{$job->id}}" disabled="">{{$job->title}}</option>
	                 	 @endforeach
                	</select>
                  </div>
                </div>
              </form>
            </div>
              <!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                <button id="delete" class="btn btn-danger pull-right"> Delete </button>
              </form>
            </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		// Code Ajax Add
		$(document).on('click', '.add-modal', function() {
			$('#modalInsert').modal('show');
			$('.form-horizontal').show();
			$('.box-title').text('Add Employees')
		});

		$('#save').click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST', 
				url: '{{route("employees.store")}}',
				data: {
					'_token' : $('input[name=_token]').val(),
					'name' : $('input[name=name]').val(),
					'mobile' : $('input[name=mobile]').val(),
					'email' : $('input[name=email]').val(),
					'job' : $('select[name=job]').val(),
				},
				success: function(data) {
					if ((data.errors)) {
						$('.error').removeClass('hidden');
						$('.error').text(data.errors.name);
						$('.error').text(data.errors.mobile);
						$('.error').text(data.errors.email);
						$('.error').text(data.errors.job);
					}else {
						$('#table').append(
							"<tr class='employe"+ data.id +"'>"+
					            "<td><a href='#'>"+data.name+"</a></td>"+
					            "<td>"+data.mobile+"</td>"+
					            "<td>"+data.email +"</td>"+
					            "<td>"+data.employetitle+"</td>"+
					            "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-name='"+data.name+"' data-mobile='"+data.mobile+"' data-email='"+data.email+"' data-job='"+ data.job +"'><i class='fa fa-edit'></i> Edit</a>&nbsp"+
					            	"<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='"+data.id+"' data-name='"+data.name+"' data-mobile='"+data.mobile+"' data-email='"+data.email+"' data-job='"+ data.job +"'><i class='fa fa-times'></i> Delete</a>"+
					            "</td>"+
					          "</tr>"
						);
				  }
				},
			});
			$('#name').val('');
			$('#mobile').val('');
			$('#email').val('');
			$('#job').val('');
		});

		$(document).on('click', '.edit-modal', function() {
			$('#upid').val($(this).data('id'));
			$('#upname').val($(this).data('name'));
			$('#upmobile').val($(this).data('mobile'));
			$('#upemail').val($(this).data('email'));
			$('#upjob').val($(this).data('job'));
			$('#modalEdit').modal('show');
			$('.form-horizontal').show();
			$('.box-title').text('Edit Employees')
		});

		// Codo Ajax Edit
		$('#update').click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST', 
				url: '{{route("employees.update")}}',
				data: {
					'_token' : $('input[name=_token]').val(),
					'id' : $('#upid').val(),
					'name' : $('#upname').val(),
					'mobile' : $('#upmobile').val(),
					'email' : $('#upemail').val(),
					'job' : $('#upjob').val(),
				},
				success: function(data) {
					$('.employe'+ data.id).replaceWith(
  					"<tr class='employe"+ data.id +"'>"+
  	          "<td><a href='#'>"+data.name+"</a></td>"+
	            "<td>"+data.mobile+"</td>"+
	            "<td>"+data.email +"</td>"+
	            "<td>"+data.employetitle+"</td>"+
	            "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-name='"+data.name+"' data-mobile='"+data.mobile+"' data-email='"+data.email+"' data-job='"+ data.job +"'><i class='fa fa-edit'></i> Edit</a>&nbsp"+
  	            	"<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='"+data.id+"' data-name='"+data.name+"' data-mobile='"+data.mobile+"' data-email='"+data.email+"' data-job='"+ data.job +"'><i class='fa fa-times'></i> Delete</a>"+
	            "</td>"+
	          "</tr>"
			   );
				}
			});
			$('#modalEdit').modal('hide');
		});

		// Code Ajax Delete
		$(document).on('click', '.delete-modal', function() {
			$('#delid').val($(this).data('id'));
			$('#delname').val($(this).data('name'));
			$('#delmobile').val($(this).data('mobile'));
			$('#delemail').val($(this).data('email'));
			$('#deljob').val($(this).data('job'));
			$('#modalDelete').modal('show');
			$('.form-horizontal').show();
			$('.box-title').text('Delete Employees')
		});

		// Codo Ajax Edit
		$('#delete').click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST', 
				url: '{{route("employees.delete")}}',
				data: {
					'_token' : $('input[name=_token]').val(),
					'id' : $('#delid').val(),
				},
				success: function(data) {
					$('.employe'+ $('#delid').val()).remove();
				},
			});
			$('#modalDelete').modal('hide');
		});
	</script>

@stop