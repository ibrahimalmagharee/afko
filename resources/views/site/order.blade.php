@extends('layouts.order')

@section('content')
    <!-- Image and text -->


	<section class="ftco-section img bg-hero" style="background-image: url('{{$background->getImage($background->photo) }}');">
        <a class="logo-afco" href="#">
            <img src="{{$logo->getImage($logo->photo) }}" style="width: inherit; height: inherit" class="d-inline-block align-top" alt="ddn">

        </a>
        <div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"> أرسل طلبك من خلال الفورم </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-11">
					<div class="wrapper">
						<div class="row no-gutters justify-content-between">

                            <div class="col-lg-6">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4 stay-contact">ابقى على تواصل</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        Your message was sent, thank you!
                                    </div>
                                    <form  id="orderForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control stay-contact" name="first_name" id="first_name" placeholder="الاسم الأول">
                                                    <span id="first_name_error" class="text-danger float-right mb-1"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control stay-contact" name="last_name" id="last_name" placeholder="الاسم الأخير">
                                                    <span id="last_name_error" class="text-danger float-right mb-1"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control stay-contact" name="email" id="email" placeholder="البريد الالكتروني">
                                                    <span id="email_error" class="text-danger float-right mb-1"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="country" id="country" class="form-control stay-contact">
                                                        <option value="">أختر الدولة</option>
                                                        <option value="المملكة العربية السعودية">المملكة العربية السعودية</option>
                                                        <option value="مملكة البحرين">مملكة البحرين</option>
                                                    </select>
                                                    <span id="country_error" class="text-danger float-right mb-1"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="city" id="city" class="form-control stay-contact">
                                                        <option value="">أختر المدينة</option>
                                                        <option value="الرياض"  class> الرياض</option>
                                                        <option value="مكة المكرمة"  class> مكة المكرمة</option>
                                                        <option value="المدينة المنورة"  class> المدينة المنورة</option>
                                                        <option value="بريدة"  class> بريدة</option>
                                                        <option value="تبوك"  class> تبوك</option>
                                                        <option value="الدمام"  class> الدمام</option>
                                                        <option value="الأحساء"  class> الأحساء</option>
                                                        <option value="القطيف"  class> القطيف</option>
                                                        <option value="خميس مشيط"  class> خميس مشيط</option>
                                                        <option value="الطائف"  class> الطائف</option>
                                                        <option value="نجران"  class> نجران</option>
                                                        <option value="حفر الباطن"  class> حفر الباطن</option>
                                                        <option value="الجبيل"  class> الجبيل</option>
                                                        <option value="ضباء"  class> ضباء</option>
                                                        <option value="الخرج"  class> الخرج</option>
                                                        <option value="الثقبة"  class> الثقبة</option>
                                                        <option value="ينبع"  class> ينبع</option>
                                                        <option value="الخبر"  class> الخبر</option>
                                                        <option value="عرعر"  class> عرعر</option>
                                                        <option value="الحوية"  class> الحوية</option>
                                                        <option value="عنيزة"  class> عنيزة</option>
                                                        <option value="سكاكا"  class> سكاكا</option>
                                                        <option value="جيزان"  class> جيزان</option>
                                                        <option value="القريات"  class> القريات</option>
                                                        <option value="الظهران"  class> الظهران</option>
                                                        <option value="الباحة"  class> الباحة</option>
                                                        <option value="الزلفي"  class> الزلفي</option>
                                                        <option value="الرس"  class> الرس</option>
                                                        <option value="بيش"  class> بيش</option>
                                                        <option value="أحد رفيدة"  class> أحد رفيدة</option>
                                                        <option value="البارق"  class> البارق</option>
                                                        <option value="الحوطة"  class> الحوطة</option>
                                                        <option value="الأفلاج"  class> الأفلاج</option>
                                                        <option value="الثقبة"  class> الثقبة</option>
                                                        <option value="وادي الدواسر"  class> وادي الدواسر</option>
                                                        <option value="بيشة"  class> بيشة</option>
                                                        <option value="سيهات"  class> سيهات</option>
                                                        <option value="شرورة"  class> شرورة</option>
                                                        <option value="بحره"  class> بحره</option>
                                                        <option value="تاروت"  class> تاروت</option>
                                                        <option value="الدوادمي"  class> الدوادمي</option>
                                                        <option value="صبياء"  class> صبياء</option>
                                                        <option value="الفريش"  class> الفريش</option>
                                                        <option value="المزاحمية"  class> المزاحمية</option>
                                                        <option value="النعيرية"  class> النعيرية</option>
                                                        <option value="العيون"  class> العيون</option>
                                                        <option value="القديح"  class> القديح</option>
                                                        <option value="القوز"  class> القوز</option>
                                                        <option value="القويز"  class> القويز</option>
                                                        <option value="القويعية"  class> القويعية</option>
                                                        <option value="القنفذة"  class> القنفذة</option>
                                                        <option value="الرين"  class> الرين</option>
                                                        <option value="السعيرة"  class> السعيرة</option>
                                                        <option value="الصرار"  class> الصرار</option>
                                                        <option value="السيح"  class> السيح</option>
                                                        <option value="السراير"  class> السراير</option>
                                                        <option value="بلجرشي"  class> بلجرشي</option>
                                                        <option value="ضرمة"  class> ضرمة</option>
                                                        <option value="دارين"  class> دارين</option>
                                                        <option value="الأثرية"  class> الأثرية</option>
                                                        <option value="حريملاء"  class> حريملاء</option>
                                                        <option value="حرمة"  class> حرمة</option>
                                                        <option value="العوامية"  class> العوامية</option>
                                                        <option value="جدة"  class> جدة</option>
                                                        <option value="جودة"  class> جودة</option>
                                                        <option value="البدع"  class> البدع</option>
                                                        <option value="قرية العليا"  class> قرية العليا</option>
                                                        <option value="ملهم"  class> ملهم</option>
                                                        <option value="الدلم"  class> الدلم</option>
                                                        <option value="بقيق"  class> بقيق</option>
                                                        <option value="شوية"  class> شوية</option>
                                                        <option value="ثادق"  class> ثادق</option>
                                                        <option value="الباحة"  class> الباحة</option>
                                                        <option value="القرين"  class> القرين</option>
                                                        <option value="عفيف"  class> عفيف</option>
                                                        <option value="الحريق"  class> الحريق</option>
                                                        <option value="المجمعة"  class> المجمعة</option>
                                                        <option value="طبرجل"  class> طبرجل</option>
                                                        <option value="أبو عريش"  class> أبو عريش</option>
                                                        <option value="حائل"  class> حائل</option>
                                                        <option value="أبها"  class> أبها</option>
                                                        <option value="الجوف"  class> الجوف</option>
                                                        <option value="الخفجي"  class> الخفجي</option>
                                                        <option value="أخرى"  class> أخرى</option>
                                                        <option value="مملكة البحرين"  class> مملكة البحرين</option>
                                                    </select>
                                                    <span id="city_error" class="text-danger float-right mb-1"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="tel" class="form-control stay-contact " name="phone" id="phone" placeholder="رقم الهاتف">
                                                    <span id="phone_error" class="text-danger float-right mb-1"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="number" class="form-control stay-contact" name="identification_number" id="identification_number" placeholder="رقم الهوية">
                                                    <span id="identification_number_error" class="text-danger float-right mb-1"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control stay-contact" name="address" id="address" placeholder="العنوان">
                                                    <span id="address_error" class="text-danger float-right mb-1"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" id="sendOrder" class="btn btn-primary float-right">أرسل طلبك</button>
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-5 d-flex align-items-stretch">
                                <div class="info-wrap w-100 p-5">
                                    <h3 class="mb-4 float-right">الطلب</h3>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-4">
                                            <p class="text-right pr-3"><span> العنوان :</span> {{$contact_information->address}}</p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-4">
                                            <p class="text-right pr-3"><span> رقيم الهاتف :</span> <a href="tel://1234567920"> {{$contact_information->phone}}</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-4">
                                            <p class="text-right pr-3"><span> البريد الالكتروني :</span> <a href="mailto:info@yoursite.com"> {{$contact_information->email}}</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-globe"></span>
                                        </div>
                                        <div class="text pl-4">
                                            <p class="text-right pr-3"><span> الموقع الالكتروني </span> <a href="#"> {{$contact_information->website}}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>


						</div>
					</div>
				</div>
			</div>
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="wrapper">
                        <div class="row no-gutters justify-content-center">

                            <div class="col-lg-5  align-items-stretch">
                                <div class="info-wrap w-100 p-5">
                                    <img src="{{asset('assets/front/images/vision1.jpeg')}}" style="width: inherit; height: inherit" class="d-inline-block align-top" alt="ddn">
                                </div>
                            </div>

                            <div class="col-lg-5  align-items-stretch">
                                <div class="info-wrap w-100 p-5">
                                    <img src="{{asset('assets/front/images/vision2.jpeg')}}" style="width: inherit; height: inherit" class="d-inline-block align-top" alt="ddn">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
		</div>
	</section>

@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var input = document.querySelector("#phone");
            window.intlTelInput(input,({
                // options here
            }));

            $(document).ready(function() {
                $('.iti__flag-container').click(function() {
                    var countryCode = $('.iti__selected-flag').attr('title');
                     countryCode = countryCode.replace(/[^0-9]/g,'')
                    $('#phone').val("");
                    $('#phone').val("+"+countryCode+" "+ $('#phone').val());
                });
            });


            //Add Or Update
            $(document).on('click', '#sendOrder', function (e) {
                e.preventDefault();
                var formData = new FormData($('#orderForm')[0]);
                $('#first_name_error').text('');
                $('#last_name_error').text('');
                $('#email_error').text('');
                $('#country_error').text('');
                $('#city_error').text('');
                $('#phone_error').text('');
                $('#identification_number_error').text('');
                $('#address_error').text('');
                $.ajax({
                    type: 'post',
                    url: "{{ route('sendOrder') }}",
                    enctype: 'multipart/form-data',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'json',

                    success: function (data) {
                        if (data.status == true) {
                            swal("تم!", data.msg, "success");
                            $('#orderForm').trigger('reset')
                        } else {

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



        });
    </script>
    @endsection



