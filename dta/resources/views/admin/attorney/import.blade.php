
@extends('layouts.admin.admin_main')

@section('title')
    Import Attorneys
@endsection

@section('css')
    <style>
        .m-form.m-form--fit .m-form__content, .m-form.m-form--fit .m-form__group, .m-form.m-form--fit .m-form__heading{
            padding-top: 10px;
        }
        .error{
            color: #ff273d;
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
                    <h3 class="m-subheader__title ">Import Attorneys</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('admin.dashboard.index',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{ route('admin.attorney.import',['userId'=>$userId,'module'=>$module]) }}" class="m-nav__link">
                                <span class="m-nav__link-text">Manage Attorney</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Import Attorney</span>
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
                                        Import Attorney
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a href="{{route('admin.attorney.index',['userId'=>$userId,'module'=>$module])}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
                        <form id="importAttorneyForm" class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" method="post" action="{{route('admin.attorney.importExcel',['userId'=>$userId,'module'=>$module])}}">
                            {{csrf_field()}}
                            <div class="m-portlet__body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group m-form__group @if ($errors->has('title_name')) has-danger @endif">
                                            <label>Import File</label>
                                            <div></div>
                                            <div class="custom-file">
                                                <input type="file" name="import_file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <div class="error">Max Upload record 5000 per File</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('admin.attorney.index',['userId'=>$userId,'module'=>$module]) }}" class="btn btn-secondary">Cancel</a>
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
        $("#importAttorneyForm").validate({
            rules: {
                import_file: {
                    required: true,
                },
            }
        });
        var Select2 = {
            init: function () {
                $("#m_select2_1, #m_select2_1_validate").select2({placeholder: "Select a state"}), $("#m_select2_2, #m_select2_2_validate").select2({placeholder: "Select a state"}), $("#m_select2_3, #m_select2_3_validate").select2({placeholder: "Select a state"}), $("#m_select2_4").select2({
                    placeholder: "Select Role",
                    allowClear: !0
                }), $("#m_select2_5").select2({
                    placeholder: "Select a value",
                    data: [{id: 0, text: "Enhancement"}, {id: 1, text: "Bug"}, {id: 2, text: "Duplicate"}, {
                        id: 3,
                        text: "Invalid"
                    }, {id: 4, text: "Wontfix"}]
                }), $("#m_select2_6").select2({
                    placeholder: "Search for git repositories",
                    allowClear: !0,
                    ajax: {
                        url: "https://api.github.com/search/repositories", dataType: "json", delay: 250, data: function (e) {
                            return {q: e.term, page: e.page}
                        }, processResults: function (e, t) {
                            return t.page = t.page || 1, {results: e.items, pagination: {more: 30 * t.page < e.total_count}}
                        }, cache: !0
                    },
                    escapeMarkup: function (e) {
                        return e
                    },
                    minimumInputLength: 1,
                    templateResult: function (e) {
                        if (e.loading) return e.text;
                        var t = "<div class='select2-result-repository clearfix'><div class='select2-result-repository__meta'><div class='select2-result-repository__title'>" + e.full_name + "</div>";
                        return e.description && (t += "<div class='select2-result-repository__description'>" + e.description + "</div>"), t += "<div class='select2-result-repository__statistics'><div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + e.forks_count + " Forks</div><div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + e.stargazers_count + " Stars</div><div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + e.watchers_count + " Watchers</div></div></div></div>"
                    },
                    templateSelection: function (e) {
                        return e.full_name || e.text
                    }
                }), $("#m_select2_12_1, #m_select2_12_2, #m_select2_12_3, #m_select2_12_4").select2({placeholder: "Select an option"}), $("#m_select2_7").select2({placeholder: "Select an option"}), $("#m_select2_8").select2({placeholder: "Select an option"}), $("#m_select2_9").select2({
                    placeholder: "Select an option",
                    maximumSelectionLength: 2
                }), $("#m_select2_10").select2({
                    placeholder: "Select an option",
                    minimumResultsForSearch: 1 / 0
                }), $("#m_select2_11").select2({
                    placeholder: "Add a tag",
                    tags: !0
                }), $(".m-select2-general").select2({placeholder: "Select an option"}), $("#m_select2_modal").on("shown.bs.modal", function () {
                    $("#m_select2_1_modal").select2({placeholder: "Select a state"}), $("#m_select2_2_modal").select2({placeholder: "Select a state"}), $("#m_select2_3_modal").select2({placeholder: "Select a state"}), $("#m_select2_4_modal").select2({
                        placeholder: "Select a state",
                        allowClear: !0
                    })
                })
            }
        };
        jQuery(document).ready(function () {
            Select2.init()
        });
    </script>
@endsection

