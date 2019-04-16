@extends('layouts.master')
@section('content')
<!-- TABLE: LATEST ORDERS -->
<div class="box box-info">
  <div class="box-header with-border">
    <a href="#" class="add-modal btn btn-sm btn-primary btn-flat pull-right"> <i class="fa fa-plus"></i> Add Payment</a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin text-center" id="table">
        <thead>
        <tr>
          <th>Fullname</th>
          <th>offer</th>
          <th>Branch</th>
          <th>Amount</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
        <tr class="payment{{$payment->id}}">
          <td><a href="#">{{$payment->getStudent->fullname}}</a></td>
          <td>{{$payment->getOffer->title}}</td>
          <td>{{$payment->getBranch->name}}</td>
          <td><span>{{$payment->amount}}</span></td>
          <td>
            <a href="#" class="edit-modal btn btn-sm btn-warning btn-flat center" data-id="{{$payment->id}}" data-student="{{$payment->student}}" data-offer="{{$payment->offer}}" data-branch="{{$payment->branch}}" data-amount="{{$payment->amount}}"><i class="fa fa-edit"></i> Edit</a>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.box -->
</div>

 <!-- Modal Insert -->
  <div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <form class="form-horizontal" >
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Full Name</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="student" id="student">
                    @foreach($students as $student)
                      <option value="{{$student->id}}">{{$student->fullname}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Offer</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="offer" id="offer">
                    @foreach($offers as $offer)
                      <option value="{{$offer->id}}">{{$offer->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Branch</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="branch" id="branch">
                    @foreach($students as $student)
                      <option value="{{$student->getBranch->id}}">{{$student->getBranch->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
                    <input type="amount" class="form-control" name="amount" id="amount" required="">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn btn-success pull-right" id="save"><i class="fa fa-save"></i> Save</button>
                </form>
                
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
      </div>
    </div>
  </div>
  <!-- End Modal Insert -->

   <!-- Modal Insert -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <form class="form-horizontal" >
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group" hidden="">
                  <label class="col-sm-2 control-label">ID</label>

                  <div class="col-sm-10">
                    <input type="amount" class="form-control" id="upid" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Full Name</label>

                  <div class="col-sm-10">
                    <select class="form-control" id="upstudent">
                    @foreach($students as $student)
                      <option value="{{$student->id}}">{{$student->fullname}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Offer</label>

                  <div class="col-sm-10">
                    <select class="form-control" id="upoffer">
                    @foreach($offers as $offer)
                      <option value="{{$offer->id}}">{{$offer->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Branch</label>

                  <div class="col-sm-10">
                    <select class="form-control" id="upbranch">
                    @foreach($students as $student)
                      <option value="{{$student->getBranch->id}}">{{$student->getBranch->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
                    <input type="amount" class="form-control" id="upamount"  required="">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn btn-success pull-right" id="update"><i class="fa fa-save"></i> Update</button>
                </form>
                
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
      </div>
    </div>
  </div>
  <!-- End Modal Insert -->

  <script type="text/javascript">

    // Code Ajax Add 
    $(document).on('click', '.add-modal', function() {
      $('#modalInsert').modal('show');
      $('.box-title').text('Add Payment');
      $('.form-horizontal').show();
    });

    $('#save').click(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: '{{route("payment.store")}}',
        data: {
          '_token' : $('input[name=_token]').val(),
          'student' : $('select[name=student]').val(),
          'offer' : $('select[name=offer]').val(),
          'branch' : $('select[name=branch]').val(),
          'amount' : $('input[name=amount]').val()
        },
        success: function(data) {
          $('#table').append(
            "<tr class='payment"+data.id +"'>"+
              "<td><a href='#'>"+data.studentfullname+"</a></td>"+
              "<td>"+data.offertitle+"</td>"+
              "<td>"+data.branchname+"</td>"+
              "<td><span>"+data.amount+"</span></td>"+
              "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-student='"+data.student+"' data-offer='"+data.offer+"' data-branch='"+data.branch+"' data-amount='"+data.amount+"'><i class='fa fa-edit'></i> Edit</a></td>"+
            "</tr>"
          );
        }
      });
      $('#student').val('');
      $('#offer').val('');
      $('#branch').val('');
      $('#amount').val('');
    });

    // Code Ajax Edit
    $(document).on('click', '.edit-modal', function() {
      $('#upid').val($(this).data('id'));
      $('#upstudent').val($(this).data('student'));
      $('#upoffer').val($(this).data('offer'));
      $('#upbranch').val($(this).data('branch'));
      $('#upamount').val($(this).data('amount'));
      $('.box-title').text('Edit Payment');
      $('.form-horizontal').show();
      $('#modalEdit').modal('show');
    });

    $('#update').click(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: '{{route("payment.update")}}',
        data: {
          '_token' : $('input[name=_token]').val(),
          'id' : $('#upid').val(),
          'student' : $('#upstudent').val(),
          'offer' : $('#upoffer').val(),
          'branch' : $('#upbranch').val(),
          'amount' : $('#upamount').val()
        },
        success: function(data) {
          $('.payment'+ data.id).replaceWith(
            "<tr class='payment"+data.id +"'>"+
              "<td><a href='#'>"+data.studentfullname+"</a></td>"+
              "<td>"+data.offertitle+"</td>"+
              "<td>"+data.branchname+"</td>"+
              "<td><span>"+data.amount+"</span></td>"+
              "<td><a href='#' class='edit-modal btn btn-sm btn-warning btn-flat center' data-id='"+data.id+"' data-student='"+data.student+"' data-offer='"+data.offer+"' data-branch='"+data.branch+"' data-amount='"+data.amount+"'><i class='fa fa-edit'></i> Edit</a></td>"+
            "</tr>"
          );
        }
      });
      $('#modalEdit').modal('hide');
    });
  </script>
@stop