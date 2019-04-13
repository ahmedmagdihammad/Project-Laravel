@extends('layouts.master')
@section('content')

<section class="content-header">
  <h1>
  Latest Offer

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
      <a href="#" class="add-modal btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> Add Student</a>
    </div>
    <!-- /.box-header -->
    
    <!-- /.box-footer -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-hover no-margin text-center" id="table">
          <thead>
          <tr>
            <th>Title</th>
            <th>Amount</th>
            <th>Level</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
          	@foreach($offers as $offer)
	          <tr class="offer{{$offer->id}}">
	            <td><a href="#">{{$offer->title}}</a></td>
	            <td>{{$offer->amount}}</td>
	            <td>{{$offer->level}}</td>
	            <td>
	            	<a href="#" class="edit-modal btn btn-sm btn-warning btn-flat center" data-id="{{$offer->id}}" data-title="{{$offer->title}}" data-amount="{{$offer->amount}}" data-level="{{$offer->level}}"><i class="fa fa-edit"></i> Edit</a>

	            	<a href="#" class="delete-modal btn btn-sm btn-danger btn-flat center" data-id="{{$offer->id}}" data-title="{{$offer->title}}" data-amount="{{$offer->amount}}" data-level="{{$offer->level}}"><i class="fa fa-times"></i> Delete</a>
	            </td>
	          </tr>
          </tbody>
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
                    <label class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-10">
                      <input type="title" name="title" class="form-control" id="title" placeholder="Title" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">amount</label>

                    <div class="col-sm-10">
                      <input type="amount" name="amount" class="form-control" id="amount" placeholder="Amount" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Level</label>

                    <div class="col-sm-10">
                      <input type="level" name="level" class="form-control" id="level" placeholder="Level" required="">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success pull-right" id="saveoffer"><i class="fa fa-save"></i> Save</button>
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
                  {{ csrf_field() }}
                  <div class="form-group" hidden="">
                    <label class="col-sm-2 control-label">ID</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="upid"  disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-10">
                      <input type="title" class="form-control" id="uptitle" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">amount</label>

                    <div class="col-sm-10">
                      <input type="amount" class="form-control" id="upamount" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Level</label>

                    <div class="col-sm-10">
                      <input type="level" class="form-control" id="uplevel" required="">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success pull-right" id="updateoffer"><i class="fa fa-save"></i> Save</button>
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
            <div class="text-center">
              <div class="modal-body">
                <div class="form-group" hidden="">
                  <label class="col-sm-2 control-label">ID : </label>

                  <div class="col-sm-10">
                    <p id="delid" style="color: red; font-size: 20px;"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Title : </label>

                  <div class="col-sm-10">
                    <p id="deltitle" style="color: red; font-size: 20px;"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Amount : </label>

                  <div class="col-sm-10">
                    <p id="delamount" style="color: red; font-size: 20px;"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Level : </label>

                  <div class="col-sm-10">
                    <p id="dellevel" style="color: red; font-size: 20px;"></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-info pull-right" id="deleteoffer">Delete</button>
            </div>
            <!-- /.box -->
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
   // Code Ajax Add
   $(document).on('click', '.add-modal', function() {
    $('#modalInsert').modal('show');
    $('.box-title').text('Add Offer');
    $('.form-horizontal').show();
   });

   $('#saveoffer').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '{{route("offer.store")}}',
      data: {
        '_token' : $('input[name=_token]').val(),
        'title'  : $('input[name=title]').val(),
        'amount' : $('input[name=amount]').val(),
        'level'  : $('input[name=level]').val()
      },
      success: function (data) {
        $('#table').append(
          "<tr class='offer"+data.id+"'>"+
              "<td><a href='#'>"+data.title+"</a></td>"+
              "<td>"+data.amount+"</td>"+
              "<td>"+data.level+"</td>"+
              "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-title='"+data.title+"' data-amount='"+data.amount+"' data-level='"+data.level+"'><i class='fa fa-edit'></i>Edit</a>"+

                "<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='"+data.id+"' data-title='"+data.title+"' data-amount='"+data.amount+"' data-level='"+data.level+"'><i class='fa fa-times'></i> Delete</a>"+
              "</td>"+
            "</tr>"
        );
      }
    });
    $('#title').val('');
    $('#amount').val('');
    $('#level').val('');
   });

   // Code Ajax Edit
   $(document).on('click', '.edit-modal', function() {
      $('#upid').val($(this).data('id'));
      $('#uptitle').val($(this).data('title'));
      $('#upamount').val($(this).data('amount'));
      $('#uplevel').val($(this).data('level'));
      $('#modalEdit').modal('show');
      $('.box-title').text('Edit Offer');
      $('.form-horizontal').show();
   });

   $('#updateoffer').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST', 
      url: '{{route("offer.update")}}',
      data: {
        '_token': $('input[name=_token]').val(),
        'id'    : $('#upid').val(),
        'title' : $('#uptitle').val(),
        'amount': $('#upamount').val(),
        'level' : $('#uplevel').val()
      },
      success: function(data) {
        $('.offer' + data.id).replaceWith(
          "<tr class='offer"+data.id+"'>"+
              "<td><a href='#'>"+data.title+"</a></td>"+
              "<td>"+data.amount+"</td>"+
              "<td>"+data.level+"</td>"+
              "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-title='"+data.title+"' data-amount='"+data.amount+"' data-level='"+data.level+"'><i class='fa fa-edit'></i>Edit</a>"+

                "<a href='#' class='delete-modal btn btn-sm btn-danger btn-flat center' data-id='"+data.id+"' data-title='"+data.title+"' data-amount='"+data.amount+"' data-level='"+data.level+"'><i class='fa fa-times'></i> Delete</a>"+
              "</td>"+
            "</tr>"
        );
      }
    });
    $('#modalEdit').modal('hide');
   });

   // Code Ajax Delete
   $(document).on('click', '.delete-modal', function() {
    $('#delid').text($(this).data('id'));
    $('#deltitle').text($(this).data('title'));
    $('#delamount').text($(this).data('amount'));
    $('#dellevel').text($(this).data('level'));
    $('.box-title').text('Delete Offer');
    $('.modal-body').show();
    $('#modalDelete').modal('show');
   });

   $('#deleteoffer').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '{{route("offer.delete")}}',
      data: {
        '_token' : $('input[name=_token]').val(),
        'id' : $('#delid').text()
      },
      success: function(data) {
        $('.offer' + $('#delid').text()).remove();
      }
    });
    $('#modalDelete').modal('hide');
   });
</script>

@stop