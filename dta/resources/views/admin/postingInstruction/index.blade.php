
@extends('layouts.admin.admin_main')

@section('title')
    Generate Posting Instructions
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
                    <h3 class="m-subheader__title ">Generate Posting Instructions </h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('admin.dashboard.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
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
                                        Generate Posting Instructions
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form id="postingForm" action="{{route('admin.postingInstruction.postingMail',['userId'=>$userId,'module'=>$module]) }}" class="m-form m-form--fit m-form--label-align-right" method="post">
                            {{csrf_field()}}
                            <div class="m-portlet__body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group m-form__group">
                                            <label for="exampleInputEmail1">Campaign</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group m-form__group">
                                            <select class="select2 form-control m-input" name="campaignId" id="campaignId">
                                                <option>Select Campaign</option>
                                                @foreach($types as $index => $type)
                                                    <option value="{{$type->id}}">{{ucwords($type->name)}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('campaignId'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('campaignId') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group m-form__group">
                                            <label for="exampleInputEmail1">Posting Instruction</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group m-form__group">
                                            <input type="text" name="postingUrl" class="form-control m-input" id="postingUrl" value="{{old('postingUrl')}}" placeholder="Posting Instruction" readonly>
                                            @if ($errors->has('postingUrl'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('postingUrl') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group m-form__group">
                                            <label for="exampleInputEmail1">E-Mail Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group m-form__group">
                                            <input type="text" name="email" class="form-control m-input" id="email" value="{{old('email')}}" placeholder="Enter Email ID" >
                                            @if ($errors->has('email'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('email') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <input type="submit" class="btn btn-primary " name="submit" value="Send Posting Instruction" id="postingMail">
                                    <a href="{{ route('admin.postingInstruction.index',['userId'=>$userId,'module'=>$module]) }}" class="btn btn-secondary">Cancel</a>
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
        $("#postingForm").validate({
            rules: {
                campaignId: {
                    required: true,
                },
                postingUrl: {
                    required: true,
                },
                email: {
                    required: true,
                },
            }
        });

        $('body').on('change','#campaignId', function() {
            $campaignId = $('#campaignId').val();

            showLoading();
            $.ajax({
                type: "POST",
                url:'{{ route('admin.postingInstruction.campaignKey') }}',
                data: {
                    'campaignId':$campaignId,
                    '_token' : "{{ csrf_token() }}"
                },
                async: true,
                dataType:"json",
                success: function(data) {
                    if(data.status == true){

                        $url = $('#postingUrl').val(data.url);

                        hideLoading();
                    }
                    else{
                        hideLoading();
                        swal({
                            title: "Oops...!",
                            text: "something went wrong...",
                            type: 'error'
                        });
                    }
                },error:function()
                {
                    hideLoading();
                    swal({
                        title: "Oops...!",
                        text: "something went wrong...",
                        type: 'error'
                    });
                }
            });
        });



    </script>

@endsection

