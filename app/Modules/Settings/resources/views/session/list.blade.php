@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@push('style')

@endpush

@section('content')
    <div class="dashboard-content-one">
        <!-- Class Table Area Start Here -->
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>{{$pageTitle}}</h3>
                    </div>

                </div>
                <div class="row gutters-8">
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search" class="form-control" id="search">
                    </div>
                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                    </div>
                    <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    </div>
                    <div class="form-group">
                        <button type="text" class="fw-btn-fill btn-gradient-yellow" data-toggle="modal"
                                data-target="#addModal">Add Session
                        </button>
                    </div>
                </div>
                <div class="">
                    <table class="table display  text-nowrap" id="dataTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Session Name</th>
                            <th>Session Name(Bangla/Arabic)</th>
                            <th>Exam Year</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- class add modla -->
    <div class="modal sign-up-modal fade" id="addModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="item-logo">
                        Add New Session
                    </div>
                    <form class="login-form ajax reset" action="{{ route('settings-session.store') }}"
                          method="post"
                          data-handler="commonResponse">
                        @csrf
                        <div class="row gutters-15">
                            <div class="form-group col-12">
                                <label>Session Name *</label>
                                <input type="text" placeholder="" class="form-control" name="session_name">
                            </div>
                            <div class="form-group col-12">
                                <label>Session Name(Bangla/Arabic) *</label>
                                <input type="text" placeholder="" class="form-control" name="session_name_bangla">
                            </div>
                            <div class="form-group col-12">
                                <label>Exam Year *</label>
                                <input type="text" placeholder="" class="form-control" name="exam_year">
                            </div>

                            <div class="form-group col-12">
                                <label>Is Used On Online Admission Form *</label>
                                <select class="select2" name="is_used">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <button type="submit" class="login-btn">Save</button>
                                <button type="button" class="login-btn" data-dismiss="modal"
                                        aria-label="Close">Close
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- class edit modla -->
    <div class="modal sign-up-modal fade" id="editModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        var dataTable
        $(document).on('input', '#search', function () {
            dataTable.search($(this).val()).draw();
        });

        dataTable = $("#dataTable").DataTable({
            pageLength: 10,
            ordering: false,
            serverSide: true,
            processing: true,
            responsive: true,
            searching: false,
            paging: true,
            language: {
                paginate: {
                    previous: "Previous",
                    next: "Next",
                },
                searchPlaceholder: "Search event",
                search: "<span class='searchIcon'><i class='fa-solid fa-magnifying-glass'></i></span>",
            },
            ajax: "{{route('settings-session.list')}}",
            dom: '<>tr<"tableBottom"<"row align-items-center"<"col-sm-6"<"tableInfo"i>><"col-sm-6"<"tablePagi"p>>>><"clear">',
            columns: [
                {"data": 'DT_RowIndex', "name": 'DT_RowIndex', searchable: false},
                {"data": "session_name", "name": "tbl_session.session_name"},
                {"data": "session_name_bangla", "name": "tbl_session.session_name_bangla"},
                {"data": "exam_year", "name": "tbl_session.exam_year"},
                {"data": "action"},
            ]

        });
    </script>
@endpush

