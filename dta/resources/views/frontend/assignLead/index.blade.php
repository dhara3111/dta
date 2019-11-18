
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
                            <table class="responsive-table bordered">
                                <thead>
                                <tr>
                                    <th>Lead ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Home</th>
                                    <th>Cost</th>
                                    <th>Revenue</th>
                                    <th>Revenue</th>
                                    <th>Revenue</th>
                                    <th>Revenue</th>
                                    <th>Revenue</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($leads as $index => $lead)
                                        <tr>
                                            <td>{{$lead->leadID}}</td>
                                            <td>{{$lead->first_name}}</td>
                                            <td>{{$lead->last_name}}</td>
                                            <td>{{$lead->phone_home}}</td>
                                            <td>{{$lead->CPL}}</td>
                                            <td>{{$lead->RPL}}</td>
                                            <td>{{$lead->RPL}}</td>
                                            <td>{{$lead->RPL}}</td>
                                            <td>{{$lead->RPL}}</td>
                                            <td>{{$lead->RPL}}</td>
                                            <td>
                                                 <a href="#" class="waves-effect waves-light btn-large">Buy</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!--RIGHT SECTION-->

        </div>
    </section>
    <!--END DASHBOARD-->
@endsection
@section('js')
<script>

</script>
@endsection

