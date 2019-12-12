
@extends('layouts.frontend.frontend_main')

@section('title')
    Assign Leads
@endsection

@section('content')

    <section>
        <div class="tz">

            @include('layouts.frontend.frontend_profile_left_menu')

            <!--CENTER SECTION-->
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>Manage Listings</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Assign Leads Listings</h2>
                            {{--<p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>--}}
                        </div>
                        <?php
                        $total=0;
                        ?>
                        <form action="{{route('frontend.assignLead.charge')}}" method="POST">
                            {{ csrf_field() }}
                            <table id="table_id" class="table table-condensed table-striped table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Campaign Key</th>
                                    <th>Lead ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($leads))
                                    @foreach($leads as $index => $lead)
                                        <?php
                                        $index=$index+1;
                                        $post=\App\Models\Post::whereToId(auth()->user()->id)->whereLeadId($lead->id)->first();
                                        ?>
                                        @if( $lead->sellable == '1')
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="{{$lead->id}}" class="selectId" data-id="{{ $lead->id }}" data-cpl="{{ $lead->CPL }}" name="selectId[]" value="{{ Session::has('id') ? Session::get('id') : $lead->id }}">
                                                    <label for="{{$lead->id}}"></label>
                                                </td>
                                                <td>{{$lead->lp_campaign_key}}</td>
                                                <td>{{$lead->leadID}}</td>
                                                <td>{{$lead->first_name}}</td>
                                                <td>{{$lead->last_name}}</td>
                                                <td>{{$lead->phone_home}}</td>
                                                <td>
                                                    {{$lead->CPL}}
                                                    <input type="hidden" name="id[]" value="{{ Session::has('id') ? Session::get('id') : $lead->id }}">
                                                    <input type="hidden" name="cpl[]" value="{{ Session::has('cpl') ? Session::get('cpl') : $lead->CPL}}">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8"><center><h5 style="color:red;">No lead assign...!!</h5></center> </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="row" id="payment_button_hidden">
                                <div class="6"></div>
                                <div class="pull-right" >
                                    <input type="button" name="Pay" value="Proceed checkout" class="pull-right  waves-effect waves-light btn-large" style="margin-top: 15px;background: #7d7f80 !important;font-size: initial !important;">
                                </div>
                            </div>
                            <div class="row" id="total_field" style="display: none;margin-top: 25px;">
                                <div class="col-md-8">
                                    <h3 class="pull-right">Total </h3>
                                    <input type="hidden" name="total" id="total">
                                </div>
                                <div class="col-md-2 pull-right" id="total_html" style="font-size: 20px;padding-left: 61px;"><h3>0</h3></div>
                            </div>
                            <div class="row" id="payment_button" style="display: none">
                                <div colspan="6"></div>
                                <div class="pull-right" style="margin-top: 25px;">
                                    @if(!empty($leads))
                                        <input type="submit" name="Pay" value="Proceed checkout" class="pull-right  waves-effect waves-light btn-large" style="font-size: initial !important;">
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END DASHBOARD-->
@endsection
@section('js')

    <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
<script src="https://js.stripe.com/v3/"></script>
<script src="https://checkout.stripe.com/checkout.js" data-key="{{ env('STRIPE_KEY') }}"></script>
<script>
    $(document).ready(function () {
        $('#table_id').dataTable();
    });

    $(document).ready(function(){
        $tot=0;
        $(".selectId").click(function(){
            $id=$(this).attr('data-id');
            $cpl=$(this).attr('data-cpl');

            if(this.checked){
                $tot= parseFloat($tot)+parseFloat($cpl);

                $('#total').val($tot);
                $('#total_html').html($tot);

                if($tot != 0) {
                    $('#total_field').show();
                    $('#payment_button').show();
                    $('#payment_button_hidden').hide();
                }
            }else{

                $tot = parseFloat($tot) - parseFloat($cpl);

                $('#total').val($tot);
                $('#total_html').html($tot);

                if($tot == 0) {
                    $('#total_field').hide();
                    $('#payment_button').hide();
                    $('#payment_button_hidden').show();
                }
            }
        });
    });


    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    @if(Session::has('CHECKOUT_SESSION_ID'))
    stripe.redirectToCheckout({
        // Make the id field from the Checkout Session creation API response
        // available to this file, so you can provide it as parameter here
        {{--// instead of the {{CHECKOUT_SESSION_ID}} placeholder.--}}
        sessionId: '{{Session::get('CHECKOUT_SESSION_ID')}}'

    }).then(function (result) {
        // If `redirectToCheckout` fails due to a browser or network
        // error, display the localized error message to your customer
        // using `result.error.message`.
    });
    @endif
</script>
@endsection

