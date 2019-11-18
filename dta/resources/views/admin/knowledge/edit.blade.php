
@extends('layouts.admin.admin_main')

@section('title')
    Update Knowledge
@endsection

@section('css')
    <style>
        .m-form.m-form--fit .m-form__content, .m-form.m-form--fit .m-form__group, .m-form.m-form--fit .m-form__heading{
            padding-top: 10px;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection
@section('content')
    <!-- begin::Body -->

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Knowledge</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('admin.dashboard.index',['userId' => $userId, 'module' => $module]) }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ route('admin.knowledge.index',['userId' => $userId, 'module' => $module]) }}" class="m-nav__link">
                                <span class="m-nav__link-text">Manage Knowledge</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Update Knowledge</span>
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
                                        Update Knowledge
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a href="{{route('admin.knowledge.index',['userId' => $userId, 'module' => $module])}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
                        <form id="knowledgeForm" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('admin.knowledge.update',['id' => $knowledge->id,'userId' => $userId, 'module' => $module])}}">
                            {{csrf_field()}}
                            <div class="m-portlet__body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group m-form__group @if ($errors->has('topic_name')) has-danger @endif">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" name="topic_name" class="form-control m-input" id="topic_name" value="{{ $knowledge->topic_name }}" placeholder="Enter Topic Name" >
                                            @if ($errors->has('topic_name'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('topic_name') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group m-form__group @if ($errors->has('desc')) has-danger @endif">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea name="description" class="form-control m-input ckeditor" id="description" placeholder="Enter Knowledge Description">{{ $knowledge->description }}</textarea>
                                            @if ($errors->has('description'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('description') }}</h6>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a  href="{{ route('admin.knowledge.index',['userId' => $userId, 'module' => $module]) }}" class="btn btn-secondary">Cancel</a>
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
        $("#knowledgeForm").validate({
            rules: {
                name: {
                    required: true,
                },
                desc: {
                    required: true,
                },
            }
        });

        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection

