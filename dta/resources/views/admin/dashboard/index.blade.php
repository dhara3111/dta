
@extends('layouts.admin.admin_main')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Dashboard</h3>
                </div>

            </div>
        </div>

        <div class="m-content">
            <!--begin:: Widgets/Stats-->
            <div class="m-portlet  m-portlet--unair">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::Total Profit-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Leads
                                    </h4><br>
                                    <span class="m-widget24__desc">
                                        Total Leads
                                    </span>
                                    <span class="m-widget24__stats m--font-brand">
                                        {{count($leads)}}
                                    </span>
                                    <div class="m--space-10"></div>

                                    <span class="m-widget24__change">

                                    </span>
                                    <span class="m-widget24__number">
                                    </span>
                                </div>
                            </div>
                            <!--end::Total Profit-->
                        </div>

                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Feedbacks-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Sub Admin
                                    </h4><br>
                                    <span class="m-widget24__desc">
                                        Total Sub Admin
                                    </span>
                                    <span class="m-widget24__stats m--font-info">
                                        {{count($subAdmins)}}
                                    </span>
                                    <div class="m--space-10"></div>

                                    <span class="m-widget24__change">

                                    </span>
                                    <span class="m-widget24__number">
                                    </span>
                                </div>
                            </div>
                            <!--end::New Feedbacks-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Orders-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Attorneys
                                    </h4><br>
                                    <span class="m-widget24__desc">
                                        Import Attorney Total
                                    </span>
                                    <span class="m-widget24__stats m--font-danger">
                                       {{count($attorneys)}}
                                    </span>
                                    <div class="m--space-10"></div>

                                    <span class="m-widget24__change">

                                    </span>
                                    <span class="m-widget24__number">
                                    </span>
                                </div>
                            </div>
                            <!--end::New Orders-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('theme/app/js/dashboard.js')}}" type="text/javascript"></script>
@endsection