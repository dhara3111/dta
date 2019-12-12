
@extends('layouts.admin.admin_main')

@section('title')
    Add Service
@endsection

@section('css')
    <style>
        .m-form.m-form--fit .m-form__content, .m-form.m-form--fit .m-form__group, .m-form.m-form--fit .m-form__heading{
         padding-top: 10px;
        }
    </style>
@endsection
@section('content')
    <!-- begin::Body -->

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Service</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('admin.dashboard.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ route('admin.service.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link">
                            <span class="m-nav__link-text">Manage Service</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Add Service</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="row">
                <div class="col-md-12">

                    <!--begin::Portlet-->
                    <div class="m-portlet m-portlet--tab">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <span class="m-portlet__head-icon m--hide">
                                        <i class="la la-gear"></i>
                                    </span>
                                    <h3 class="m-portlet__head-text">
                                        Create New Service
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a href="{{route('admin.service.index',['userId'=>$userId,'module'=>$module])}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                            <span>
                                                <i class="fa fa-arrow-circle-left"></i>
                                                <span>Back</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form id="serviceForm" class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('admin.service.store',['userId'=>$userId,'module'=>$module])}}">
                            {{csrf_field()}}
                            <div class="m-portlet__body">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group m-form__group">
                                            <label for="exampleInputEmail1">Service Name</label>
                                            <input type="text" name="name" class="form-control m-input" id="name" value="{{old('name')}}" placeholder="Enter Service Name" >
                                            @if ($errors->has('name'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('name') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit " style="text-align: center;">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('admin.service.index',['userId'=>$userId,'module'=>$module]) }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>

                        <!--end::Form-->
                    </div>

                    <!--end::Portlet-->
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Body -->
@endsection
@section('js')
    <!--begin::Page Resources -->
    <script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/input-mask.js') }}" type="text/javascript"></script>
    <!--end::Page Resources -->
    <script type="text/javascript" src="{{ asset('js/validation/jquery.validate.js') }}"></script>
    <script>
        $("#serviceForm").validate({
            rules: {
                name: {
                    required: true,
                },
            },
        });
    </script>

@endsection

