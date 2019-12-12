
@extends('layouts.frontend.frontend_main')

@section('title')
    My Order List
@endsection

@section('content')

    <section>
        <div class="tz">

            @include('layouts.frontend.frontend_profile_left_menu')

            <!--CENTER SECTION-->
                <div class="tz-2">
                    <div class="tz-2-com tz-2-main">
                        <h4>Manage Order List</h4>
                        <div class="db-list-com tz-db-table">
                            <div class="ds-boar-title">
                                <h2>My Order Listings</h2>
                            </div>
                            <table id="table_id" class="table table-condensed table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Total Lead</th>
                                    <th>Purchase Date</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($orders))
                                    @foreach($orders as $index => $order)
                                        <?php
                                        $index=$index+1;
                                        ?>
                                        <tr>
                                            <td>{{$index}}</td>
                                            <td>{{$order->total_lead}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->total_amount_of_lead}}</td>
                                            <td>
{{--                                                <form action="{{route('frontend.orderLead.refund')}}" method="POST">--}}
                                                    {{ csrf_field() }}
                                                    {{--<input type="hidden" name="id" value="{{ Session::has('id') ? Session::get('id') : $order->id }}">--}}
                                                    {{--<input type="hidden" name="session_id" value="{{ Session::has('session_id') ? Session::get('session_id') : $order->session_id }}">--}}
                                                    {{--<input type="hidden" name="payment_intent" value="{{ Session::has('payment_intent') ? Session::get('payment_intent') : $order->payment_intent}}">--}}
                                                    {{--<input type="submit" name="Pay" Value="Refund" class="btn btn-primary">--}}
{{--                                                    <a href="javascript:void(0)" data-payment-intent="{{ Session::has('payment_intent') ? Session::get('payment_intent') : $order->payment_intent}}"  data-session-id="{{ Session::has('session_id') ? Session::get('session_id') : $order->session_id }}" data-id="{{ Session::has('id') ? Session::get('id') : $order->id }}" class="btn btn-primary">Send</a>--}}
                                                    <button type="button" class="btn btn-primary" data-payment-intent="{{ Session::has('payment_intent') ? Session::get('payment_intent') : $order->payment_intent}}"  data-session-id="{{ Session::has('session_id') ? Session::get('session_id') : $order->session_id }}" data-id="{{ Session::has('id') ? Session::get('id') : $order->id }}" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Refund</button>
                                                {{--</form>--}}
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Refund Payment</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="refundForm" action="{{route('frontend.orderLead.refund')}}" method="POST">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <input type="hidden" name="id"  id="id" value="{{ Session::has('id') ? Session::get('id') : $order->id }}">
                                                                <input type="hidden" name="session_id" id="session_id" value="{{ Session::has('session_id') ? Session::get('session_id') : $order->session_id }}">
                                                                <input type="hidden" name="payment_intent" id="payment_intent" value="{{ Session::has('payment_intent') ? Session::get('payment_intent') : $order->payment_intent}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Reason for refund:</label>
                                                                <select class="form-control" name="reason" id="reason">
                                                                    <option value="">Select Reason...</option>
                                                                    <option value="Bad Contact information">Bad Contact information</option>
                                                                    <option value="Lead not valid">Lead not valid</option>
                                                                    <option value="Wrong information requested">Wrong information requested</option>
                                                                    <option value="Wrong legal category">Wrong legal category</option>
                                                                    <option value="other">Other...</option>
                                                                </select>

                                                            </div>
                                                            <div class="form-group " id="description" style="display: none">
                                                                <label for="message-text" class="col-form-label">Description:</label>
                                                                <textarea class="form-control" id="message-text"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <input type="submit" name="Pay" Value="Refund" class="btn btn-primary" style="margin-right: 15px;">
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6"><center><h5 style="color:red;">No lead Purchase...!!</h5></center> </td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!--END DASHBOARD-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('frontend.orderLead.refund')}}" method="POST">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Reason for refund:</label>
                            <select class="form-control" name="reason" id="reason">
                                <option value="">Select Reason...</option>
                                <option value="Bad Contact information">Bad Contact information</option>
                                <option value="Lead not valid">Lead not valid</option>
                                <option value="Wrong information requested">Wrong information requested</option>
                                <option value="Wrong legal category">Wrong legal category</option>
                                <option value="other">Other...</option>
                            </select>

                        </div>
                        <div class="form-group des" style="display: none">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Send message</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
<script type="text/javascript" src="{{ asset('js/validation/jquery.validate.js') }}"></script>

<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
<script>
    $(document).ready(function () {
        $('#table_id').dataTable();
    });

    $("#refundForm").validate({
        rules: {
            reason: {
                required: true,
            },
        },
    });

    $(document).ready(function(){
        $('#reason').on('change', function() {
            $reason = $('#reason').val();
            if($reason == 'other'){
                $('#description').show();
            }
        });
    });

    $('body').on('click','.btnSendMail',function(){
        $paymentIntent = $(this).attr('data-payment-intent');
        $sessionId = $(this).attr('data-session-id');
        $id = $(this).attr('data-id');

        showLoading();
        $.ajax({
            type: "post",
            url:'{{ route('frontend.orderLead.refund') }}',
            data: {
                'payment_intent':$paymentIntent,
                'session_id':$sessionId,
                'id':$id,
                '_token' : "{{ csrf_token() }}"
            },
            async: true,
            dataType:"json",
            success: function(data) {
                if(data.status == true){

                    $('#appendRow').html(data.html);

                    $('#example1').DataTable().destroy();

                    $('#example1').DataTable({
                        "pageLength": 5,
                        stateSave: true
                    });

                    hideLoading();
                    // Show User Profile Model
                    $('#attorneyData').modal('show');
                }
                else{
                    hideLoading();
                    swal({
                        title: "Oops...!",
                        text: "something went wrong...",
                        type: 'error'
                    });
                }
            },error:function()
            {
                hideLoading();
                swal({
                    title: "Oops...!",
                    text: "something went wrong...",
                    type: 'error'
                });
            }
        });
    });
</script>
@endsection

