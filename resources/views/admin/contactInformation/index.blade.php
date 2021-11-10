@extends('layouts.admin')
@section('title')
    معلومات التواصل
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">معلومات التواصل </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/sidebar.main')}} </a></li>
                                <li class="breadcrumb-item active"> معلومات التواصل</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="btn btn-outline-success float-left" href="javascript:void(0)"
                                       id="addNewContactInformation"><i class="la la-plus"></i> اضافة معلومات التواصل</a>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show" id="viewAboutUs">
                                    <div class="card-body card-dashboard table-responsive">
                                        <table class="table ContactInformation-table">
                                            <thead>
                                            <tr>
                                                <th>العنوان</th>
                                                <th>رقم الهاتف</th>
                                                <th>البريد الالكتروني</th>
                                                <th>الموقع الالكتروني</th>
                                                <th>الاجراءات</th>

                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <div class="justify-content-center d-flex"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Begin Form Add Main Category -->

    <div class="modal fade modal-open" id="ContactInformation-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content width-800">
                <div class="modal-header">
                    <h4 class="modal-title form-section" id="modalheader">
                        <i class="ft-home"></i>   اضافة معلومات التواصل
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" id="contactInformationForm" enctype="multipart/form-data">
                                @csrf

                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">العنوان</label>
                                                <input type="text" name="address" id="address" value="{{old('address')}}" class="form-control">
                                                <span id="address_error" class="text-danger"></span>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">رقم الهاتف</label>
                                                <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control">
                                                <span id="phone_error" class="text-danger"></span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">البريد الالكتروني</label>
                                                <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">الموقع الالكتروني</label>
                                                <input type="text" name="website" id="website" value="{{old('website')}}" class="form-control">
                                                <span id="website_error" class="text-danger"></span>
                                            </div>

                                        </div>
                                    </div>




                                </div>

                                <div class="form-actions">
                                    <input type="hidden" name="action" id="action" value="Add">
                                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal"><i
                                            class="la la-undo"></i> تراجع
                                    </button>
                                    <button class="btn btn-primary" id="addContactInformation"><i class="la la-save"></i> حفظ</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Form Add Main Category -->



    <!-- // Basic form layout section end -->



    {{-- Confirmation Modal --}}
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">تأكيد عملية الحذف</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="delete_modal_form">
                    @csrf
                    {{method_field('delete')}}

                    <div class="modal-body">
                        <input type="hidden" id="delete_language">
                        <h5>هل أنت متأكد من حذف معلومة التواصل </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel">الغاء</button>
                        <button type="submit" class="btn btn-danger" id="delete">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Confirmation Modal --}}


@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //Show Table
            var contactInformationTable = $('.ContactInformation-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route("index.contact_information")}}",
                columns: [
                    {data: 'address', name: 'address'},
                    {data: 'phone', name: 'phone'},
                    {data: 'email', name: 'email'},
                    {data: 'website', name: 'website'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                @if(app()-> getLocale() == 'ar')
                language: {"url": "{{asset('assets/admin/js/dataTableArabic.json')}}"},
                @endif
            });


            //Show Form
            $('#addNewContactInformation').click(function () {
                $('#contactInformationForm').trigger('reset');
                $('#ContactInformation-modal').modal('show');

            });


            //Add Or Update
            $(document).on('click', '#addContactInformation', function (e) {
                e.preventDefault();

                var formData = new FormData($('#contactInformationForm')[0]);
                $('#address_error').text('');
                $('#phone_error').text('');
                $('#email_error').text('');
                $('#website_error').text('');
                $.ajax({
                    type: 'post',
                    url: "{{ route('save.contact_information') }}",
                    enctype: 'multipart/form-data',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'json',

                    success: function (data) {
                        if (data.status == true) {
                            toastr.success(data.msg);
                            $('#contactInformationForm').trigger('reset');
                            $('#ContactInformation-modal').modal('hide');
                            contactInformationTable.draw();
                        } else {
                            toastr.error(data.msg);
                            $('#contactInformationForm').trigger('reset');
                            $('#ContactInformation-modal').modal('hide');
                            contactInformationTable.draw();
                        }

                    },

                    error: function (reject) {
                        console.log('Error: not added', reject);
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function (key, val) {
                            $("#" + key + "_error").text(val[0]);


                        });

                    }

                });
            });

            //Delete

            $('body').on('click', '.deleteContactInformation', function () {
                var id = $(this).data('id');
                $('#delete-modal').modal('show');

                $('#delete').click(function (e) {
                    e.preventDefault();
                    $.ajax({

                        url: "delete/" + id,

                        success: function (data) {
                            console.log('success:', data);
                            if (data.status == true) {
                                $('#delete-modal').modal('hide');
                                toastr.warning(data.msg);
                                contactInformationTable.draw();
                            }

                        }

                    });
                });

                $('#cancel').click(function () {
                    $('#delete-modal').modal('hide');
                });
            });

        });
    </script>
@endsection
