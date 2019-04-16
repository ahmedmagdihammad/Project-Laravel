@extends('layouts.master')
@section('content')
	<section class="content-header">
  <h1>
  Latest Department

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
          </tr>
          </thead>
          <tbody>
          	@foreach($departments as $depart)
	          <tr class="department{{$depart->id}}">
	            <td><a href="#" id="tbfullname">{{$depart->name}}</a></td>
	            <td>
	            	<a href="#" class="edit-modal btn btn-sm btn-warning btn-flat center" data-id="{{$depart->id}}" data-name="{{$depart->name}}"><i class="fa fa-edit"></i> Edit</a>

	            	<a href="#" class="delete-modal btn btn-sm btn-danger btn-flat center" data-id="{{$depart->id}}" data-name="{{$depart->name}}"><i class="fa fa-times"></i> Delete</a>
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
                  <label class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="name" name="name" class="form-control" id="name" placeholder="Name"  required="">
                    <p class="error text-center alert alert-danger hidden"></p>
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
                    <label class="control-lable col-sm-2" for="id">ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="upid" disabled>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="name" class="form-control" id="upname" required="">
                    <!-- <p class="error text-center alert alert-danger hidden"></p> -->
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

	<!-- Modal Add -->
	<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              	<form class="form-horizontal" id="upform-horizontal ">
                  {{ csrf_field() }}
                  <div class="form-group" hidden="">
                    <label class="control-lable col-sm-2" for="id">ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="delid" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="name" class="form-control" id="delname" required="">
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
		$(document).on('click', '.add-modal', function() {
			$('#modalInsert').modal('show');
			$('.box-title').text('Add Department');
			$('.form-horizontal').show();
		});

		$('#save').click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '{{route("department.store")}}',
				data: {
					'_token' : $('input[name=_token]').val(),
					'name' : $('input[name=name]').val()
				},
				success: function(data) {
					$('#table').append(
						"<tr class='department"+data.id+"'>"+
				            "<td><a href='#' id='tbfullname'>"+data.name+"</a></td>"+
				            "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-name='"+data.name+"'><i class='fa fa-edit'></i> Edit</a>&nbsp"+
				            	"<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='"+data.id+"' data-name='"+data.name+"'><i class='fa fa-times'></i> Delete</a>"+
				            "</td>"+
			            "</tr>"
					);
				}
			});
			$('#name').val('');
		});

		$(document).on('click', '.edit-modal', function() {
	      $('#upid').val($(this).data('id'));
	      $('#upname').val($(this).data('name'));
	      $('.box-title').text('Edit Department');
	      $('.form-horizontal').show();
	      $('#modalEdit').modal('show');
	    });

		$('#update').click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '{{route("department.update")}}',
				data: {
					'_token' : $('input[name=_token]').val(),
					'id' : $('#upid').val(),
					'name' : $('#upname').val()
				},
				success: function(data) {
					$('.department'+ data.id).replaceWith(
                  "<tr class='department"+data.id+"'>"+
				            "<td><a href='#' id='tbfullname'>"+data.name+"</a></td>"+
				            "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-name='"+data.name+"'><i class='fa fa-edit'></i> Edit</a>&nbsp"+
				            	"<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='"+data.id+"' data-name='"+data.name+"'><i class='fa fa-times'></i> Delete</a>"+
				            "</td>"+
			            "</tr>"
					);
				}
			});
			$('#modalEdit').modal('hide');
		})
		
		$(document).on('click', '.delete-modal', function() {
			$('#delid').val($(this).data('id'));
			$('#delname').val($(this).data('name'));
			$('.box-title').text('Delete Department');
			$('.form-horizontal').show();
			$('#modalDelete').modal('show');
		});

		$('#delete').click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '{{route("department.delete")}}',
				data: {
					'_token' : $('input[name=_token]').val(),
					'id' : $('#delid').val()
				},
				success: function(data) {
					$('.department' + $('#delid').val()).remove();
				}
			});
			$('#modalDelete').modal('hide');
		});

	</script>
@stop