
@extends('layouts.frontend.frontend_main')

@section('title')
    My Profile
@endsection

@section('content')

    <section>
        <div class="tz">

            @include('layouts.frontend.frontend_profile_left_menu')

            <!--CENTER SECTION-->
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>Manage My Profile</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Profile</h2>
                            {{--<p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>--}}
                        </div>
                        <table class="responsive-table bordered">
                            <tbody>
                                <tr>
                                    <td>User Name</td>
                                    <td>:</td>
                                    <td>{{$user->name ? $user->name : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>Eamil</td>
                                    <td>:</td>
                                    <td>{{$user->email ? $user->email : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>{{$user->phone ? $user->phone : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>Street</td>
                                    <td>:</td>
                                    <td>{{$user->street ? $user->street : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td>:</td>
                                    <td>{{$user->area ? $user->area : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>:</td>
                                    <td>{{$user->city ? $user->city : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td>:</td>
                                    <td>{{$user->state ? $user->state : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>:</td>
                                    <td>{{$user->country ? $user->country : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>Zip code</td>
                                    <td>:</td>
                                    <td>{{$user->zipcode ? $user->zipcode : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>Expertize In</td>
                                    <td>:</td>
                                    <td>{{$user->expertize_in ? $user->expertize_in : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>Provide services In City</td>
                                    <td>:</td>
                                    <td>{{$user->service_in_city ? $user->service_in_city : '-'}} </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        @if($user->status=='1')
                                            <span class="db-done">
                                                Active
                                            </span>
                                        @else
                                            <span class="db-done">
                                             In-Active
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="db-mak-pay-bot">
                            {{--<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>--}}
                            <a href="{{route('frontend.profile.edit')}}" class="waves-effect waves-light btn-large">Edit my profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END DASHBOARD-->
@endsection
@section('js')
<script>

</script>
@endsection

