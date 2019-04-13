@extends('layouts.master')
@section('content')

<section class="content-header">
  <h1>
  Latest Student

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
      <a href="#" class="addStudent btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> Add Student</a>
    </div>
    <!-- /.box-header -->
    
    <!-- /.box-footer -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-hover no-margin text-center" id="table">
          <thead>
          <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Branch</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
          	@foreach($students as $student)
	          <tr class="student{{$student->id}}">
	            <td><a href="#" id="tbfullname">{{$student->fullname}}</a></td>
	            <td id="tbemail">{{$student->email}}</td>
	            <td id="tbmobile">{{$student->mobile}}</td>
	            <td>
	              <div id="tbbranch" class="sparkbar" data-color="#00a65a" data-height="20">{{$student->getBranch->name}}</div>
	            </td>
	            <td>
	            	<a href="#" class="edit-modal btn btn-sm btn-warning btn-flat center" data-id="{{$student->id}}" data-fullname="{{$student->fullname}}" data-email="{{$student->email}}" data-mobile="{{$student->mobile}}" data-name="{{$student->name}}" data-branch="{{$student->branch}}"><i class="fa fa-edit"></i> Edit</a>

	            	<a href="#" class="delete-modal btn btn-sm btn-danger btn-flat center" data-id="{{$student->id}}" data-fullname="{{$student->fullname}}" data-email="{{$student->email}}" data-mobile="{{$student->mobile}}" data-name="{{$student->name}}" data-branch="{{$student->branch}}"><i class="fa fa-times"></i> Delete</a>
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

  <!-- Modal Insert -->
	<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <form class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
	                <label class="col-sm-2 control-label">Name</label>
	              	<div class="col-sm-10">
	                  	<select class="form-control" name="branch">
	                    @foreach($branches as $branch)
	                      <option value="{{$branch->id}}">{{$branch->name}}</option>
	                     @endforeach
	                    </select>
	                </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Full Name</label>

                    <div class="col-sm-10">
                      <input type="fullname" class="form-control" id="fullname" placeholder="Full Name" name="fullname" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mobile</label>

                    <div class="col-sm-10">
                      <input type="mobile" class="form-control" id="mobile" placeholder="Mobile" name="mobile" required="">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success pull-right" id="savestudent"><i class="fa fa-save"></i> Save</button>
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
                <h3 class="box-title">Add Student</h3>
              </div>
                <div class="box-body">
                  <form class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group" hidden="">
                      <label class="control-lable col-sm-2" for="id">ID</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="upid" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Fullname</label>

                      <div class="col-sm-10">
                        <input type="fullname" class="form-control" id="upfullname" placeholder="" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Email</label>

                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="upemail" placeholder="" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Mobile</label>

                      <div class="col-sm-10">
                        <input type="mobile" class="form-control" id="upmobile" placeholder=""required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Branch</label>
                      <div class="col-sm-10">
                          <select class="form-control" id="upbranch">
                          @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                           @endforeach
                          </select>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button class="btn btn-danger pull-right" data-dismiss="modal">Cancel</a>
                  <button type="button" class="btn btn-success pull-right" id="updatestudent">Save</button>
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
              <div class="container">
              <div class="form-group" hidden="">
                <label class="col-sm-2 control-label">ID</label>

                <div class="col-sm-10">
                  <p id="delid" style="color: red; font-size: 20px;"></p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Full Name : </label>

                <div class="col-sm-10">
                  <p id="delfullname" style="color: red; font-size: 20px;"></p>
                </div>
              </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email : </label>

                  <div class="col-sm-10">
                    <p id="delemail" style="color: red; font-size: 20px;"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mobile : </label>

                  <div class="col-sm-10">
                    <p id="delmobile" style="color: red; font-size: 20px;"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Branch : </label>

                  <div class="col-sm-10">
                    <p id="delbranch" style="color: red; font-size: 20px;"></p>

                  </div>
                </div>
                
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

</section>

<script type="text/javascript">
  
  // Code Ajax Add
  $(document).on('click', '.addStudent', function() {
    $('#modalInsert').modal('show');
    $('.form-horizontal').show();
    $('.box-title').text('Add Student');
  });

  $('#savestudent').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '{{route("student.store")}}',
      data: {
        '_token' : $('input[name=_token]').val(),
        'fullname' : $('input[name=fullname]').val(),
        'email' : $('input[name=email]').val(),
        'mobile' : $('input[name=mobile]').val(),
        'branch' : $('select[name=branch]').val()
      },
      success: function(data) {
        
        $('#table').append(
          "<tr class='student" + data.id + "'>"+
            "<td><a href='#' id='tbfullname'>"+data.fullname+"</a></td>"+
              "<td id='tbemail'>"+data.email+"</td>"+
              "<td id='tbmobile'>"+data.mobile+"</td>"+
             "<td><div id='tbbranch' class='sparkbar' data-color='#00a65a' data-height='20'>"+data.branchname+"</div></td>"+
              "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-fullname='"+data.fullname+"' data-email='"+data.email+"' data-mobile='"+data.mobile+"' data-name='"+data.name+"' data-branch='"+data.branch+"'><i class='fa fa-edit'></i>Edit</a>"+
                "<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='"+data.id+"' data-fullname='"+data.fullname+"' data-email='"+data.email+"' data-mobile='"+data.mobile+"' data-name='"+data.name+"' data-branch='"+data.branch+"'><i class='fa fa-times'></i> Delete</a>"+
              "</td>"+
            "</tr>"
        );
      }
    });
    $('#fullname').val('');
    $('#email').val('');
    $('#mobile').val('');
  });

  $(document).on('click', '.edit-modal', function() {
    $('#upid').val($(this).data('id'));
    $('#upfullname').val($(this).data('fullname'));
    $('#upemail').val($(this).data('email'));
    $('#upmobile').val($(this).data('mobile'));
    $('#upbranch').val($(this).data('branch'));
    $('.form-horizontal').show();
    $('#modalEdit').modal('show');
  });

  $('#updatestudent').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '{{route("student.update")}}',
      data: {
        '_token'  : $('input[name=_token]').val(),
        'id'      : $('#upid').val(),
        'fullname': $('#upfullname').val(),
        'email'   : $('#upemail').val(),
        'mobile'  : $('#upmobile').val(),
        'branch'  : $('#upbranch').val()
      },
      success: function(data) {
        $('.student' + data.id).replaceWith(" " +
          "<tr class='student" + data.id + "'>"+
            "<td><a href='#' id='tbfullname'>"+data.fullname+"</a></td>"+
              "<td id='tbemail'>"+data.email+"</td>"+
              "<td id='tbmobile'>"+data.mobile+"</td>"+
             "<td><div id='tbbranch' class='sparkbar' data-color='#00a65a' data-height='20'>"+data.branchname+"</div></td>"+
              "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-fullname='"+data.fullname+"' data-email='"+data.email+"' data-mobile='"+data.mobile+"' data-name='"+data.name+"' data-branch='"+data.branch+"'><i class='fa fa-edit'></i>Edit</a>"+
                "<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='"+data.id+"' data-fullname='"+data.fullname+"' data-email='"+data.email+"' data-mobile='"+data.mobile+"' data-name='"+data.name+"' data-branch='"+data.branch+"'><i class='fa fa-times'></i> Delete</a>"+
              "</td>"+
            "</tr>"
        );
      }
    });
    $('#modalEdit').modal('hide');
  });

  // Code ajax Delete
  $(document).on('click', '.delete-modal', function() {
    $('#modalDelete').modal('show');
    $('.modal-body').show();
    $('.box-title').text('Delete Student');
    $('#delid').text($(this).data('id'));
    $('#delfullname').text($(this).data('fullname'));
    $('#delemail').text($(this).data('email'));
    $('#delmobile').text($(this).data('mobile'));
    $('#delbranch').text($(this).data('branch'));
  });

  $('#delete').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '{{route("student.delete")}}',
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