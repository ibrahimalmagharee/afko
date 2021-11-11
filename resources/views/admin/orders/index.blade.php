@extends('layouts.admin')
@section('title')
    الطلبات
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">الطلبات</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/sidebar.main')}} </a></li>
                                <li class="breadcrumb-item active"> الطلبات</li>
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
                                        <table class="table  orders-table">
                                            <thead class="">
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم الأول</th>
                                                <th>الاسم الأخير</th>
                                                <th>البريد الالكتروني</th>
                                                <th>رقم الهاتف</th>
                                                <th>الحالة</th>
                                                <th>الحالة</th>

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

    <div class="modal fade modal-open" id="order-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content width-600">
                <div class="modal-header">
                    <h4 class="modal-title form-section" id="modalheader">
                        <i class="ft-home"></i>بيانات الطلب
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="30%" scope="col">#</th>
                                    <td scope="row" id="id"></td>
                                </tr>
                                <tr>
                                    <th width="30%" scope="col">الاسم الأول</th>
                                    <td scope="row" id="first_name"></td>
                                </tr>
                                <tr>
                                    <th scope="col">الأسم الأخير</th>
                                    <th scope="row" id="last_name"></th>
                                </tr>
                                <tr>
                                    <th scope="col">البريد الالكتروني</th>
                                    <th scope="row" id="email"></th>
                                </tr>
                                <tr>
                                    <th scope="col">الدولة</th>
                                    <th scope="row" id="country"></th>
                                </tr>
                                <tr>
                                    <th scope="col">المدينة</th>
                                    <th scope="row" id="city"></th>
                                </tr>
                                <tr>
                                    <th scope="col">رقم الهاتف</th>
                                    <th scope="row" id="phone"></th>
                                </tr>
                                <tr>
                                    <th scope="col">رقم الهوية</th>
                                    <th scope="row" id="identification_number"></th>
                                </tr>
                                <tr>
                                    <th scope="col">العنوان</th>
                                    <th scope="row" id="address"></th>
                                </tr>

                                <tr>
                                    <th scope="col">الحالة</th>
                                    <th scope="row" id="status" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <input type="radio" name="type" id="pending" value="0"
                                                           class="switchery" data-id=""  data-color="danger"/>
                                                    <label class="card-title ml-1">معلق</label>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <input type="radio" name="type" id="completed" value="1"
                                                           class="switchery" data-id=""  data-color="success"/>
                                                    <label class="card-title ml-1">مكتمل</label>

                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




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
            var ordersTable = $('.orders-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: "{{route("orders")}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                @if(app()-> getLocale() == 'ar')
                language: {"url": "{{asset('assets/admin/js/dataTableArabic.json')}}"},
                @endif

            });

            $(document).on('click', '.viewOrder', function () {
                var id = $(this).data('id');

                $.ajax({
                    type: 'post',
                    url: "{{route('viewOrder')}}",
                    enctype: 'multipart/form-data',
                    data: {
                        'id': id,
                    },
                    // processData: false,
                    // contentType: false,
                    cache: false,
                    dataType: 'json',

                    success: function (data) {
                        $('#modalheader').html('بيانات طلب : ' + data.first_name + data.last_name);
                        $('#order-modal').modal('show');
                        $('#id').html(data.id);
                        $('#first_name').html(data.first_name);
                        $('#last_name').html(data.last_name);
                        $('#email').html(data.email);
                        $('#country').html(data.country);
                        $('#city').html(data.city);
                        $('#phone').html(data.phone);
                        $('#identification_number').html(data.identification_number);
                        $('#address').html(data.address);
                        $("#pending").attr('data-id', data.id);
                        $("#completed").attr('data-id', data.id);
                        if (data.status === 0){
                            $("#pending").prop("checked",true);
                        } else if (data.status === 1) {
                            $("#completed").prop("checked",true);
                        }


                    },


                });

            });

            $('input:radio[name="type"]').change(function(e){
                var id = $(this).data('id');
                var type = $(this).val();

                console.log(id)
                $.ajax({
                    type: 'post',
                    url: "{{route('changeStatus')}}",
                    enctype: 'multipart/form-data',
                    data: {
                        'id': id,
                        'type': type,
                    },
                    // processData: false,
                    // contentType: false,
                    cache: false,
                    dataType: 'json',

                    success: function (data) {
                        toastr.success(data.msg);
                        $('#order-modal').modal('hide');
                        setTimeout(location.reload.bind(location), 2000);

                    },


                });

            });



        });
    </script>
@endsection
