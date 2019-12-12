
@extends('layouts.frontend.frontend_main')

@section('title')
    Purchase Leads
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
                                <h2>Purchase Leads Listings</h2>
                            </div>
                            <table id="table_id" class="table table-condensed table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Campaign Key</th>
                                    <th>Lead ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Sold</th>
                                    <th>Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($leads))
                                    @foreach($leads as $index => $lead)
                                        <?php
                                        $index=$index+1;
                                        ?>
                                        <tr>
                                            <td>{{$lead->lp_campaign_key}}</td>
                                            <td>{{$lead->leadID}}</td>
                                            <td>{{$lead->first_name}}</td>
                                            <td>{{$lead->last_name}}</td>
                                            <td>{{$lead->phone_home}}</td>
                                            <td>{{$lead->sold == '1' ? 'Yes': 'No'}}</td>
                                            <td>{{$lead->CPL}}</td>
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

