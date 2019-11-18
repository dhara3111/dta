
@extends('layouts.frontend.frontend_main')

@section('title')
    Home
@endsection

@section('content')

    <section id="background1" class="dir1-home-head">
        <div class="container dir-ho-t-sp">
            <!-- 	<div class="row">
                    <div class="dir-hr1">
                        <div class="dir-ho-t-tit dir-ho-t-tit-2">
                            <h1>Connect with the right Service Experts</h1>
                            <p>Find B2B & B2C businesses contact addresses, phone numbers,<br> user ratings and reviews.</p>
                        </div>
                            <form class="tourz-search-form">
                                <div class="input-field">
                                    <input type="text" id="select-city" class="autocomplete">
                                    <label for="select-city">Enter city</label>
                                </div>
                                <div class="input-field">
                                    <input type="text" id="select-search" class="autocomplete">
                                    <label for="select-search" class="search-hotel-type">Search your services like hotel, resorts, events and more</label>
                                </div>
                                <div class="input-field">
                                    <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn"> </div>
                            </form>
                    </div>
                </div> -->
        </div>
    </section>



    <!--HOME PROJECTS-->
    <section class="cat-v2-hom com-padd mar-bot-red-m30">
        <div class="container">
            <div class="row">
                <div class="com-title">
                    <h2>Find your <span>Category</span></h2>
                    <p>Explore some of the best business from around the world from our partners and friends.</p>
                </div>
                <div class="cat-v2-hom-list">
                    <ul>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/1_car.png')}}" alt=""> Auto Accidents <p> $125 to $600/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/2_baby.png')}}" alt=""> Child Birth Injury <p>$70/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/3_worker.png')}}" alt=""> Workers Comp <p>$70-100/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/4_bankruptcy.png')}}" alt=""> Bankruptcy <p>$50/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/5_bandage.png')}}" alt=""> General PI <p>$75-150/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/6_salesman.png')}}" alt=""> Consumer Law <p>$20/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/7_scales.png')}}" alt=""> Business Law <p>$30/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/8_handcuffs.png')}}" alt=""> Criminal Defense <p>$60 - $85/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/9_justice.png')}}" alt=""> Civil Lawsuits <p>$20/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/10_debt.png')}}" alt=""> Debt and Collection <p>$20/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/11_cocktail.png')}}" alt=""> DUI <p>$80-$100/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/12_house.png')}}" alt=""> Family Law <p>$40/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/13_analytics.png')}}" alt=""> Emp & Labor Law<p>$20-25/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/14_house.png')}}" alt=""> Estate Planning<p>$40/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/15_foreclosure.png')}}" alt=""> Foreclosure Defense<p>$55/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/16_id-card.png')}}" alt=""> Id Theft<p>$30/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/17_travel.png')}}" alt=""> Immigration<p>$20/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/18_shield.png')}}" alt=""> Intellectual Property<p>$30-40/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/19.png')}}" alt=""> Landlord/Tenant<p>$30/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/20_doctor.png')}}" class="img_size" alt=""> Medical Malpratice<p>$40/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/21_leads.png')}}" class="img_size" alt=""> Mesothelioma<p>Currently Unavailable</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/22_nurse.png')}}" class="img_size" alt=""> Nursing Home Abuse<p>$70/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/23_house.png')}}" class="img_size" alt=""> Estate & Property Law<p>$30/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/24_disabled.png')}}" class="img_size" alt=""> SSDI<p>$40/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{asset('frontend/images/icon/25_debt.png')}}" class="img_size" alt=""> Tax Law<p>$60-120/Lead</p></a>
                        </li>
                        <!-- <li>
                            <a href="#"><img src="images/icon/26_car.png" class="img_size" alt=""> Traffic Violations<p>$20/Lead</p></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/icon/27-refugee.png" class="img_size" alt=""> Wrongful Termination<p>$20/Lead (Except in CA)</p></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--EXPLORE CITY LISTING-->

    <section class="com-padd quic-book-ser-full ">
        <div class="container">
            <div class="row com-padd">
                <div class="col-md-6">
                    <div class="how-border how-com-mob-bot-space">
                        <div class="hom-cre-acc-left">
                            <h3><span>How Are You Generating Your Leads?</span></h3>
                            <p>Local directory is the smartest way to find the <b>best services</b>
                                <br>for all your works</p>
                        </div>
                        <div class="how-com">
                            <ul>
                                <li> <img src="{{asset('frontend/images/how/1.png')}}" alt="">
                                    <h4>Choose Service</h4>
                                    <p>from over 60 Services to help you out in your works. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                </li>
                                <li> <img src="{{asset('frontend/images/how/2.png')}}" alt="">
                                    <h4>Get 1000+ Trusted Service</h4>
                                    <p>from over 60 Services to help you out in your works. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                </li>
                                <li> <img src="{{asset('frontend/images/how/3.png')}}" alt="">
                                    <h4>Success your Service</h4>
                                    <p>from over 60 Services to help you out in your works. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="how-border">
                        <div class="hom-cre-acc-left">
                            <h3><span>In Content (Native) Ads Make A High Quality Lead</span></h3>
                            <p>You can grow your business online and <b>Get more leads</b>
                                <br>for your business</p>
                        </div>
                        <div class="how-com">
                            <ul>
                                <li> <img src="{{asset('frontend/images/how/4.png')}}" alt="">
                                    <h4>Register your Business</h4>
                                    <p>from over 60 Services to help you out in your works. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                </li>
                                <li> <img src="{{asset('frontend/images/how/5.png')}}" alt="">
                                    <h4>Get 1000+ Leads and Visitors</h4>
                                    <p>from over 60 Services to help you out in your works. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                </li>
                                <li> <img src="{{asset('frontend/images/how/6.png')}}" alt="">
                                    <h4>Grow your Business</h4>
                                    <p>from over 60 Services to help you out in your works. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--CREATE FREE ACCOUNT-->
    @if(!auth()->user())

        <section class="web-app com-padd com-padd-redu-top">
            <div class="container">
                <div class="row">
                    <div class="com-title">
                        <h2>Create a free <span>Account</span></h2>
                        <p>Explore some of the best tips from around the world from our partners and friends.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="hom-cre-acc-left">
                            <h3>A few reasons you’ll love Online <span>Business Directory</span></h3>
                            <p>5 Benefits of Listing Your Business to a Local Online Directory</p>
                            <ul>
                                <li> <img src="{{asset('frontend/images/icon/7.png')}}" alt="">
                                    <div>
                                        <h5>Enhancing Your Business</h5>
                                        <p>Imagine you have made your presence online through a local online directory, but your competitors have..</p>
                                    </div>
                                </li>
                                <li> <img src="{{asset('frontend/images/icon/5.png')}}" alt="">
                                    <div>
                                        <h5>Advertising Your Business</h5>
                                        <p>Advertising your business to area specific has many advantages. For local businessmen, it is an opportunity..</p>
                                    </div>
                                </li>
                                <li> <img src="{{asset('frontend/images/icon/6.png')}}" alt="">
                                    <div>
                                        <h5>Develop Brand Image</h5>
                                        <p>Your local business too needs brand management and image making. As you know the local market..</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <form id="register"  action="{{ route('frontend.register.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" name="name" id="name" class="validate" value="{{old('name')}}">
                                        <label>User name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="email" class="validate" name="email" id="email" value="{{old('email')}}">
                                        <label>Email id</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="phone" id="phone" value="{{old('phone')}}">
                                        <label>Mobile no</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="street" id="street" value="{{old('street')}}">
                                        <label>Street</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="area" id="area" value="{{old('area')}}">
                                        <label>Area</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s4">
                                        <div class="select-wrapper">
                                            <select class="initialized select2" name="country" id="country">
                                                <option value="">Select Country</option>
                                                <option value="India">India</option>
                                                <option value="America">America</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-field col s4">
                                        <div class="select-wrapper">
                                            <select class="initialized select2" name="state" id="state">
                                                <option value="">Select State</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-field col s4">
                                        <div class="select-wrapper">
                                            <select class="initialized select2" name="city" id="city">
                                                <option value="">Select City</option>
                                                <option value="Vadodara">Vadodara</option>
                                                <option value="Surat">Surat</option>
                                                <option value="Porbandar">Porbandar</option>
                                                <option value="Rajkot">Rajkot</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="zipcode" id="zipcode" value="{{old('zipcode')}}">
                                        <label>Zipcode</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="expertize_in" id="expertize_in" value="{{old('expertize_in')}}">
                                        <label>Expertize In</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate" name="service_in__city" id="service_in__city" value="{{old('service_in__city')}}">
                                        <label>Provided Service In City</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" class="validate" name="password" id="password">
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" class="validate" name="confirm_password" id="conf_password">
                                        <label>Confirm Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button type="submit" value="submit" class="waves-effect waves-light btn-large full-btn">Submit Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection

@section('js')
    <script>
        $("#register").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email:true
                },
                phone: {
                    required: true,
                    phoneUS: true
                },
                street: {
                    required: true,
                },
                area: {
                    required: true,
                },
                city: {
                    required: true,
                },
                state: {
                    required: true,
                },
                country: {
                    required: true,
                },
                zipcode: {
                    required: true,
                    maxlength:6
                },
                expertize_in: {
                    required: true,
                },
                service_in__city: {
                    required: true,
                },
                password: {
                    required: true,
                },
                confirm_password: {
                    required: true,
                    minlength:6,
                    equalTo: "#password"
                },
            },
            messages: {
                name: {
                    required: "Please Enter Name",
                },
                email: {
                    required:  "Please Enter Email ID",
                    email: "Please Enter Valid Email ID"
                },
                phone: {
                    required:  "Please Enter Contact Number",
                    phoneUS:  "Please Enter Valid Contact Number"
                },
                street: {
                    required:  "Please Enter Street Address",
                },
                area: {
                    required:  "Please Enter Area",
                },
                city: {
                    required:  "Please Enter City",
                },
                state: {
                    required:  "Please Enter State",
                },
                country: {
                    required:  "Please Enter Country",
                },
                zipcode: {
                    required:  "Please Enter Zipcode",
                    maxlength:"Please Enter Valid Zipcode"
                },
                expertize_in: {
                    required:  "Please Enter Your Experties",
                },
                service_in__city: {
                    required:  "Please Enter Name of Cities you serve in",
                },
                password: {
                    required:  "Please Enter Password"
                },
                confirm_password: {
                    required:  "Please Enter Name",
                    minlength:6,
                    equalTo: "#password"
                },
            }
        });
    </script>

@endsection