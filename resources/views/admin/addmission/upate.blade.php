@extends('layout.main')
@section('title', 'Update Admission')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Admission</h1>
                    </div>
                    {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Advanced Form</li>
                    </ol>
                </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('errors.session_error')
                <!-- SELECT2 EXAMPLE -->
                <form action="{{ route('updateAddmissionInfo') }}" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}" />
                            <label for="inputEmail4">Student Name</label>
                            <input type="text" class="form-control" id="student_name"
                                value="{{ $data->first_name ?? '' }}{{ $data->last_name ?? '' }}" name="student_name"
                                placeholder="Student Name" required>
                            @error('student_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Nationality</label>
                            <input type="text" name="natinality" value="{{ $data->natinality ?? '' }}"
                                class="form-control" id="natinality" placeholder="Nationality" required>
                            @error('natinality')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Student B-Form No</label>
                            <input type="number" class="form-control" value="{{ $data->std_bform_no ?? '' }}"
                                name="studentBFormNo" id="stdBFormNo" placeholder="B-Form Number" required>
                            @error('stdBFormNo')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Student B-Form Image</label>

                            <input type="file" class="form-control" id="bFormImage" name="studenBFormImage"
                                placeholder="Image" value="{{ $data->doc->std_bform_picture }}">
                            @error('bFormImage')
                                {{ $message }}
                            @enderror
                            @if (isset($data->doc->std_bform_picture))
                                <img src="{{ asset('images/documents/' . $data->doc->std_bform_picture ?? '') }}"
                                    width="100" height="100" />
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father Name</label>
                            <input type="text" name="father_name" value="{{ $data->father_name ?? '' }}"
                                class="form-control" id="father_name" placeholder="Father Name" required>
                            @error('father_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">ID Card No(Father)</label>
                            <input type="number" name="fatherIdCardNo" value="{{ $data->father_id_card_no ?? '' }}"
                                class="form-control" id="fatherIdCardNo" placeholder="ID Card No" required>
                            @error('fatherIdCardNo')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father ID card Image(Front)</label>
                            <input type="file" name="fatherIdCartFrontImage" class="form-control"
                                id="fatherIdCartFrontImage" placeholder="Image"
                                value="{{ $data->doc->father_id_picture_front ?? '' }}">
                            @error('fatherIdCartFrontImage')
                                {{ $message }}
                            @enderror
                            @if (isset($data->doc->father_id_picture_front))
                                <img src="{{ asset('images/documents/' . $data->doc->father_id_picture_front ?? '') }}"
                                    width="100" height="100" />
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Father ID card Image(Back)</label>
                            <input type="file" name="fatherIdCartBackImage" class="form-control"
                                id="fatherIdCartBackImage" placeholder="Image"
                                value="{{ $data->doc->father_id_picture_back ?? '' }}">
                            @error('fatherIdCartBackImage')
                                {{ $message }}
                            @enderror
                            @if (isset($data->doc->father_id_picture_back))
                                <img src="{{ asset('images/documents/' . $data->doc->father_id_picture_back ?? '') }}"
                                    width="100" height="100" />
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Student Image</label>
                            <input type="file" class="form-control" id="studentImage" name="studentImage"
                                placeholder="Student Image" value="{{ $data->doc->picture ?? '' }}">
                            @error('studentImage')
                                {{ $message }}
                            @enderror
                            @if (isset($data->doc->picture))
                                <img src="{{ asset('images/documents/' . $data->doc->picture ?? '') }}" width="100"
                                    height="100" />
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Class</label>
                            <input type="text" name="class" class="form-control" id="class"
                                placeholder="Class" value="{{ $data->class ?? '' }}" required>
                            @error('class')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Previous School Name</label>
                            <input type="text" name="previousSchoolName" required class="form-control"
                                id="previousSchoolName" value="{{ $data->previous_school ?? '' }}"
                                placeholder="Previous School Name">
                            @error('previousSchoolName')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Previous School Certificate Image</label>
                            <input type="file" class="form-control" name="previousSchoolCertificateImage"
                                id="previousSchoolCertificateImage"
                                value="{{ $data->doc->previous_school_certificate_pic ?? '' }}"
                                placeholder="Previous School Certificate Image">
                            @error('previousSchoolCertificateImage')
                                {{ $message }}
                            @enderror
                            @if (isset($data->doc->previous_school_certificate_pic))
                                <img src="{{ asset('images/documents/' . $data->doc->previous_school_certificate_pic ?? '') }}"
                                    width="100" height="100" />
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father Occupation</label>
                            <input type="text" class="form-control" value="{{ $data->father_occupation ?? '' }}"
                                required name="fatherOccupation" id="fatherOccupation" placeholder="Father Occupation">
                            @error('fatherOccupation')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Father Salary</label>
                            <select name="fatherSalary" id="fatherSalary" class="form-control" required>
                                <option value="">Select Father Salary</option>
                                <option @if ($data->father_salary == '10kTo15k') selected @endif value="10kTo15k">10000 to 15000
                                </option>
                                <option @if ($data->father_salary == '15kTo20k') selected @endif value="15kTo20k">15000 to 20000
                                </option>
                                <option @if ($data->father_salary == '20kTo25k') selected @endif value="20kTo25k">20000 to 25000
                                </option>
                                <option @if ($data->father_salary == 'upTo25k') selected @endif value="upTo25k">Up to 25000
                                </option>
                            </select>

                            @error('fatherSalary')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Number of Siblings/Childrens</label>
                            <input type="number" name="numberOfSublings" value="{{ $data->no_of_sublings ?? '' }}"
                                required class="form-control" id="numberOfSublings" placeholder="No of Siblings">
                            @error('numberOfSublings')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Contact Phone No</label>
                            <input type="number" name="contactNo" value="{{ $data->contact_number ?? '' }}" required
                                class="form-control" id="contactNo" placeholder="Password">
                            @error('contactNo')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mother ID Card No</label>
                            <input type="number" name="motherIdCartNo" value="{{ $data->mother_id_card_number ?? '' }}"
                                class="form-control" id="motherIdCartNo" placeholder="Mother ID Cart No">
                            @error('motherIdCartNo')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mother ID Card Image(Front)</label>
                            <input type="file" name="motherIdCartFrontImage" class="form-control"
                                id="motherIdCartFrontImage" placeholder="Picture"
                                value="{{ $data->doc->mother_id_card_picture_front ?? '' }}">
                            @error('motherIdCartFrontImage')
                                {{ $message }}
                            @enderror
                            @if (isset($data->doc->mother_id_card_picture_front))
                                <img src="{{ asset('images/documents/' . $data->doc->mother_id_card_picture_front ?? '') }}"
                                    width="100" height="100" />
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mother ID Card Image(Back)</label>
                            <input type="file" name="motherIdCardBack" class="form-control" id="motherIdCardBack"
                                placeholder="piture" value="{{ $data->doc->mother_id_card_picture_back ?? '' }}">
                            @error('motherIdCardBack')
                                {{ $message }}
                            @enderror
                            @if (isset($data->doc->mother_id_card_picture_back))
                                <img src="{{ asset('images/documents/' . $data->doc->mother_id_card_picture_back ?? '') }}"
                                    width="100" height="100" />
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="documentId" value="{{ $data->document_id ?? '' }}" />


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father Eduction</label>
                            <select name="fatherEducation" id="fatherEducation" class="form-control">
                                <option value="">Select Father Education </option>
                                <option @if ($data->father_education == 'matric') selected @endif value="matric">Matric</option>
                                <option @if ($data->father_education == 'intermidiate') selected @endif value="intermidiate">
                                    Intermidiate</option>
                                <option @if ($data->father_education == 'graduation') selected @endif value="graduation">Graduation
                                </option>
                                <option @if ($data->father_education == 'masters') selected @endif value="masters">Masters</option>
                                <option @if ($data->father_education == 'phd') selected @endif value="phd">PH.D</option>
                            </select>
                            @error('fatherEducation')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mother Eductaion</label>
                            <select name="motherEducation" id="motherEducation" class="form-control">
                                <option value="">Select Mother Education </option>
                                <option @if ($data->mother_education == 'matric') selected @endif value="matric">Matric</option>
                                <option @if ($data->mother_education == 'intermidiate') selected @endif value="intermidiate">
                                    Intermidiate</option>
                                <option @if ($data->mother_education == 'graduation') selected @endif value="graduation">Graduation
                                </option>
                                <option @if ($data->mother_education == 'masters') selected @endif value="masters">Masters
                                </option>
                                <option @if ($data->mother_education == 'phd') selected @endif value="phd">PH.D</option>
                            </select>
                            @error('motherEducation')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Form Submit</button>
                </form>

            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
