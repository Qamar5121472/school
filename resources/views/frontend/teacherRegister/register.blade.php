@extends('frontend.layout.navbar')
@section('title', 'Teacher')
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('frontEndAssets/images/bg_2.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Join as Teacher</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Join as Teacher <i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftc-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-2 py-2 mb-2">
                    <div class="col" style="text-align: center">
                        <h2>Join Us Form</h2>
                    </div>
                    <hr>
                    @include('errors.session_error')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aris-hidden="true">x</span></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('teacherRegistration') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="teacher_name" name="teacher_name"
                                    placeholder="Teacher Name" required>
                                @error('teacher_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Nationality</label>
                                <input type="text" name="natinality" class="form-control" id="natinality"
                                    placeholder="Nationality" required>
                                @error('natinality')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">CNIC No</label>
                                <input type="number" class="form-control" name="cnicNo" id="cnicNo"
                                    placeholder="B-Form Number" required>
                                @error('cnicNo')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">CNIC Front Image</label>
                                <input type="file" class="form-control" id="cnicFrontImage" name="cnciFrontImage"
                                    placeholder="Image" required>
                                @error('cnicFrontImage')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPassword4">CNIC Back Image</label>
                                <input type="file" class="form-control" id="cnicBackImage" name="cnciBackImage"
                                    placeholder="Image" required>
                                @error('cnicBackImage')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Father/Husband Name</label>
                                <input type="text" name="father_name" class="form-control" id="father_name"
                                    placeholder="Father Name" required>
                                @error('father_name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">ID Card No(Father/Husband)</label>
                                <input type="number" name="fatherIdCardNo" class="form-control" id="fatherIdCardNo"
                                    placeholder="ID Card No" required>
                                @error('fatherIdCardNo')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Father/Husband ID card Image(Front)</label>
                                <input type="file" name="fatherIdCartFrontImage" class="form-control"
                                    id="fatherIdCartFrontImage" placeholder="Image" required>
                                @error('fatherIdCartFrontImage')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Father/Husband ID card Image(Back)</label>
                                <input type="file" name="fatherIdCartBackImage" class="form-control"
                                    id="fatherIdCartBackImage" placeholder="Image" required>
                                @error('fatherIdCartBackImage')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Qulifiaction</label>
                                <input type="text" class="form-control" id="qualification" name="qualification"
                                    placeholder="Qualification" required>
                                @error('qualification')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">FSc Certificate/Result Card</label>
                                <input type="file" name="fscResultCard" class="form-control" id="fscResultCard"
                                    placeholder="Class (In NO) Example: 1" required>
                                @error('fscResultCard')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">BA Certificate</label>
                                <input type="file" name="bsCertificate" required class="form-control"
                                    id="bsCertificate" placeholder="">
                                @error('bsCertificate')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Contact Phone No</label>
                                <input type="number" name="contactNo" required class="form-control" id="contactNo"
                                    placeholder="Phone No">
                                @error('contactNo')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>



                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Any Other type of Training</label>
                                <select name="anyOtherTraning" id="fatherEducation" class="form-control">
                                    <option value="">Select Any Traning subject </option>
                                    <option value="matric">B.ed</option>
                                    <option value="intermidiate">M.ed</option>
                                    <option value="graduation">Non</option>

                                </select>
                                @error('anyOtherTraning')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Experiance of Teaching</label>
                                <select name="experiance" id="motherEducation" class="form-control">
                                    <option value="">Select Experiance </option>
                                    <option value="matric">1-3 Year</option>
                                    <option value="intermidiate">3-6 Year</option>
                                    <option value="graduation">6-9 Year</option>
                                    <option value="masters"> 9-above Year </option>
                                    {{-- <option value="phd">PH.D</option> --}}
                                </select>
                                @error('motherEducation')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Form Submit</button>
                    </form>
                </div>

                {{-- <div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
                    <div class="text px-4 ftco-animate">
                        <h2 class="mb-4">Welcome to Kiddos Learning School</h2>
                        <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                            would have been rewritten a thousand times and everything that was left from its origin would be
                            the word.</p>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
                            ocean. A small river named Duden flows by their place and supplies it with the necessary
                            regelialia. And if she hasn’t been rewritten, then they are still using her.</p>
                        <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p>
                    </div>
                </div>
                <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
                    <h2 class="mb-4">What We Offer</h2>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would
                        have been rewritten a thousand times and everything that was left from its origin would be the word.
                    </p>
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-security"></span></div>
                                <div class="text">
                                    <h3>Safety First</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-reading"></span></div>
                                <div class="text">
                                    <h3>Regular Classes</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-diploma"></span></div>
                                <div class="text">
                                    <h3>Certified Teachers</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-education"></span></div>
                                <div class="text">
                                    <h3>Sufficient Classrooms</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-jigsaw"></span></div>
                                <div class="text">
                                    <h3>Creative Lessons</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-kids"></span></div>
                                <div class="text">
                                    <h3>Sports Facilities</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>


@endsection
