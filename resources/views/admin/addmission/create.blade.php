@extends('layout.main')
@section('title', 'New Admission')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>New Admission</h1>
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
                <form action="{{ route('registerStudent') }}" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Student Name</label>
                            <input type="text" class="form-control" id="student_name" name="student_name"
                                placeholder="Student Name" required>
                            @error('student_name')
                                {{ $message }}
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
                            <label for="inputEmail4">Student B-Form No</label>
                            <input type="number" class="form-control" name="studentBFormNo" id="stdBFormNo"
                                placeholder="B-Form Number" required>
                            @error('stdBFormNo')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Student B-Form Image</label>
                            <input type="file" class="form-control" id="bFormImage" name="studenBFormImage"
                                placeholder="Image" required>
                            @error('bFormImage')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father Name</label>
                            <input type="text" name="father_name" class="form-control" id="father_name"
                                placeholder="Father Name" required>
                            @error('father_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">ID Card No(Father)</label>
                            <input type="number" name="fatherIdCardNo" class="form-control" id="fatherIdCardNo"
                                placeholder="ID Card No" required>
                            @error('fatherIdCardNo')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father ID card Image(Front)</label>
                            <input type="file" name="fatherIdCartFrontImage" class="form-control"
                                id="fatherIdCartFrontImage" placeholder="Image" required>
                            @error('fatherIdCartFrontImage')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Father ID card Image(Back)</label>
                            <input type="file" name="fatherIdCartBackImage" class="form-control"
                                id="fatherIdCartBackImage" placeholder="Image" required>
                            @error('fatherIdCartBackImage')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Student Image</label>
                            <input type="file" class="form-control" id="studentImage" name="studentImage"
                                placeholder="Student Image" required>
                            @error('studentImage')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Class</label>
                            <input type="text" name="class" class="form-control" id="class" placeholder="Class"
                                required>
                            @error('class')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Previous School Name</label>
                            <input type="text" name="previousSchoolName" required class="form-control"
                                id="previousSchoolName" placeholder="Previous School Name">
                            @error('previousSchoolName')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Previous School Certificate Image</label>
                            <input type="file" class="form-control" name="previousSchoolCertificateImage" required
                                id="previousSchoolCertificateImage" placeholder="Previous School Certificate Image">
                            @error('previousSchoolCertificateImage')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father Occupation</label>
                            <input type="text" class="form-control" required name="fatherOccupation"
                                id="fatherOccupation" placeholder="Father Occupation">
                            @error('fatherOccupation')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Father Salary</label>
                            <select name="fatherSalary" id="fatherSalary" class="form-control" required>
                                <option value="">Select Father Salary</option>
                                <option value="10kTo15k">10000 to 15000</option>
                                <option value="15kTo20k">15000 to 20000</option>
                                <option value="20kTo25k">20000 to 25000</option>
                                <option value="upTo25k">Up to 25000</option>
                            </select>
                            @error('fatherSalary')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Number of Siblings/Childrens</label>
                            <input type="number" name="numberOfSublings" required class="form-control"
                                id="numberOfSublings" placeholder="No of Siblings">
                            @error('numberOfSublings')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Contact Phone No</label>
                            <input type="number" name="contactNo" required class="form-control" id="contactNo"
                                placeholder="Password">
                            @error('contactNo')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mother ID Card No</label>
                            <input type="number" name="motherIdCartNo" class="form-control" id="motherIdCartNo"
                                placeholder="Mother ID Cart No">
                            @error('motherIdCartNo')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mother ID Card Image(Front)</label>
                            <input type="imagel" name="motherIdCartFrontImage" class="form-control"
                                id="motherIdCartFrontImage" placeholder="Email">
                            @error('motherIdCartFrontImage')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mother ID Card Image(Back)</label>
                            <input type="file" name="motherIdCardBack" class="form-control" id="motherIdCardBack"
                                placeholder="Password">
                            @error('motherIdCardBack')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father Eduction</label>
                            <select name="fatherEducation" id="fatherEducation" class="form-control">
                                <option value="">Select Father Education </option>
                                <option value="matric">Matric</option>
                                <option value="intermidiate">Intermidiate</option>
                                <option value="graduation">Graduation</option>
                                <option value="masters">Masters</option>
                                <option value="phd">PH.D</option>
                            </select>
                            @error('fatherEducation')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mother Eductaion</label>
                            <select name="motherEducation" id="motherEducation" class="form-control">
                                <option value="">Select Mother Education </option>
                                <option value="matric">Matric</option>
                                <option value="intermidiate">Intermidiate</option>
                                <option value="graduation">Graduation</option>
                                <option value="masters">Masters</option>
                                <option value="phd">PH.D</option>
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
