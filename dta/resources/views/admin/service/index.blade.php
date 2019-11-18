
@extends('layouts.admin.admin_main')

@section('title')
    Services
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
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Manage Service</span>
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
                                List Of Services
                            </h3>
                        </div>
                    </div>
                    @if($add == 1)
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="{{route('admin.service.create',['userId'=>$userId,'module'=>$module])}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>Add Services</span>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $index => $service)
                                <tr class="delete{{ $service->id }}">
                                    <th>{{$service->name}}</th>
                                    <td width="120px">
                                        @if($edit == 1)
                                            <a href="{{ route('admin.service.edit',['id'=>$service->id,'userId'=>$userId,'module'=>$module]) }}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only">
                                                <i class="fa fa-pencil-alt fa-2x"></i>
                                            </a>
                                        @endif
                                        @if($delete == 1)
                                            <a href="" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only delete" data-id="{{ $service->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
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
    <script>
        $(document).ready(function() {
            $('#kt_table_1').DataTable();
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
                        url:'{{ route('admin.service.changeStatus') }}',
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
                        url:'{{ route('admin.service.delete') }}',
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


    </script>

@endsection