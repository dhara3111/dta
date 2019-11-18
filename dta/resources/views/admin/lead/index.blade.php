
@extends('layouts.admin.admin_main')

@section('title')
    Leads List
@endsection
@section('css')
    <style>
        .m-checkbox > span, .m-radio > span {
            background: 0 0;
            position: absolute;
            top: -15px !important;
            left: 40px !important;
            height: 18px;
            width: 18px;
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
                    <h3 class="m-subheader__title ">Leads Lists</h3>
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
                                List Of Attorney
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <table class="table table-bordered data-table table-responsive">
                        <thead>
                            <tr>
                                <th>Send</th>
                                <th>Lead ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Home</th>
                                <th>Sellable</th>
                                <th>Sold</th>
                                <th>Paid</th>
                                <th>Scrubbed</th>
                                <th>Trash</th>
                                <th>Test</th>
                                <th>Cost</th>
                                <th>Revenue</th>
                                <th>Response</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Send</th>
                                <th>Lead ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Home</th>
                                <th>Sellable</th>
                                <th>Sold</th>
                                <th>Paid</th>
                                <th>Scrubbed</th>
                                <th>Trash</th>
                                <th>Test</th>
                                <th>Cost</th>
                                <th>Revenue</th>
                                <th>Response</th>
                                <th>Created On</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!--begin::Modal-->
    <div class="modal fade" id="attorneyData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="changePasswordForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Attorney List</h5>
                        <div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
                            <div class="kt-quick-search__wrapper kt-scroll ps" data-scroll="true" data-mobile-height="200" style="overflow: hidden;">
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table table-bordered " id="example1" class="display" >
                            <thead>
                            <tr>
                                <th >Name</th>
                                <th>Email</th>
                                <th style="text-align:center;">Select</th>
                            </tr>
                            </thead>
                            <tbody id="appendRow">
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th style="text-align:center;">Select</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary sendmail" >Send Mail</button>
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
    <script>
        var attornies = [];
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.lead.index',['userId'=>$userId,'module'=>$module]) }}",
                "order": [[ 0, "asc" ]],

                columns: [
                    {data: 'send', name: 'action', orderable: false, searchable: false},
                    {data: 'leadID', name: 'leadID',defaultContent:'-'},
                    {data: 'first_name', name: 'first_name',defaultContent:'-'},
                    {data: 'last_name', name: 'last_name',defaultContent:'-'},
                    {data: 'phone_home', name: 'phone_home',defaultContent:'-'},
                    {data: 'sellable', name: 'sellable',defaultContent:'-'},
                    {data: 'sold', name: 'sold',defaultContent:'-'},
                    {data: 'paid', name: 'paid',defaultContent:'-'},
                    {data: 'scrubbed', name: 'scrubbed',defaultContent:'-'},
                    {data: 'trash', name: 'trash',defaultContent:'-'},
                    {data: 'isTest', name: 'isTest',defaultContent:'-'},
                    {data: 'CPL', name: 'CPL',defaultContent:'-'},
                    {data: 'RPL', name: 'RPL',defaultContent:'-'},
                    {data: 'lp_post_response', name: 'lp_post_response',defaultContent:'-'},
                    {data: 'created_on_date', name: 'created_on_date',defaultContent:''},

                ]
            });
        });


        $('body').on('click','.btnSendMail',function(){
            $campaign = $(this).attr('data-campaign');
            $leadkey = $(this).attr('data-leadkey');
            $leadid = $(this).attr('data-leadid');

            showLoading();
            $.ajax({
                type: "post",
                url:'{{ route('admin.lead.getAttorney') }}',
                data: {
                    'campaign':$campaign,
                    'leadkey':$leadkey,
                    'leadid':$leadid,
                    '_token' : "{{ csrf_token() }}"
                },
                async: true,
                dataType:"json",
                success: function(data) {
                    if(data.status == true){

                        $('#appendRow').html(data.html);

                        $('#example1').DataTable().destroy();

                        $('#example1').DataTable({
                            "pageLength": 5,
                            stateSave: true
                        });

                        hideLoading();
                        // Show User Profile Model
                        $('#attorneyData').modal('show');
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

        $(document).on('click','.sendmail',function() {

            var attornies = $("input[type='checkbox'][class='attorney']:checked").map(function(){
                return $(this).val();
            }).get();

            $leadkey = $('#leadkey').val();
            $leadid = $('#leadid').val();

            $.ajax({
                type: "POST",
                url:'{{ route('admin.lead.sendMail')}}',
                data: {
                    'attornies':attornies,
                    'leadkey':$leadkey,
                    'leadid':$leadid,
                    '_token' : "{{ csrf_token() }}"
                },
                async: true,
                dataType:"json",
                success: function(data) {
                    // console.log(data);
                    // console.log(data.adminUser.user.roles[0].name);
                    if(data.status == true){
                        swal({
                            title: "Success!",
                            text: "Email sent successfully",
                            type: 'success'
                        });
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
                    url:'{{ route('admin.lead.delete') }}',
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