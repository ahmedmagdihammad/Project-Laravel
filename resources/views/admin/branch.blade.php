@extends('layouts.master')
@section('content')

<section class="content-header">
  <h1>
  Latest Branch

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
      <a href="#" class="add btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> Add Student</a>
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
            <th>Address</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
          	@foreach($branches as $branch)
	          <tr class="student{{$branch->id}}">
	            <td><a href="#" id="tbfullname">{{$branch->name}}</a></td>
	            <td id="tbemail">{{$branch->mobile}}</td>
	            <td id="tbmobile">{{$branch->address}}</td>
	            <td>
	            	<a href="#" class="edit-modal btn btn-sm btn-warning btn-flat center" data-id="{{$branch->id}}" data-name="{{$branch->name}}" data-mobile="{{$branch->mobile}}" data-address="{{$branch->address}}"><i class="fa fa-edit"></i> Edit</a>

	            	<a href="#" class="delete-modal btn btn-sm btn-danger btn-flat center" data-id="{{$branch->id}}" data-name="{{$branch->name}}" data-mobile="{{$branch->mobile}}" data-address="{{$branch->address}}"><i class="fa fa-times"></i> Delete</a>
	            </td>
	          </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    
  </div>
  <!-- /.box -->

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
                    <input type="name" name="name" class="form-control" id="addname" placeholder="Name" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mobile</label>

                  <div class="col-sm-10">
                    <input type="mobile" name="mobile" class="form-control" id="addmobile" placeholder="Mobile" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input type="address" name="address" class="form-control" id="addaddress" placeholder="Address"  required="">
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
                <form class="form-horizontal" id="upform-horizontal ">
                  {{ csrf_field() }}
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
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mobile</label>

                    <div class="col-sm-10">
                      <input type="mobile" class="form-control" id="upmobile" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="address" class="form-control" id="upaddress" required="">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success pull-right" id="editSave"><i class="fa fa-save"></i> Update</button>
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
              <div class="modal-body">
                <div class="form-group" hidden="">
                  <label class="col-sm-2 control-label">ID</label>

                  <div class="col-sm-10">
                    <p id="delid" style="color: red; font-size: 20px;"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <p id="delname" style="color: red; font-size: 20px;"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mobile</label>

                  <div class="col-sm-10">
                    <p id="delmobile" style="color: red; font-size: 20px;"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <p id="deladdress" style="color: red; font-size: 20px;"></p>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger pull-right" id="delete">Delete</button>
              </div>
              <!-- /.box -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript">
    // Code Ajax Insert
    $(document).on('click', '.add', function(){
      $('#modalInsert').modal('show');
      $('.form-horizontal').show();
      $('.box-title').text('Add Student');
    });

    $('#save').click(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: '{{route("branch.store")}}',
        data: {
          '_token' : $('input[name=_token]').val(),
          'name'   : $('input[name=name]').val(),
          'mobile' : $('input[name=mobile]').val(),
          'address'  : $('input[name=address]').val()
        },
        success: function(data) {
          $('#table').append(
            "<tr class='student" + data.id + "'>"+
              "<td><a href='#'' id='tbfullname'> " + data.name + "</a></td>"+
              "<td id='tbemail'> " + data.mobile + "</td>"+
              "<td id='tbmobile'> " + data.address + "</td>"+
              "<td><a href='#'' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='" + data.id +"' data-name='" + data.name + "' data-mobile='" + data.mobile + "' data-address='" + data.address + "'><i class='fa fa-edit'></i>Edit</a>&nbsp"+
                "<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='" + data.id + "' data-name='" + data.name + "' data-mobile='" + data.mobile +"' data-address='" + data.address + "'><i class='fa fa-times'></i> Delete</a>"+
              "</td>"+
            "</tr>"
          );
        }
      });
      $('#addname').val('');
      $('#addmobile').val('');
      $('#addaddress').val('');
    });

    $(document).on('click', '.edit-modal', function() {
      $('#upid').val($(this).data('id'));
      $('#upname').val($(this).data('name'));
      $('#upmobile').val($(this).data('mobile'));
      $('#upaddress').val($(this).data('address'));
      $('#modalEdit').modal('show');
      $('#upform-horizontal').show();
      $('.box-title').text('Edit Student');
    });

    // Code Ajax Edit
    $('#editSave').click(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: '{{route("branch.update")}}',
        data: {
          '_token'  : $('input[name=_token]').val(),
          'id'      : $('#upid').val(),
          'name'    : $('#upname').val(),
          'mobile'  : $('#upmobile').val(),
          'address' : $('#upaddress').val()
        },
        success: function(data) {
          $('.student' + data.id).replaceWith(" " +
            "<tr class='student" + data.id + "'>"+
             "<td><a href='#' id='tbfullname'>" + data.name + "</a></td>"+
              "<td id='tbemail'>" + data.mobile + "</td>"+
              "<td id='tbmobile'>" + data.address + "</td>"+
              "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='" + data.id + "' data-name='" + data.name + "' data-mobile='" + data.mobile + "' data-address='" + data.address + "'><i class='fa fa-edit'></i> Edit</a>&nbsp"+
                "<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='" + data.id + "' data-name='" + data.name + "' data-mobile='" + data.mobile + "' data-address='" + data.address + "'><i class='fa fa-times'></i> Delete</a>"+
              "</td>"+
            "</tr>"
          );
        }
      });
      $('#modalEdit').modal('hide');
    });

    $(document).on('click', '.delete-modal', function() {
      $('#modalDelete').modal('show');
      $('.modal-body').show();
      $('.box-title').text('Delete Student');
      $('#delname').text($(this).data('name'));
      $('#delmobile').text($(this).data('mobile'));
      $('#deladdress').text($(this).data('address'));
      $('#delid').text($(this).data('id'));
    });

    $('#delete').click(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: '{{route("branch.delete")}}',
        data: {
          '_token'  : $('input[name=_token]').val(),
          'id' : $('#delid').text()
        },
        success: function(data) {
            $('.student' + $('#delid').text()).remove();
        }
      });
      $('#modalDelete').modal('hide');
    });

  </script>

@stop