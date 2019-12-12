
@extends('layouts.admin.admin_main')

@section('title')
    Attorney List
@endsection

@section('content')


    <!-- begin::Body -->

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Attorney Lists</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('admin.dashboard.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Manage Attorney</span>
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
                                List Of Attorney
                            </h3>
                        </div>
                    </div>
                    @if($add == 1)
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="{{route('admin.attorney.import',['userId'=>$userId,'module'=>$module])}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>Import Attorney Data </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="m-portlet__body">
                    {{--                    {{ dd($users) }}--}}
                    {{--<input type="text" id="userId" value="{{$userId}}">--}}
                    {{--<input type="text" id="module" value="{{$module}}">--}}

                    <table class="table table-bordered data-table table-responsive">
                        <thead>
                        <tr>
                            <th style="padding-right: 10%;">Name</th>
                            <th style="padding-right: 15%;">Email</th>
                            <th style="padding-right: 4%;">Phone</th>
                            <th style="padding-right: 5%;">Street</th>
                            <th style="padding-right: 5%;">Area</th>
                            <th style="padding-right: 4%;">City</th>
                            <th>State</th>
                            <th>Zipcode</th>
                            <th style="padding-right: 35%;">Expertize In</th>
                            <th style="padding-right: 5%;">services In City</th>
                            <th style="padding-right: 3%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th style="padding-right: 10%;">Name</th>
                            <th style="padding-right: 25%;">Email</th>
                            <th style="padding-right: 4%;">Phone</th>
                            <th style="padding-right: 5%;">Street</th>
                            <th style="padding-right: 5%;">Area</th>
                            <th style="padding-right: 4%;">City</th>
                            <th>State</th>
                            <th>Zipcode</th>
                            <th style="padding-right: 35%;">Expertize In</th>
                            <th style="padding-right: 5%;">services In City</th>
                            <th style="padding-right: 3%;">Action</th>
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


        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.attorney.index',['userId'=>$userId,'module'=>$module]) }}",
                {{--"ajax": {--}}
                    {{--"url": "{{ route('admin.attorney.index',['userId'=>$userId,'module'=>$module])}}",--}}
                    {{--"type": "POST",--}}
                    {{--"data":function(data) {--}}
                        {{--data.userId = $('#userId').val();--}}
                        {{--data.module = $('#module').val();--}}
                        {{----}}
                    {{--},--}}
                {{--},--}}
                "order": [[ 0, "asc" ]],

                columns: [
                    {data: 'name', name: 'name',defaultContent:'-'},
                    {data: 'email', name: 'email',defaultContent:'-'},
                    {data: 'phone', name: 'phone',defaultContent:'-'},
                    {data: 'street', name: 'street',defaultContent:'-'},
                    {data: 'area', name: 'area',defaultContent:'-'},
                    {data: 'city', name: 'city',defaultContent:'-'},
                    {data: 'state', name: 'state',defaultContent:'-'},
                    {data: 'zipcode', name: 'zipcode',defaultContent:'-'},
                    {data: 'expertize_in', name: 'expertize_in',defaultContent:'-'},
                    {data: 'service_in_city', name: 'service_in_city',defaultContent:'-'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]
            });
        });

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
                    url:'{{ route('admin.attorney.changeStatus',['userId'=>$userId,'module'=>$module]) }}',
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
                    url:'{{ route('admin.attorney.delete',['userId'=>$userId,'module'=>$module]) }}',
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