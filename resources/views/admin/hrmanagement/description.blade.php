@extends('layouts.master')
@section('content')
	<section class="content-header">
  <h1>
  Latest Jobs Title

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
      <a href="#" class="add-modal btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> Add Description</a>
    </div>
    <!-- /.box-header -->
    
    <!-- /.box-footer -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-hover no-margin text-center" id="table">
          <thead>
          <tr>
            <th>Job Title</th>
            <th>Debartment</th>
          </tr>
          </thead>
          <tbody>
          	@foreach($descriptions as $desc)
	          <tr class="description{{$desc->id}}">
	            <td><a href="#">{{$desc->title}}</a></td>
	            <td><a href="#">{{$desc->getDepartment->name}}</a></td>
	            <td>
	            	<a href="#" class="edit-modal btn btn-sm btn-warning btn-flat center" data-id="{{$desc->id}}" data-title="{{$desc->title}}" data-department="{{$desc->department}}"><i class="fa fa-edit"></i> Edit</a>

	            	<a href="#" class="delete-modal btn btn-sm btn-danger btn-flat center" data-id="{{$desc->id}}" data-title="{{$desc->title}}" data-department="{{$desc->department}}"><i class="fa fa-times"></i> Delete</a>
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
              <form class="form-horizontal">
              {{csrf_field()}}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="title" name="title" class="form-control" id="title" placeholder="Title"  required="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Debartment</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="department" id="department">
	                	@foreach($departments as $department)
	                  	<option value="{{$department->id}}">{{$department->name}}</option>
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
              <form class="form-horizontal">
              {{csrf_field()}}
                <div class="form-group" hidden="">
                  <label class="col-sm-2 control-label">ID</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="upid" required="" disabled="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="title" class="form-control" id="uptitle" required="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Debartment</label>

                  <div class="col-sm-10">
                    <select class="form-control" id="updepartment">
	                	@foreach($departments as $department)
	                  	<option value="{{$department->id}}">{{$department->name}}</option>
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
              <form class="form-horizontal">
              {{csrf_field()}}
                <div class="form-group" hidden="">
                  <label class="col-sm-2 control-label">ID</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="delid" disabled="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="title" class="form-control" id="deltitle" disabled="">
                    <p class="error text-center alert alert-danger hidden"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Debartment</label>

                  <div class="col-sm-10">
                    <select class="form-control" id="deldepartment" disabled="">
	                	@foreach($departments as $department)
	                  	<option value="{{$department->id}}">{{$department->name}}</option>
	                 	 @endforeach
                	</select>
                  </div>
                </div>
                
              </form>
            </div>
              <!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                <button id="delete" class="btn btn-danger pull-right"> Delete</button>
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
			$('.box-title').text('Add Job Title');
			$('.form-horizontal').show();
		});

		$('#save').click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '{{route("description.store")}}',
				data: {
					'_token' : $('input[name=_token]').val(),
					'title' : $('input[name=title]').val(),
					'department' : $('select[name=department]').val()
				},
				success: function(data) {
					$('#table').append(
						"<tr class='description"+data.id +"'>"+
		            "<td><a href='#'>"+data.title+"</a></td>"+
		            "<td><a href='#'>" + data.descriptionname + "</a></td>"+
		            "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-title='"+data.title+"' data-department='"+data.department+"'><i class='fa fa-edit'></i> Edit</a>&nbsp"+
                
		            	"<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='"+data.id+"' data-title='"+data.title+"' data-department='"+data.department+"'><i class='fa fa-times'></i> Delete</a>"+
		            "</td>"+
		          "</tr>"
					);
				}
			});
			$('#title').val('');
			$('department').val('');
		});

		$(document).on('click', '.edit-modal', function() {
			$('#upid').val($(this).data('id'));
			$('#uptitle').val($(this).data('title'));
			$('#updepartment').val($(this).data('department'));
			$('.box-title').text('Edit Jobs Title');
			$('.form-horizontal').show();
			$('#modalEdit').modal('show');
		});

		// Code Ajax Edit
		$('#update').click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '{{route("description.update")}}',
				data: {
					'_token' : $('input[name=_token]').val(),
					'id' : $('#upid').val(),
					'title' : $('#uptitle').val(),
					'department' : $('#updepartment').val()
				},
				success : function(data) {
					$('.description'+ data.id).replaceWith(
						"<tr class='description"+data.id +"'>"+
				            "<td><a href='#'>"+data.title+"</a></td>"+
				            "<td><a href='#'>" + data.descriptionname + "</a></td>"+
				            "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-title='"+data.title+"' data-department='"+data.department+"'><i class='fa fa-edit'></i> Edit</a>&nbsp"+
				            	"<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='"+data.id+"' data-title='"+data.title+"' data-department='"+data.department+"'><i class='fa fa-times'></i> Delete</a>"+
				            "</td>"+
				          "</tr>"
					);
				}
			});
			$('#modalEdit').modal('hide');
		});

		$(document).on('click', '.delete-modal', function() {
			$('#delid').val($(this).data('id'));
			$('#deltitle').val($(this).data('title'));
			$('#deldepartment').val($(this).data('department'));
			$('.box-title').text('Delete Description');
			$('.form-horizontal').show();
			$('#modalDelete').modal('show');
		});

		$('#delete').click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '{{route("description.delete")}}',
				data: {
					'_token' : $('input[name=_token]').val(),
					'id' : $('#delid').val(),
					'title' : $('#deltitle').val(),
					'department' : $('#deldepartment').val()
				},
				success: function(data) {
					$('.description' + $('#delid').val()).remove();
				}
			});
			$('#modalDelete').modal('hide');
		});

	</script>
@stop