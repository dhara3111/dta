
@extends('layouts.admin.admin_main')

@section('title')
    Modules list
@endsection

@section('content')


    <!-- begin::Body -->

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Modules list </h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('admin.dashboard.index') }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Manage Modules list </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                List Of Modules list
                            </h3>
                        </div>
                    </div>

                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('admin.module.create')}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add Module </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="m-portlet__body">
                    <table class="table table-bordered table-striped" id="example" style="width:100%">
                        <thead>
                        <tr>
                            <th>Folder Name</th>
                            <th>File Name</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($modules as $index => $module)
                                <tr class="delete{{ $module->id }}">
                                    <td>
                                        <strong class="m--margin-left-10">{{$module->folder_name ? $module->folder_name : '-'}}</strong>
                                    </td>
                                    <td>
                                        <strong class="m--margin-left-10">{{$module->file_name ? $module->file_name : '-'}}</strong>
                                    </td>
                                    <td>
                                        <strong class="m--margin-left-10">{{$module->title_name ? $module->title_name : '-'}}</strong>
                                    </td>
                                    <td>
                                        <strong class="m--margin-left-10">{{$module->icon ? $module->icon : '-'}}</strong>
                                    </td>

                                    <td>
                                        <div class="change{{ $module->id }}">
                                            @if($module->status == \App\Models\Module::ACTIVE)
                                                <span class="m-badge m-badge--success m-badge--wide {{ $module->id != 3 ? 'statusChange' : '' }}" data-id="{{ $module->id }}"  status-id="{{ \App\Models\Module::IN_ACTIVE }}" style="{{ $module->id != 3 ? 'cursor: pointer' : '' }}">Active</span>
                                            @else
                                                <span class="m-badge m-badge--danger m-badge--wide statusChange" data-id="{{ $module->id }}" status-id="{{ \App\Models\Module::ACTIVE }}" style="cursor: pointer">In-Active</span>
                                            @endif
                                        </div>

                                    </td>
                                    <td width="120px">
                                        <a href="{{ route('admin.module.edit',['id'=>$module->id]) }}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only">
                                            <i class="fa fa-pencil-alt fa-2x"></i>
                                        </a>

                                        <a href="" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only delete" data-id="{{ $module->id }}">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Folder Name</th>
                            <th>File Name</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Body -->
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/validation/jquery.validate.js') }}"></script>
    <script src="{{asset('theme/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ '/assets/demo/default/custom/crud/metronic-datatable/base/responsive-columns.js' }}" type="text/javascript"></script>
    <script>

        $(document).ready(function() {
            $('#example').DataTable();
        } );

        function confirm_delete(url) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href=url;
                }
            })
        }


        $('body').on('click','.statusChange',function(){

            swal({
                title: 'Are you sure?',
                // text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.value) {
                    $id = $(this).attr('data-id');
                    $.ajax({
                        type: "POST",
                        url:'{{ route('admin.module.changeStatus') }}',
                        data: {
                            'id':$(this).attr('data-id'),
                            'status_id':$(this).attr('status-id'),
                            '_token' : "{{ csrf_token() }}"
                        },
                        async: true,
                        dataType:"json",
                        success: function(data) {
                            // console.log(data);
                            // console.log(data.adminUser.user.roles[0].name);
                            if(data.status == true){
                                $('.change'+$id).html(data.html);
                            }
                            else{
                                swal({
                                    title: "Oops...!",
                                    text: "something went wrong...",
                                    type: 'error'
                                });
                            }
                        },error:function()
                        {
                            swal({
                                title: "Oops...!",
                                text: "something went wrong...",
                                type: 'error'
                            });
                        }
                    });
                }
            })
            return false;
        });

        $('body').on('click','.delete',function(){

            swal({
                title: 'Are you sure?',
                // text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.value) {
                    $id = $(this).attr('data-id');
                    $.ajax({
                        type: "POST",
                        url:'{{ route('admin.module.delete') }}',
                        data: {
                            'id':$(this).attr('data-id'),
                            '_token' : "{{ csrf_token() }}"
                        },
                        async: true,
                        dataType:"json",
                        success: function(data) {
                            // console.log(data);
                            // console.log(data.adminUser.user.roles[0].name);
                            if(data.status == true){
                                $('.delete'+$id).remove();
                            }
                            else{
                                swal({
                                    title: "Oops...!",
                                    text: "something went wrong...",
                                    type: 'error'
                                });
                            }
                        },error:function()
                        {
                            swal({
                                title: "Oops...!",
                                text: "something went wrong...",
                                type: 'error'
                            });
                        }
                    });
                }
            })
            return false;
        });

        $('body').on('click','.resetPassword',function(){

            var id = $(this).attr('data-id');
            $('#id').val(id);


            $('#m_modal_5').modal('show');
            $('#password').val('');
            $('#password-error').html('');
            return false;

        });

        $("#changePasswordForm").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6
                },

            }
        });

        $('body').on('click','.changePassword',function(){


            if ($("#changePasswordForm").valid()) {

                var password = $('#password').val();
                var id = $('#id').val();

                showLoading();
                $.ajax({
                    type: "POST",
                    url: '{{ route('admin.adminUser.changePassword') }}',
                    data: {
                        'id': id,
                        'password': password,
                        '_token': "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function (data) {
                        hideLoading();
                        if (data.status == true) {
                            $('#m_modal_5').modal('hide');
                            swal({
                                title: "Success",
                                text: "Password Change Successfully",
                                type: 'success'
                            });
                        }
                        else {
                            swal({
                                title: "Oops...!",
                                text: "something went wrong...",
                                type: 'error'
                            });
                        }
                    }, error: function () {
                        hideLoading();
                        swal({
                            title: "Oops...!",
                            text: "something went wrong...",
                            type: 'error'
                        });
                    }
                });

                return false;
            }
        });

    </script>

@endsection