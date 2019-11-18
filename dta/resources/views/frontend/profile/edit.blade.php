
@extends('layouts.frontend.frontend_main')

@section('title')
    Edit Profile
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
                            <h2>Edit Profile</h2>
                            {{--<p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>--}}
                        </div>
                        <div class="tz2-form-pay tz2-form-com">
                            <form class="col s12" action="{{route('frontend.profile.update',['id' => $user->id])}}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" name="name" id="name" class="validate" value="{{$user->name}}">
                                        <label>User name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="email" class="validate" name="email" id="email" value="{{$user->email}}">
                                        <label>Email id</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="phone" id="phone" value="{{$user->phone}}">
                                        <label>Mobile no</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="street" id="street" value="{{$user->street}}">
                                        <label>Street</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="area" id="area" value="{{$user->area}}">
                                        <label>Area</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s4">
                                        <div class="select-wrapper">
                                            <span class="caret">▼</span>
                                            <select class="initialized" name="city" id="city">
                                                <option value="" disabled="" selected="">Select City</option>
                                                <option value="Vadodara" {{'Vadodara' == $user->city ? 'selected' : ''}}>Vadodara</option>
                                                <option value="Surat" {{'Surat' == $user->city ? 'selected' : ''}}>Surat</option>
                                                <option value="Porbandar" {{'Porbandar' == $user->city ? 'selected' : ''}}>Porbandar</option>
                                                <option value="Rajkot" {{'Rajkot' == $user->city ? 'selected' : ''}}>Rajkot</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="input-field col s4">
                                        <div class="select-wrapper">
                                            <span class="caret">▼</span>
                                            <select class="initialized" name="state" id="state">
                                                <option value="" disabled="" selected="">Select State</option>
                                                <option value="Gujarat" {{'Gujarat' == $user->state ? 'selected' : ''}}>Gujarat</option>
                                                <option value="Maharashtra" {{'Maharashtra' == $user->state ? 'selected' : ''}}>Maharashtra</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-field col s4">
                                        <div class="select-wrapper">
                                            <span class="caret">▼</span>
                                            <select class="initialized" name="country" id="country">
                                                <option value="" disabled="" selected="">Select Country</option>
                                                <option value="India" {{'India' == $user->country ? 'selected' : ''}}>India</option>
                                                <option value="America">America</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="zipcode" id="zipcode" value="{{$user->zipcode}}">
                                        <label>Zipcode</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="expertize_in" id="expertize_in" value="{{$user->expertize_in}}">
                                        <label>Expertize In</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="service_in_city" id="service_in_city" value="{{$user->service_in_city}}">
                                        <label>Provided Service In City</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s2">
                                        <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style="">
                                            <input type="submit" value="submit" class="waves-button-input">
                                        </i>
                                    </div>
                                </div>
                            </form>
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

