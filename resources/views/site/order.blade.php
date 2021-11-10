@extends('layouts.order')

@section('content')

	<section class="ftco-section img bg-hero" style="background-image: url('{{asset('assets/front/images/bg_1.jpg')}}');">
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
                            <div class="col-lg-5">
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
                                                    <input type="tel" class="form-control stay-contact" name="phone" id="phone" placeholder="رقم الهاتف">
                                                    <span id="phone_error" class="text-danger float-right mb-1"></span>
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
							<div class="col-lg-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-5">
									<h3 class="mb-4 float-right">الطلب</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Website</span> <a href="#">yoursite.com</a></p>
					          </div>
				          </div>
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
                $('#name_error').text('');
                $('#email_error').text('');
                $('#phone_error').text('');
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



