<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Posting Instruction | Direct To Attorney.</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,900|Mirza:400,700&amp;subset=arabic" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('theme/posting/style.css')}}">
      <link rel="stylesheet" href="{{asset('theme/posting/common_class.css')}}">
      <!-- endinject -->

      <!--begin::Favicon Icon -->
      <link rel="shortcut icon" href="{{asset('ourLogoImages/favicon_2.png')}}" />

   </head>
   <body>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <img src="{{asset('ourLogoImages/'.$otherDetail->image)}}" style="height: 50px;" class="m-t-30 m-b-30" alt=""/>
                  <h3>How to Post {{ucwords($type->name)}} Leads to Direct To Attorney</h3>
                  <p>These instructions describe how PBX Calls should post leads to Direct To Attorney's campaign Family Calls and understand what to expect in response.</p>
               </div>
            </div>
            <!-- ends: .row -->
            <div class="row">
               <div class="col-md-12">
                  <h3>Direct Post</h3>
                  <table class="table table-bordered m-t-10">
                     <tbody>
                        <tr>
                           <th>Post URL</th>
                           <td>{{route('admin.postingInstruction.posting',['id'=>$type->id])}}</td>
                        </tr>
                        <tr>
                           <th>Request Method</th>
                           <td>POST supported.</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- ends: .row -->
            <div class="row">
               <div class="col-md-12">
                  <h3>Posting Fields</h3>
                  <table class="table table-bordered m-t-10">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Field</th>
                           <th>Required</th>
                           <th>Data Type</th>
                           <th>Description</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>lp_campaign_id</td>
                           <td>Yes</td>
                           <td>String</td>
                           <td>Provided to you by Direct To Attorney</td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>lp_campaign_key</td>
                           <td>Yes</td>
                           <td>String</td>
                           <td>Provided to you by Direct To Attorney</td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>lp_test</td>
                           <td>No</td>
                           <td>String</td>
                           <td>1 for Test Post</td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>lp_response</td>
                           <td>No</td>
                           <td>String</td>
                           <td>Response back XML or JSON</td>
                        </tr>
                        <tr>
                           <td>5</td>
                           <td>first_name</td>
                           <td>No</td>
                           <td>String</td>
                           <td>First Name</td>
                        </tr>
                        <tr>
                           <td>6</td>
                           <td>last_name</td>
                           <td>No</td>
                           <td>String</td>
                           <td>Last Name</td>
                        </tr>
                        <tr>
                           <td>7</td>
                           <td>phone_home</td>
                           <td>Yes</td>
                           <td>US Phone</td>
                           <td>Phone Home</td>
                        </tr>
                        <tr>
                           <td>8</td>
                           <td>city</td>
                           <td>No</td>
                           <td>US City</td>
                           <td>City</td>
                        </tr>
                        <tr>
                           <td>9</td>
                           <td>state</td>
                           <td>No</td>
                           <td>US State</td>
                           <td>State</td>
                        </tr>
                        <tr>
                           <td>10</td>
                           <td>zip_code</td>
                           <td>Yes</td>
                           <td>US Zip Code</td>
                           <td>Zip Code</td>
                        </tr>
                        <tr>
                           <td>11</td>
                           <td>email_address</td>
                           <td>Yes</td>
                           <td>E-Mail</td>
                           <td>E-Mail Address</td>
                        </tr>
                        <tr>
                           <td>12</td>
                           <td>ip_address</td>
                           <td>No</td>
                           <td>IP</td>
                           <td>IP Address</td>
                        </tr>
                        <tr>
                           <td>13</td>
                           <td>Type_Of_Legal_Problem</td>
                           <td>Yes</td>
                           <td>List</td>
                           <td>Type of Legal Problem</td>
                        </tr>
                        <tr>
                           <td>14</td>
                           <td>valid</td>
                           <td>No</td>
                           <td>Text</td>
                           <td>Valid Email</td>
                        </tr>
                        <tr>
                           <td>15</td>
                           <td>comments</td>
                           <td>No</td>
                           <td>Text</td>
                           <td>Comments</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- ends: .row -->
            <div class="row">
               <div class="col-md-12 m-t-20">
                  <h3>List Values</h3>
                  <p>When posting leads, make sure you post the list value.</p>
                  <h5><b>Type of Legal Problem</b></h5>
                  <table class="table table-bordered m-t-10">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Label</th>
                           <th>Key</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($types as $index => $type)

                           <tr>
                              <td>{{$index=$index + 1}}</td>
                              <td>{{$type->name}}</td>
                              <td>{{$type->key}}</td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- ends: .row -->
            <div class="row">
               <div class="col-md-12 m-t-20">
                  <h3>Posting Tests</h3>
                  <p>There are multiple ways to post a test lead. You can either post:</p>
                  <ul>
                     <li><b>test</b> in the first name or last name field; or</li>
                     <li><b>1 in the <b>lp_test</b> field</li>
                  </ul>
               </div>
            </div>
            <!-- ends: .row -->
            <div class="row">
               <div class="col-md-12 m-t-20">
                  <h3>Post Responses</h3>
                  <p>When a lead is posted, you will get a real-time response. The default response is in XML format; You can request the response to be JSON if you pass json in lp_response field.</p>
                  <table class="table table-bordered">
                     <tbody>
                        <tr>
                           <td class="font-bold" width="100">Success</td>
                           <td>
                              <div class="xml" style="font-family:monospace;">
                                 <span style="color: #009900;"><span style="color: #000000; font-weight: bold;">&lt;response<span style="color: #000000; font-weight: bold;">&gt;</span></span><span style="color: #000000; font-weight: bold;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&lt;result<span style="color: #000000; font-weight: bold;">&gt;</span></span></span>success<span style="color: #009900;"><span style="color: #000000; font-weight: bold;">&lt;/result<span style="color: #000000; font-weight: bold;">&gt;</span></span><span style="color: #000000; font-weight: bold;"></span></span><span style="color: #000000; font-weight: bold;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&lt;code<span style="color: #000000; font-weight: bold;">&gt;</span></span></span>200<span style="color: #009900;"><span style="color: #000000; font-weight: bold;">&lt;/code<span style="color: #000000; font-weight: bold;">&gt;</span></span><span style="color: #000000; font-weight: bold;"></span></span><span style="color: #000000; font-weight: bold;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&lt;msg<span style="color: #000000; font-weight: bold;">&gt;</span></span></span>Lead Accepted<span style="color: #009900;"><span style="color: #000000; font-weight: bold;">&lt;/msg<span style="color: #000000; font-weight: bold;">&gt;</span></span><span style="color: #000000; font-weight: bold;"><br>&lt;/response<span style="color: #000000; font-weight: bold;">&gt;</span></span></span>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td class="font-bold">Failure</td>
                           <td>
                              <div class="xml" style="font-family:monospace;"><span style="color: #009900;"><span style="color: #000000; font-weight: bold;">&lt;response<span style="color: #000000; font-weight: bold;">&gt;</span></span><span style="color: #000000; font-weight: bold;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&lt;result<span style="color: #000000; font-weight: bold;">&gt;</span></span></span>failed<span style="color: #009900;"><span style="color: #000000; font-weight: bold;">&lt;/result<span style="color: #000000; font-weight: bold;">&gt;</span></span><span style="color: #000000; font-weight: bold;"></span></span><span style="color: #000000; font-weight: bold;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&lt;code<span style="color: #000000; font-weight: bold;">&gt;</span></span></span>404<span style="color: #009900;"><span style="color: #000000; font-weight: bold;">&lt;/code<span style="color: #000000; font-weight: bold;">&gt;</span></span><span style="color: #000000; font-weight: bold;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&lt;msg<span style="color: #000000; font-weight: bold;">&gt;</span></span></span>Lead Rejected<span style="color: #009900;"><span style="color: #000000; font-weight: bold;">&lt;/msg<span style="color: #000000; font-weight: bold;">&gt;</span></span><span style="color: #000000; font-weight: bold;"></span></span><span style="color: #000000; font-weight: bold;"><br>&lt;/response<span style="color: #000000; font-weight: bold;">&gt;</span></span></span></div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- ends: .row -->
         </div>
      </section>
   </body>
</html>