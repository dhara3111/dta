
@extends('layouts.frontend.frontend_main')

@section('title')
    Knowledge
@endsection

@section('css')
<style>
    :root{
        --white: #fff;
        --cl_1: #D008AF;
        --cl_2: #F92D4B;
        --bg-gr_1: linear-gradient(to right,var(--cl_1),var(--cl_2));
        --cl_3: #FEC901;
        --cl_4: #FE0C34;
        --bg-gr_2: linear-gradient(to right,var(--cl_3),var(--cl_4));
        --cl_5: #559DF3;
        --cl_6: #9114D0;
        --bg-gr_3: linear-gradient(to right,var(--cl_5),var(--cl_6));
        --cl_7: #2CD190;
        --cl_8: #138FC8;
        --bg-gr_4: linear-gradient(to right,var(--cl_7),var(--cl_8));
    }
    .serviceBox{
        font-family: 'Niramit', sans-serif;
        text-align: center;
        padding: 100px 0 0;
        margin: 80px 10px 0;
        border-left: 3px solid var(--cl_1);
        position: relative;
        z-index: 1;
    }
    .serviceBox:before,
    .serviceBox:after{
        content: '';
        background-color: var(--cl_1);
        height: 3px;
        width: 50%;
        position: absolute;
        left: 0;
        top: 0;
        z-index: -2;
    }
    .serviceBox:after{
        background: var(--bg-gr_1);
        width: 100%;
        top: auto;
        bottom: 0;
    }
    .serviceBox .service-icon{
        color: var(--white);
        background: var(--bg-gr_1);
        font-size: 70px;
        line-height: 140px;
        width: 140px;
        height: 140px;
        margin: 0 auto;
        border-radius: 50%;
        position: absolute;
        top: -70px;
        left: 0;
        right: 0;
        z-index: 1;
        transition: all 0.3s;
    }
    .serviceBox:hover .service-icon{ font-size: 60px; }
    .serviceBox .service-icon:before,
    .serviceBox .service-icon:after{
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
        height: 96%;
        width: 96%;
        border: 10px solid var(--white);
        border-radius: 50%;
        z-index: -1;
    }
    .serviceBox .service-icon:after{
        border: none;
        background: var(--bg-gr_1);
        height: 82%;
        width: 82%;
        z-index: -1;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
        transition: all 0.3s;
    }
    .serviceBox:hover .service-icon:after{
        box-shadow: 0 0 15px rgba(0,0,0,0.3), 0 0 10px var(--white) inset;
    }
    .serviceBox .service-content{
        padding: 0 20px 20px;
        border-right: 3px solid var(--cl_2);
    }
    .serviceBox .title{
        color: var(--cl_1);
        font-size: 20px;
        text-transform: capitalize;
        margin: 0 0 10px;
    }
    .serviceBox .description{
        color: #707070;
        font-size: 15px;
        line-height: 27px;
    }
    .serviceBox.yellow1:after,
    .serviceBox.yellow1 .service-icon,
    .serviceBox.yellow1 .service-icon:after{
        background: linear-gradient(to right,var(--cl_3),var(--cl_4));
    }
    .serviceBox.yellow1:before{ background-color: var(--cl_3); }
    .serviceBox.yellow1{ border-left-color: var(--cl_3); }
    .serviceBox.yellow1 .service-content{ border-right-color: var(--cl_4); }
    .serviceBox.yellow1 .title{ color: var(--cl_4); }
    .serviceBox.blue1:after,
    .serviceBox.blue1 .service-icon,
    .serviceBox.blue1 .service-icon:after{
        background: var(--bg-gr_3);
    }
    .serviceBox.blue1:before{ background-color: var(--cl_5); }
    .serviceBox.blue1{ border-left-color: var(--cl_5); }
    .serviceBox.blue1 .service-content{ border-right-color: var(--cl_6); }
    .serviceBox.blue1 .title{ color: var(--cl_6); }
    .serviceBox.green1:after,
    .serviceBox.green1 .service-icon,
    .serviceBox.green1 .service-icon:after{
        background: var(--bg-gr_4);
    }
    .serviceBox.green1:before{ background-color: var(--cl_7); }
    .serviceBox.green1{ border-left-color: var(--cl_7); }
    .serviceBox.green1 .service-content{ border-right-color: var(--cl_8); }
    .serviceBox.green1 .title{ color: var(--cl_8); }
    @media only screen and (max-width:990px){
        .serviceBox{ margin: 100px 0 0; }
    }

    .animate {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }

    .two {
        -webkit-animation-delay: 1.5s;
        -moz-animation-delay: 1.5s;
        animation-delay: 1.5s;
    }

    /*=== FADE IN DOWN ===*/
    .fadeInDown {
        -webkit-animation-name: fadeInDown;
        animation-name: fadeInDown;
    }
    @-webkit-keyframes fadeInDown {
        0% {
            opacity: 0;
            -webkit-transform: translate3d(0, -10%, 0);
            transform: translate3d(0, -10%, 0);
        }
        100% {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
        }
    }
    @keyframes fadeInDown {
        0% {
            opacity: 0;
            -webkit-transform: translate3d(0, -10%, 0);
            transform: translate3d(0, -10%, 0);
        }
        100% {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
        }
    }

</style>
@endsection

@section('content')

    <section id="background" class="dir1-home-head">
        <div class="container dir-ho-t-sp">
            <div class="row">
                <div class="dir-hr1">

                    <form class="tourz-search-form">
                        <div class="input-field">
                            {{--<input type="text" id="select-city" class="autocomplete">--}}
                            {{--<label for="select-city">Enter city</label>--}}
                        </div>
                        <div class="input-field">
                            <input type="text" id="select-search" class="autocomplete">
                            <label for="select-search" class="search-hotel-type">How Can We Help You?</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn"> </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="com-padd com-padd-redu-bot1 pad-bot-red-40">
        <div class="container">
            <div class="row">
                <div class="com-title">
                    <h2>Knowledge <span>Base</span></h2>
                    {{--<p>Explore some of the best business from around the world from our partners and friends.</p>--}}
                </div>

            </div>

            <div class="box animate fadeInDown two">
                <div class="row">

                    <div class="col-md-4 col-sm-6">
                        <div class="serviceBox">
                            <div class="service-icon">
                                <i class="fa fa-diamond"></i>
                            </div>
                            <div class="service-content">
                                <h3 class="title">Getting Started</h3>
                                <p class="description">
                                    New to LeadsPedia? This is the fastest way to get started with LeadsPedia.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="serviceBox yellow1">
                            <div class="service-icon">
                                <i class="fa fa-connectdevelop"></i>
                            </div>
                            <div class="service-content">
                                <h3 class="title">Lead Generation</h3>
                                <p class="description">
                                    Learn how to manage your lead generation business the fastest way.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="serviceBox blue1">
                            <div class="service-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="service-content">
                                <h3 class="title">Call Routing</h3>
                                <p class="description">
                                    Learn how to manage your call routing business the fastest way.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css /> -->





@endsection

@section('js')


@endsection