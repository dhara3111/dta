
@extends('layouts.admin.admin_main')

@section('title')
    Request Training Approve List
@endsection

@section('content')


    <!-- begin::Body -->

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Request Training Back </h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('admin.dashboard.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Manage Request Training</span>
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
                                Approve Training List
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('admin.requestTraining.index',['userId'=>$userId,'module'=>$module])}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Show Panding Training Lsit</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <table class="table table-bordered table-striped" id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Day 1</th>
                                <th>Time for Day 1</th>
                                <th>Day 2</th>
                                <th>Time for Day 2</th>
                                <th>Day 3</th>
                                <th>Time for Day 3</th>
                                <th>Topics</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($requestTrainings as $index => $requestTraining)
                            <tr class="delete{{ $requestTraining->id }}">

                                <td>
                                    <strong class="m--margin-left-10"> {{$requestTraining->user->name ? $requestTraining->user->name : '-'}}</strong>
                                </td>
                                <td>
                                    <strong class="m--margin-left-10"> {{$requestTraining->day_1 ? $requestTraining->day_1 : '-'}}</strong>
                                </td>
                                <td>
                                    <strong class="m--margin-left-10"> {{$requestTraining->best_time_1 ? $requestTraining->best_time_1 : '-'}}</strong>
                                </td>
                                <td>
                                    <strong class="m--margin-left-10"> {{$requestTraining->day_2 ? $requestTraining->day_2 : '-'}}</strong>
                                </td>
                                <td>
                                    <strong class="m--margin-left-10"> {{$requestTraining->best_time_2 ? $requestTraining->best_time_2 : '-'}}</strong>
                                </td>
                                <td>
                                    <strong class="m--margin-left-10"> {{$requestTraining->day_3 ? $requestTraining->day_3 : '-'}}</strong>
                                </td>
                                <td>
                                    <strong class="m--margin-left-10"> {{$requestTraining->best_time_3 ? $requestTraining->best_time_3 : '-'}}</strong>
                                </td>
                                <td>
                                    <strong class="m--margin-left-10"> {{$requestTraining->topics ? $requestTraining->topics : '-'}}</strong>
                                </td>

                                <td>
                                    <div class="change{{ $requestTraining->id }}">
                                        @if($requestTraining->status == \App\Models\RequestTraining::APPROVE)
                                            <span class="m-badge m-badge--success m-badge--wide statusChange" data-id="{{ $requestTraining->id }}"  status-id="{{ \App\Models\RequestTraining::UN_APPROVE }}" style="cursor: pointer">Approve</span>
                                        @else
                                            <span class="m-badge m-badge--danger m-badge--wide statusChange" data-id="{{ $requestTraining->id }}" status-id="{{ \App\Models\RequestTraining::APPROVE }}" style="cursor: pointer">Pandding</span>
                                        @endif
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>User Name</th>
                                <th>Day 1</th>
                                <th>Time for Day 1</th>
                                <th>Day 2</th>
                                <th>Time for Day 2</th>
                                <th>Day 3</th>
                                <th>Time for Day 3</th>
                                <th>Topics</th>
                                <th>Status</th>
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
                        url:'{{ route('admin.requestTraining.changeStatus') }}',
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

    </script>

@endsection
