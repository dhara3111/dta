
@extends('layouts.admin.admin_main')

@section('title')
    Sub Admin
@endsection

@section('content')

    <!-- begin::Body -->

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Sub Admin </h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('admin.dashboard.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{route('admin.adminUser.index',['userId'=>$userId,'module'=>$module])}}" class="m-nav__link">
                                <span class="m-nav__link-text">Manage Sub Admin </span>
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
                                List Of Sub Admin
                            </h3>
                        </div>
                    </div>
                    @if($add == 1)
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="{{route('admin.adminUser.create',['userId'=>$userId,'module'=>$module])}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>Add Sub Admin </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="m-portlet__body">
                    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer" id="kt_table_1" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            @if(Auth::user()->type == \App\User::Developer )
                                <th>User Type</th>
                            @endif
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $index => $user)
                            @if($user->type != \App\User::Developer)
                                <tr class="delete{{ $user->id }}">
                                    <td>
                                        <img src="{{Avatar::create($user->name)->toBase64()}}" class="m--img-rounded m--marginless m--img-centered"
                                             alt="" width="40px" height="40px"/>
                                        <strong class="m--margin-left-10">{{$user->name ? $user->name : '-'}}</strong>
                                    </td>
                                    <td> <a href="mailto:{{$user->email}}">{{$user->email ? $user->email : '-'}}</a></td>

                                    @if(Auth::user()->type == \App\User::Developer )
                                        <td>
                                            <strong class="m--margin-left-10">{{$user->type ? $user->type : '-'}}</strong>
                                        </td>
                                    @endif
                                    <td>
                                        <div class="change{{ $user->id }}">
                                            @if($user->status == \App\User::ACTIVE)
                                                <span class="m-badge m-badge--success m-badge--wide statusChange" data-id="{{ $user->id }}"  status-id="{{ \App\User::IN_ACTIVE }}" style="cursor: pointer">Active</span>
                                            @else
                                                <span class="m-badge m-badge--danger m-badge--wide statusChange" data-id="{{ $user->id }}" status-id="{{ \App\User::ACTIVE }}" style="cursor: pointer">In-Active</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td width="120px">
                                        @if($edit == 1)
                                            <a href="{{ route('admin.adminUser.edit',['id'=>$user->id,'userId'=>$userId,'module'=>$module]) }}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only">
                                                <i class="fa fa-pencil-alt fa-2x"></i>
                                            </a>
                                        @endif
                                        @if($delete == 1)
                                            <a href="" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only delete" data-id="{{ $user->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>

                            <th>Name</th>
                            <th>Email</th>
                            @if(Auth::user()->type == \App\User::Developer )
                                <th>User Type</th>
                            @endif
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <!--begin::Modal-->
    <div class="modal fade" id="m_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form id="changePasswordForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Password:</label>
                                <input type="text" class="form-control" id="password" name="password">
                                <input type="hidden" class="form-control" id="id">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary changePassword" >Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--end::Modal-->


    <!-- end:: Body -->
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/validation/jquery.validate.js') }}"></script>
    <script src="{{asset('theme/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ '/assets/demo/default/custom/crud/metronic-datatable/base/responsive-columns.js' }}" type="text/javascript"></script>
    <script>

        $(document).ready(function() {
            $('#kt_table_1').DataTable();
        } );



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
                        url:'{{ route('admin.adminUser.changeStatus',['userId'=>$userId,'module'=>$module]) }}',
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
                        url:'{{ route('admin.adminUser.delete',['userId'=>$userId,'module'=>$module]) }}',
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