
@extends('layouts.admin.admin_main')

@section('title')
    Our Detail
@endsection

@section('content')


    <!-- begin::Body -->

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Our Detail</h3>
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
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                List Of Our Detail
                            </h3>
                        </div>
                    </div>

                    {{--@if($add == '1')--}}
                        {{--<div class="m-portlet__head-tools">--}}
                            {{--<ul class="m-portlet__nav">--}}
                                {{--<li class="m-portlet__nav-item">--}}
                                    {{--<a href="{{route('admin.ourDetail.create',['userId'=>$userId,'module'=>$module])}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">--}}
                                        {{--<span>--}}
                                            {{--<i class="la la-plus"></i>--}}
                                            {{--<span>Add Our Detail</span>--}}
                                        {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--@endif--}}


                </div>
                <div class="m-portlet__body">
                    <table class="table table-bordered table-striped" id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th>Website Logo</th>
                                <th>Favicon Icon</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>URL</th>
                                <th>Footer Name</th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($ourDetails as $index => $ourDetail)
                            <tr class="delete{{ $ourDetail->id }}">
                                <td>
                                    <center>
                                        <img src="{{ asset('ourLogoImages').'/'.$ourDetail->image}}" style="height: 50%;width: 100%;">
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <img src="{{ asset('ourLogoImages').'/'.$ourDetail->favicon}}" style="height: 10%;width: 35%;">
                                    </center>
                                </td>
                                <td><strong class="m--margin-left-10">{{$ourDetail->address ? $ourDetail->address : '-'}}</strong></td>
                                <td><strong class="m--margin-left-10">{{$ourDetail->mobile ? $ourDetail->mobile : '-'}}</strong></td>
                                <td><strong class="m--margin-left-10">{{$ourDetail->email ? $ourDetail->email : '-'}}</strong></td>
                                <td><strong class="m--margin-left-10">{{$ourDetail->website ? $ourDetail->website : '-'}}</strong></td>
                                <td><strong class="m--margin-left-10">{{$ourDetail->website_name ? $ourDetail->website_name : '-'}}</strong></td>

                                <td width="120px">

                                    @if($edit == '1')
                                        <a href="{{ route('admin.ourDetail.edit',['id'=>$ourDetail->id,'userId'=>$userId,'module'=>$module]) }}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only">
                                            <i class="fa fa-pencil-alt fa-2x"></i>
                                        </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Website Logo</th>
                                <th>Favicon Icon</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>URL</th>
                                <th>Footer Name</th>
                                <th><center>Action</center></th>
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
                        url:'{{ route('admin.type.delete',['userId'=>$userId,'module'=>$module]) }}',
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