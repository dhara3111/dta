
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
                                {{--<p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>--}}
                            </div>
                            <table class="responsive-table bordered">
                                <thead>
                                <tr>
                                    <th>Listing Name</th>
                                    <th>Date</th>
                                    <th>Rating</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Preview</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Taj Luxury Hotel</td>
                                    <td>12 Jan 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">76</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>National Auto Care</td>
                                    <td>28 Feb 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">12</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Pearl Perfumes</td>
                                    <td>04 Mar 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">232</span></td>
                                    <td><span class="db-list-ststus-na">Inactive</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Goman Travels</td>
                                    <td>16 Mar 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">432</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>William Watt Electricals</td>
                                    <td>05 Apr 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">116</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Jb Montesari School</td>
                                    <td>14 Apr 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">553</span></td>
                                    <td><span class="db-list-ststus-na">Inactive</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Ramsey Wine Corner</td>
                                    <td>18 Apr 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">324</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Royal Real Estates</td>
                                    <td>02 May 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">876</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Colors Car Services</td>
                                    <td>07 May 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">65</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Hotel Green Woods</td>
                                    <td>09 May 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">89</span></td>
                                    <td><span class="db-list-ststus-na">Inactive</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Hotel Aqua</td>
                                    <td>21 Jun 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">54</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Taj Luxury Hotel</td>
                                    <td>12 Jan 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">76</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>National Auto Care</td>
                                    <td>28 Feb 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">12</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Pearl Perfumes</td>
                                    <td>04 Mar 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">232</span></td>
                                    <td><span class="db-list-ststus-na">Inactive</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Goman Travels</td>
                                    <td>16 Mar 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">432</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>William Watt Electricals</td>
                                    <td>05 Apr 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">116</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Jb Montesari School</td>
                                    <td>14 Apr 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">553</span></td>
                                    <td><span class="db-list-ststus-na">Inactive</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Ramsey Wine Corner</td>
                                    <td>18 Apr 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">324</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Royal Real Estates</td>
                                    <td>02 May 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">876</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Colors Car Services</td>
                                    <td>07 May 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">65</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Hotel Green Woods</td>
                                    <td>09 May 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">89</span></td>
                                    <td><span class="db-list-ststus-na">Inactive</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Hotel Aqua</td>
                                    <td>21 Jun 2019</td>
                                    <td><span class="db-list-rat">4.2</span></td>
                                    <td><span class="db-list-rat">54</span></td>
                                    <td><span class="db-list-ststus">Active</span></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
                                    <td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
                                    <td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!--RIGHT SECTION-->
                <div class="tz-3">
                    <h4>Notifications(18)</h4>
                    <ul>
                        <li>
                            <a href="#!"> <img src="{{asset('frontend/images/icon/dbr1.jpg')}}" alt="" />
                                <h5>Joseph, write a review</h5>
                                <p>All the Lorem Ipsum generators on the</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!"> <img src="{{asset('frontend/images/icon/dbr2.jpg')}}" alt="" />
                                <h5>14 New Messages</h5>
                                <p>All the Lorem Ipsum generators on the</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!"> <img src="{{asset('frontend/images/icon/dbr3.jpg')}}" alt="" />
                                <h5>Ads expairy soon</h5>
                                <p>All the Lorem Ipsum generators on the</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!"> <img src="{{asset('frontend/images/icon/dbr4.jpg')}}" alt="" />
                                <h5>Post free ads - today only</h5>
                                <p>All the Lorem Ipsum generators on the</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!"> <img src="{{asset('frontend/images/icon/dbr5.jpg')}}" alt="" />
                                <h5>listing limit increase</h5>
                                <p>All the Lorem Ipsum generators on the</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!"> <img src="{{asset('frontend/images/icon/dbr6.jpg')}}" alt="" />
                                <h5>mobile app launch</h5>
                                <p>All the Lorem Ipsum generators on the</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!"> <img src="{{asset('frontend/images/icon/dbr7.jpg')}}" alt="" />
                                <h5>Setting Updated</h5>
                                <p>All the Lorem Ipsum generators on the</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!"> <img src="{{asset('frontend/images/icon/dbr8.jpg')}}" alt="" />
                                <h5>Increase listing viewers</h5>
                                <p>All the Lorem Ipsum generators on the</p>
                            </a>
                        </li>
                    </ul>
                </div>
        </div>
    </section>
    <!--END DASHBOARD-->
@endsection
@section('js')
<script>

</script>
@endsection

