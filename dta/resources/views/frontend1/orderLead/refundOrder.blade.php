
@extends('layouts.frontend.frontend_main')

@section('title')
    My Refund List
@endsection

@section('content')

    <section>
        <div class="tz">

            @include('layouts.frontend.frontend_profile_left_menu')

            <!--CENTER SECTION-->
                <div class="tz-2">
                    <div class="tz-2-com tz-2-main">
                        <h4>Manage Refund List</h4>
                        <div class="db-list-com tz-db-table">
                            <div class="ds-boar-title">
                                <h2>My Refund Listings</h2>
                            </div>
                            <table id="table_id" class="table table-condensed table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Total Lead</th>
                                    <th>Purchase Date</th>
                                    <th>Return Date</th>
                                    <th>Total</th>
                                    <th>Reason for refund</th>
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
                                            <td>{{$order->updated_at}}</td>
                                            <td>{{$order->total_amount_of_lead}}</td>
                                            <td>{{$order->reason}}</td>
                                        </tr>
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
@endsection
@section('js')


    <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
<script>
    $(document).ready(function () {
        $('#table_id').dataTable();
    });
</script>
@endsection

