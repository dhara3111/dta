
@extends('layouts.admin.admin_main')

@section('title')
    Add Sub Admin
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
                    <h3 class="m-subheader__title ">Sub Admin</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('admin.dashboard.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ route('admin.adminUser.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link">
                            <span class="m-nav__link-text">Manage Sub Admin</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Add Sub Admin </span>
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
                                        Create New Sub Admin
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a href="{{route('admin.adminUser.index',['userId'=>$userId,'module'=>$module])}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
                        <form id="subAdminForm" class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('admin.adminUser.store',['userId'=>$userId,'module'=>$module])}}">
                            {{csrf_field()}}
                            <div class="m-portlet__body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group m-form__group @if ($errors->has('name')) has-danger @endif">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control m-input" id="name" value="{{old('name')}}" placeholder="Enter Name" >
                                            @if ($errors->has('name'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('name') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group1 m-form__group @if ($errors->has('email')) has-danger @endif">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control m-input" id="email" value="{{old('email')}}" placeholder="Enter Email Address" >
                                            @if ($errors->has('email'))
                                                <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('email') }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group m-form__group">
                                            <label for="module_name"><strong>Select All</strong></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group m-form__group">
                                            <label for="module_name"><strong>Module Name</strong></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row" style="text-align: center">
                                        <div class="col-md-3" >
                                            <div class="form-group1 m-form__group">
                                                <label for="view"><strong>View</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3" >
                                            <div class="form-group1 m-form__group ">
                                                <label for="add"><strong>Add</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3" >
                                            <div class="form-group1 m-form__group ">
                                                <label for="edit"><strong>Edit</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3" >
                                            <div class="form-group1 m-form__group ">
                                                <label for="delete"><strong>Delete</strong></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @foreach($modules as $index => $module)
                                    @if($module->title_name == 'Module')

                                    @else
                                        <div class="row" >
                                            <div class="col-md-2">
                                                <div class="form-group1 m-form__group">
                                                    <label class="m-checkbox m-checkbox--check-bold m-checkbox--state-primary">
                                                        <input type="checkbox" class="selectAll" data-id="{{ $module->id }}" name="selectAll" >
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group m-form__group  @if ($errors->has('name')) has-danger @endif">
                                                    <input type="hidden" name="module_name[]" class="form-control m-input" id="exampleInputEmail1" value="{{$module->id}}" placeholder="Enter Email Address" >
                                                    <label>{{$module->title_name}}</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 row" style="text-align: center">
                                                <div class="col-md-3">
                                                    <div class="form-group1 m-form__group">
                                                        {{--{{ (is_array(old('where_find')) && in_array($whereFind->id, old('where_find'))) ? ' checked' : '' }}--}}
                                                        <label class="m-checkbox m-checkbox--check-bold m-checkbox--state-primary">
                                                            <input type="hidden" name="permission[{{ $module->id }}][view]" value="0">
                                                            <input type="checkbox" class="checkboxAll{{ $module->id }}" id="checkBoxView" data-id="{{ $module->id }}" name="permission[{{ $module->id }}][view]" value="1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group1 m-form__group">
                                                        <label class="m-checkbox m-checkbox--check-bold m-checkbox--state-primary">
                                                             <input type="hidden" name="permission[{{ $module->id }}][add]" value="0">
                                                            <input type="checkbox" class="checkboxAll{{ $module->id }}" id="checkBoxAdd" data-id="{{ $module->id }}" name="permission[{{ $module->id }}][add]" value="1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group1 m-form__group">
                                                        <label class="m-checkbox m-checkbox--check-bold m-checkbox--state-primary">
                                                            <input type="hidden" name="permission[{{ $module->id }}][edit]" value="0">
                                                            <input type="checkbox" class="checkboxAll{{ $module->id }}" id="checkBoxEdit" data-id="{{ $module->id }}" name="permission[{{ $module->id }}][edit]" value="1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group1 m-form__group">
                                                        <label class="m-checkbox m-checkbox--check-bold m-checkbox--state-primary">
                                                             <input type="hidden" name="permission[{{ $module->id }}][delete]" value="0">
                                                            <input type="checkbox" class="checkboxAll{{ $module->id }}" id="checkBoxDelete" data-id="{{ $module->id }}" name="permission[{{ $module->id }}][delete]" value="1">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.adminUser.index',['userId'=>$userId,'module'=>$module])}}" class="btn btn-secondary">Cancel</a>
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
        $("#subAdminForm").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email:true
                },
            },
        });

        $(document).ready(function(){
            $(".selectAll").click(function(){
                $id=$(this).attr('data-id');
                if(this.checked){
                    $('.checkboxAll'+$id).each(function(){
                        $(".checkboxAll"+$id).prop('checked', true);
                    })
                }else{
                    $('.checkboxAll'+$id).each(function(){
                        $(".checkboxAll"+$id).prop('checked', false);
                    })
                }
            });
        });

//        $("#checkBoxAdd").click(function(){
//
//            var chk1 = $('#checkBoxAdd');
//            var chk2 = $('#checkBoxView');
//
//            //check the other box
//            chk1.change(function(){
//                chk2.prop('checked',this.checked);
//            });
//        });
//
//        $("#checkBoxEdit").click(function(){
//            $id=$(this).attr('data-id');
//
//            var chk1 = $('#checkBoxEdit');
//            var chk2 = $('#checkBoxView');
//
//            //check the other box
//            chk1.change(function(){
//                chk2.prop('checked',this.checked);
//            });
//        });
//        $("#checkBoxDek").click(function(){
//            var chk1 = $('#checkBoxAdd');
//            var chk2 = $('#checkBoxView');
//
//            //check the other box
//            chk1.change(function(){
//                chk2.prop('checked',this.checked);
//            });
//        });
//        $("#checkBoxAdd").click(function(){
//            var chk1 = $('#checkBoxAdd');
//            var chk2 = $('#checkBoxView');
//
//            //check the other box
//            chk1.change(function(){
//                chk2.prop('checked',this.checked);
//            });
//        });
    </script>
@endsection

