
@extends('layouts.advertiser.advertiser_main')

@section('title')
    Update Item
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
                    <h3 class="m-subheader__title ">Item</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('advertiser.dashboard.index') }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ route('advertiser.item.index') }}" class="m-nav__link">
                                <span class="m-nav__link-text">Manage Items</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Update Item</span>
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
                                        Update Item
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a href="{{route('advertiser.item.index')}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
                        <form id="itemForm" class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('advertiser.item.update',['id' => $item->id])}}">
                            {{csrf_field()}}
                            <div class="m-portlet__body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group m-form__group @if ($errors->has('name')) has-danger @endif">
                                            <label for="exampleInputEmail1">Item Name</label>
                                            <input type="text" name="name" class="form-control m-input" id="exampleInputEmail1" value="{{ $item->name }}" placeholder="Enter Item Name" >
                                            @if ($errors->has('name'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('name') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-form__group @if ($errors->has('hsn_code')) has-danger @endif">
                                            <label for="exampleInputEmail1">Item HSN Code</label>
                                            <input type="text" name="hsn_code" class="form-control m-input" id="exampleInputEmail1" value="{{ $item->hsn_code }}" placeholder="Enter Item HSN Code" >
                                            @if ($errors->has('hsn_code'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('hsn_code') }}</h6>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group m-form__group @if ($errors->has('price')) has-danger @endif">
                                            <label for="exampleInputEmail1">Price</label>
                                            <input type="text" name="price" class="form-control m-input" id="exampleInputEmail1" value="{{ $item->price }}" placeholder="Enter Item Price" >
                                            @if ($errors->has('price'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('price') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a  href="{{ route('advertiser.item.index') }}" class="btn btn-secondary">Cancel</a>
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
        $("#itemForm").validate({
            rules: {
                name: {
                    required: true,
                    // minlength: 6
                },
                hsn_code: {
                    required: true,

                    // minlength: 6
                },
                price: {
                    required: true,
                    digits: true,
                    // minlength: 6
                },

            }
        });
    </script>
@endsection

