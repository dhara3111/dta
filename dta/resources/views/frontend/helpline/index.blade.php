
@extends('layouts.frontend.frontend_main')

@section('title')
    Knowledge
@endsection

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <style>
            /*----------------------- CSS for FAQs -----------------------*/
        .serviceBox{
        padding: 30px 30px 30px 90px;
        background: #f8f8f8;
        color: #333;
        overflow: hidden;
        position: relative;
        transition: all 0.3s ease-in-out 0s;
        }
        .serviceBox:hover{
        background: #01a0d8;
        color: #fff;
        }
        .serviceBox:after{
        content: "";
        display: block;
        border-top: 500px solid #fff;
        border-left: 500px solid transparent;
        margin-top: -55%;
        margin-left: 100%;
        opacity: 0;
        position: absolute;
        transform: scale(2);
        transition: all 0.3s ease-in-out 0s;
        }
        .serviceBox:hover:after{
        margin-left: 0;
        opacity: 0.1;
        }
        .serviceBox .service-icon{
        font-size: 50px;
        color: #01a0d8;
        position: absolute;
        top: 20px;
        left: 20px;
        transition:all 0.3s ease-in-out 0s;
        }
        .serviceBox:hover .service-icon{
        color: #fff;
        }
        .serviceBox .title{
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 12px 0;
        text-transform: capitalize;
        }
        .serviceBox .description{
        font-size: 15px;
        color: #a3a3a3;
        line-height: 25px;
        margin: 0;
        transition: all 0.3s ease-in-out 0s;
        }
        .serviceBox:hover .description{
        color: #fff;
        }
        @media only screen and (max-width: 990px){
        .serviceBox{ margin-bottom: 15px; }
        }
        /*----------------------- CSS for FAQs finished -----------------------*/
        /*----------------------- CSS for testimonials -----------------------*/

        .testimonial{
            text-align: center;
            margin: 0 15px;
        }
        .testimonial .description{
            padding: 15px;
            margin: 0;
            border-top: 4px solid #73438f;
            border-bottom: 1px solid #ccc;
            font-size: 18px;
            color: #454646;
            line-height: 30px;
            position: relative;
        }
        .testimonial .description:after{
            content: "";
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #73438f;
            margin: 0 auto;
            position: absolute;
            bottom: -5px;
            left: 0;
            right: 0;
        }
        .testimonial .pic{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin: 40px auto;
        }
        .testimonial .pic img{
            width: 100%;
            height: auto;
        }
        .testimonial .title{
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin: 0 0 10px 0;
        }
        .testimonial .post{
            display: block;
            font-size: 14px;
            color: #333;
        }
        .owl-theme .owl-controls{
            margin-top: 30px;
        }
        .owl-theme .owl-controls .owl-page span{
            background: #ccc;
            opacity: 1;
            transition: all 0.4s ease 0s;
        }
        .owl-theme .owl-controls .owl-page.active span,
        .owl-theme .owl-controls.clickable .owl-page:hover span{
            background: #73438f;
        }
        /*----------------------- CSS for testimonials finished -----------------------*/
        /*----------------------- CSS for counter section -----------------------*/
        .counter{
        text-align: center;
        position: relative;
        }
        .counter .counter-value{
        display: inline-block;
        width: 150px;
        height: 150px;
        line-height: 130px;
        border-radius: 50%;
        border: 10px solid #fff;
        background: #fd7e15;
        font-size: 40px;
        color: #fff;
        box-shadow: inset 0 0 15px rgba(0,0,0,0.3);
        text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
        margin-bottom: 45px;
        position: relative;
        }
        .counter .counter-value:before{
        content: "";
        border: 5px solid #656565;
        border-radius: 50%;
        position: absolute;
        top: -10px;
        left: -10px;
        bottom: -10px;
        right: -10px;
        }
        .counter .counter-value:after{
        content: "";
        width: 5px;
        height: 58px;
        background: #656565;
        margin: 0 auto;
        position: absolute;
        bottom: -68px;
        left: 0;
        right: 0;
        }
        .counter .counter-icon{
        width: 70px;
        height: 70px;
        line-height: 56px;
        background: #fd7e15;
        border: 7px solid #656565;
        border-right-color: #fff;
        border-bottom-color: #fff;
        outline: 5px solid #fff;
        outline-offset: -10px;
        text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
        margin: 0 auto 25px;
        font-size: 30px;
        color: #fff;
        z-index: 1;
        position: relative;
        transform: rotate(45deg);
        }
        .counter .counter-icon i{ transform: rotate(-45deg); }
        .counter .title{
        font-size: 20px;
        font-weight: 600;
        color: #656565;
        text-transform: uppercase;
        margin: 0;
        }
        .counter.blue1 .counter-value,
        .counter.blue1 .counter-icon{ background: #10a2e6; }
        .counter.purple1 .counter-value,
        .counter.purple1 .counter-icon{ background: #73438f; }
        @media only screen and (max-width: 990px){
        .counter{ margin-bottom: 30px; }
        }
    /*----------------------- CSS for counter section finished -----------------------*/
    </style>
@endsection
@section('content')
<!----------------------- FAQs section ----------------------->
<section class="com-padd com-padd-redu-bot2 pad-bot-red-40">
	<div class="container">
		<div class="row">
			<div class="com-title">
				<h2>FAQs</h2>
			</div>
		</div>
	</div>
</section>
<section class="com-padd com-padd-redu-bot2 pad-bot-red-40" style="background: #80808045;">
	<div class="container">
		<div class="row" style="padding-bottom: 30px;">
			<div class="col-md-4 col-sm-6">
				<div class="serviceBox">
					<div class="service-icon">
						<i class="fa fa-globe"></i>
					</div>
					<h3 class="title">What is Direct to Attorney?</h3>
					<p class="description">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam blanditiis debitis, harum minima mollitia sunt totam. Amet cumque deleniti eos harum,
					</p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="serviceBox">
					<div class="service-icon">
						<i class="fa fa-briefcase"></i>
					</div>
					<h3 class="title">What We Do?</h3>
					<p class="description">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam blanditiis debitis, harum minima mollitia sunt totam. Amet cumque deleniti eos harum, libero quaerat quos unde!
					</p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="serviceBox">
					<div class="service-icon">
						<i class="fa fa-rocket"></i>
					</div>
					<h3 class="title">Why We?</h3>
					<p class="description">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam blanditiis debitis, harum minima mollitia sunt totam. Amet cumque deleniti eos harum, libero quaerat quos unde!
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!----------------------- FAQs section finished ----------------------->
<!----------------------- Testimonials section ----------------------->
<section class="com-padd com-padd-redu-bot1 pad-bot-red-40">
	<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
                @foreach($testimonials as $index => $testimonial)
                    <div class="testimonial">
                        <p class="description">
                            {{$testimonial->description}}
                        </p>
                        <div class="pic">
                            <img src="{{ asset('testimonialImages').'/'.$testimonial->image}}" alt="">
                        </div>
                        <h3 class="title">{{$testimonial->name}}</h3>
                        <span class="post">{{$testimonial->designation}}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</section>
<!----------------------- Testimonials section finished ----------------------->
<!----------------------- Counter section ----------------------->
<section class="counter-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="counter">
					<span class="counter-value">407</span>
					<div class="counter-icon">
						<i class="fa fa-globe"></i>
					</div>
					<h3 class="title">Total Counts</h3>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="counter blue1">
					<span class="counter-value">120</span>
					<div class="counter-icon">
						<i class="fa fa-rocket"></i>
					</div>
					<h3 class="title">Affiliate Count</h3>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="counter purple1">
					<span class="counter-value">526</span>
					<div class="counter-icon">
						<i class="fa fa-briefcase"></i>
					</div>
					<h3 class="title">Current Users</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<br><br>
<!----------------------- Counter section finished ----------------------->
@endsection
@section('js')

<!----------------------- Testimonials section ----------------------->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
 <script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:3,
        itemsDesktop:[1000,3],
        itemsDesktopSmall:[990,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
        autoPlay:true
    });
});
</script>
<!----------------------- Counter section ----------------------->
<script type="text/javascript"> 
$(document).ready(function(){
    $('.counter-value').each(function(){
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        },{
            duration: 3500,
            easing: 'swing',
            step: function (now){
                $(this).text(Math.ceil(now));
            }
        });
    });
});
</script>
@endsection