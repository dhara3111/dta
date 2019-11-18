
@extends('layouts.admin.admin_main')

@section('title')
    Update Attorney
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

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Attorney</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('admin.dashboard.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ route('admin.attorney.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link">
                                <span class="m-nav__link-text">Manage Attorney</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Update Attorney</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
                                        Update Attorney
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a href="{{route('admin.attorney.index',['userId'=>$userId,'module'=>$module])}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
                        <form id="subAdminFormEdit" class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('admin.attorney.update',['id' => $user->id,'userId'=>$userId,'module'=>$module])}}">
                            {{csrf_field()}}
                            <div class="m-portlet__body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group m-form__group @if ($errors->has('name')) has-danger @endif">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control m-input" id="name" value="{{ $user->name }}" placeholder="Enter First Name" >
                                            @if ($errors->has('name'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('name') }}</h6>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group1 m-form__group @if ($errors->has('email')) has-danger @endif">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control m-input" id="email" value="{{ $user->email }}" placeholder="Enter Email Address" >
                                            @if ($errors->has('email'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('email') }}</h6>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group1 m-form__group @if ($errors->has('street')) has-danger @endif">
                                            <label for="street">Street</label>
                                            <input type="text" name="street" class="form-control m-input" id="street" value="{{ $user->street }}" placeholder="Enter street"  >
                                            @if ($errors->has('street'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('street') }}</h6>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group1 m-form__group @if ($errors->has('city')) has-danger @endif">
                                            <label for="city">City</label>
                                            <input type="text" name="city" class="form-control m-input" id="city" value="{{ $user->city }}" placeholder="Enter city"  >
                                            @if ($errors->has('city'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('city') }}</h6>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group1 m-form__group @if ($errors->has('state')) has-danger @endif">
                                            <label for="state">State</label>
                                            <input type="text" name="state" class="form-control m-input" id="state" value="{{ $user->state }}" placeholder="Enter state"  >
                                            @if ($errors->has('state'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('state') }}</h6>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group1 m-form__group @if ($errors->has('phone')) has-danger @endif">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" class="form-control m-input" id="phone" value="{{ $user->phone }}" placeholder="Enter phone"  >
                                            @if ($errors->has('phone'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('phone') }}</h6>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group1 m-form__group @if ($errors->has('zipcode')) has-danger @endif">
                                            <label for="zipcode">Zipcode</label>
                                            <input type="text" name="zipcode" class="form-control m-input" id="zipcode" value="{{ $user->zip_code }}" placeholder="Enter zipcode"  >
                                            @if ($errors->has('zipcode'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('zipcode') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group1 m-form__group @if ($errors->has('service_in_city')) has-danger @endif">
                                            <label for="service_in_city">Service In City</label>
                                            <input type="text" name="service_in_city" class="form-control m-input" id="service_in_city" value="{{ $user->service_in_city }}" placeholder="Enter Service in city"  >
                                            @if ($errors->has('service_in_city'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('service_in_city') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group1 m-form__group @if ($errors->has('expertize_in')) has-danger @endif">
                                            <label for="expertize_in">Expertize In</label>
                                            <input type="text" name="expertize_in" class="form-control m-input" id="expertize_in" value="{{ $user->expertize_in }}" placeholder="Enter expertize in"  >
                                            @if ($errors->has('expertize_in'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('expertize_in') }}</h6>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a  href="{{ route('admin.attorney.index',['userId'=>$userId,'module'=>$module]) }}" class="btn btn-secondary">Cancel</a>
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
    <script>
        $("#attorneyFormEdit").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                street: {
                    required: true,
                },
                city: {
                    required: true,
                },
                state: {
                    required: true,
                },
                area: {
                    required: true,
                },
                zipcode: {
                    required: true,
                },
                expertize_in: {
                    required: true,
                },
                service_in_city: {
                    required: true,
                },
            },
        });
    </script>
@endsection

