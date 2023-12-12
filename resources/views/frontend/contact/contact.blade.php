@extends('frontend.layout.navbar')
@section('title', 'Contact Us')
@section('content')
    @push('style')
        <!-- Include Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @endpush
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('frontEndAssets/images/bg_2.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Contact Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Address</h3>
                        <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Contact Number</h3>
                        <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Email Address</h3>
                        <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Website</h3>
                        <p><a href="#">yoursite.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
        <div class="container">
            @include('errors.session_error')
            <div class="row d-flex align-items-stretch no-gutters">
                <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
                    <form id="contactForm" action="{{ route('contactUs') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea id="" name="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <!-- Include Toastr JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize the form validation
            $("#contactForm").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    subject: "required",
                    message: "required"
                },
                messages: {
                    name: "Please enter your name",
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    subject: "Please enter the subject",
                    message: "Please enter your message"
                },
                errorPlacement: function(error, element) {
                    // Display errors using Toastr
                    toastr.error(error.text());
                },
                submitHandler: function(form) {
                    form.submit();
                    // Handle the form submission (you can use AJAX to submit the form)
                    // For example: $(form).ajaxSubmit();
                    toastr.success("Form submitted successfully!");
                }
            });
        });
    </script>
@endpush
