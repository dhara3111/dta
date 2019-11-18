
@extends('layouts.frontend.frontend_main')

@section('title')
   Contact
@endsection

@section('content')
   <!-- Sub banner start -->
   <div class="sub-banner overview-bgi">
      <div class="overlay">
         <div class="container">
            <div class="breadcrumb-area">
               <h1>Contact Us</h1>
               <ul class="breadcrumbs">
                  <li><a href="{{route('frontend.home.index')}}">Home</a></li>
                  <li class="active">Contact Us</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- Sub Banner end -->

   <!-- Contact body start -->
   <div class="contact-1 content-area-7">
      <div class="container">
         <div class="main-title">
            <h1>CONTACT WITH US</h1>
         </div>
         <div class="row">

            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
               <!-- Contact form start -->
               <div class="contact-form">
                  <form id="contact_form" action="{{route('frontend.contact.store')}}" method="post" enctype="multipart/form-data">
                     {{csrf_field()}}
                     <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                           <div class="form-group fullname">
                              <input type="text" name="name" value="{{old('name')}}" class="input-text" placeholder="Full Name">
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                           <div class="form-group enter-email">
                              <input type="email" name="email" value="{{old('email')}}" class="input-text" placeholder="Enter email">
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                           <div class="form-group subject">
                              <input type="text" name="subject" value="{{old('subject')}}" class="input-text" placeholder="Subject">
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                           <div class="form-group number">
                              <input type="text" name="phone" value="{{old('phone')}}" class="input-text" placeholder="Phone Number">
                           </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                           <div class="form-group message">
                              <textarea class="input-text" name="message" placeholder="Write message">{{old('message')}}</textarea>
                           </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                           <div class="form-group send-btn mb-0">
                              <button type="submit" class="button-md button-theme">Send Message</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- Contact form end -->
            </div>
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6 col-xs-12">
               <!-- Contact details start -->
               <div class="contact-details">
                  <div class="main-title-2">
                     <h3>Our Address</h3>
                  </div>
                  <div class="media">
                     <div class="media-left">
                        <i class="fa fa-map-marker"></i>
                     </div>
                     <div class="media-body">
                        <h4>Office Address</h4>
                        <p>SF-28 Earth Icon,</br>New Vip Road,</br>Vadodara-390022.</p>
                     </div>
                  </div>
                  <div class="media">
                     <div class="media-left">
                        <i class="fa fa-phone"></i>
                     </div>
                     <div class="media-body">
                        <h4>Phone Number</h4>
                        <p>
                           <a href="tel:+55-417-634-7071">Mobile: +91 99780 07088</a>
                        </p>
                     </div>
                  </div>
                  <div class="media mb-0">
                     <div class="media-left">
                        <i class="fa fa-envelope"></i>
                     </div>
                     <div class="media-body">
                        <h4>Email Address</h4>
                        <p>
                           <a href="mailto:info@bestpropertydeal.co.in">info@bestpropertydeal.co.in</a>
                        </p>
                     </div>
                  </div>
                  <br><br>
                  <div class="media mb-0">
                     <div class="media-left">
                        <a href="https://www.facebook.com/bestpropertydealvadodara" class="facebook" target="_blank">
                           <i class="fa fa-facebook"></i>
                        </a>
                     </div>
                     <div class="media-left">
                        <a href="https://plus.google.com/114987241056582937567" class="google" target="_blank">
                           <i class="fa fa-google"></i>
                        </a>
                     </div>
                     <div class="media-left">
                        <a href="https://www.instagram.com/best_property_deal/" class="instagram" target="_blank">
                           <i class="fa fa-instagram"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <!-- Contact details end -->
            </div>
         </div>
         <br><br>
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.9419692091055!2d73.22579346426883!3d22.318034347892286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fcf3ca5c1a681%3A0xe3b57043ad045bd2!2sBEST+PROPERTY+DEAL!5e0!3m2!1sen!2sin!4v1550218587386" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
         </div>
      </div>
   </div>
   <!-- Contact body end -->

@endsection

@section('js')

@endsection