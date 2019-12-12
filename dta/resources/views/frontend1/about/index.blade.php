
@extends('layouts.frontend.frontend_main')

@section('title')
    About Us
@endsection

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="overlay">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>About Us</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('frontend.home.index')}}">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- About city estate start -->
    <div class="about-city-estate">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="properties-detail-slider simple-slider">
                        <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                            <div class="carousel-outer">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item">
                                        <img src="{{ asset('frontend/img/properties/properties-1.jpg')}}" class="img-preview img-responsive" alt="properties-1">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('frontend/img/properties/properties-2.jpg')}}" class="img-preview img-responsive" alt="properties-2">
                                    </div>
                                    <div class="item active left">
                                        <img src="{{ asset('frontend/img/properties/properties-3.jpg')}}" class="img-preview img-responsive" alt="properties-3">
                                    </div>
                                    <div class="item next left">
                                        <img src="{{ asset('frontend/img/properties/properties-4.jpg')}}" class="img-preview img-responsive" alt="properties-4">
                                    </div>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                <span class="slider-mover-left no-bg t-slider-r pojison" aria-hidden="true">
                                    <i class="fa fa-angle-left"></i>
                                </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                <span class="slider-mover-right no-bg t-slider-l pojison" aria-hidden="true">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="about-text">
                        <h3 style="color:red;">Welcome to Best Property Deal</h3>

                        <p style="text-align: justify;">Best Property Deal, with over more then 10 years’ experience in the property industry,
                            established Best Property Deal in 2005 to offer a professional and totally comprehensive property
                            service to those clients who appreciate the benefits of dealing with one reliable point of contact
                            through all facets of property transactions.

                           </p>
                        <p style="text-align: justify;"> We have succeeded in developing long-term business relationships by meeting our clients specific needs
                            in ways which are individual, innovative and commercially sound.
                            Duis iaculis, arcu ut hendrerit pharetra, elit augue pulvinar magna, a consectetur eros quam
                            magna, a consectetur eros</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About city estate end -->

    <div class="mb-100 our-service">
        <div class="container">
            <!-- Main title -->


            <div class="row mgn-btm wow">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                    <div class="content">
                        <i class="flaticon-apartment"></i>
                        <h4>Our Vision</h4>
                        <p>To transform the property management industry through commitment to positive change and innovation that redefines the quality and consistency .</P>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                    <div class="content">
                        <i class="flaticon-internet"></i>
                        <h4>Our Mission</h4>
                        <p>It is our mission to provide continuous service of the highest quality throughout the term of even the most complex project.</P>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInRight delay-04s">
                    <div class="content">
                        <i class="flaticon-vehicle"></i>
                        <h4>Our Values</h4>
                        <p>At all times, Best Property Deal conducts its business with integrity, ethical values and social commitments.</P>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="clearfix"></div>
<br>


@endsection

@section('js')
@endsection