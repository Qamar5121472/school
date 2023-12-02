@extends('layout.main')
@section('title', 'New Admission')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admission Detail</h1>
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
                <a href="{{ route('admissionList') }}" type="button" class="btn btn-primary"><button
                        class="btn btn-primary">Back</button></a>
                @include('errors.session_error')
                <!-- SELECT2 EXAMPLE -->
                <table class="table">
                    <tr>
                        <td>Student Name</td>
                        <td>{{ $data->first_name ?? '' }} {{ $data->last_name ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Student Father Name</td>
                        <td>{{ $data->father_name ?? '' }} </td>
                    </tr>
                    <tr>
                        <td>B-Form No</td>
                        <td>{{ $data->std_bform_no ?? '' }} </td>
                    </tr>
                    <tr>
                        <td>Previous School</td>
                        <td>{{ $data->previous_school ?? '' }} </td>
                    </tr>
                    <tr>
                        <td>Father Occupation</td>
                        <td>{{ $data->father_occupation ?? '' }} </td>
                    </tr>
                    <tr>
                        <td>Father Salary</td>
                        <td>{{ $data->father_salary }}</td>
                    </tr>
                    <tr>
                        <td>Father Education</td>
                        <td>{{ $data->father_education }}</td>
                    </tr>
                    <tr>
                        <td>Mother Education</td>
                        <td>{{ $data->mother_education }}</td>
                    </tr>
                    <tr>
                        <td>No. of Subling</td>
                        <td>{{ $data->no_of_sublings }}</td>
                    </tr>
                    <tr>
                        <td>Father ID Card No</td>
                        <td>{{ $data->father_id_card_no ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Phone No</td>
                        <td>{{ $data->contact_number ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Class</td>
                        <td>{{ $data->class ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Mother Name</td>
                        <td>{{ $data->mother_name ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Student Image</td>
                        <td><img src="{{ asset('images/documents/' . $data->doc->picture) }}"
                                style="width: 150px;height:100px" /></td>
                    </tr>
                    <tr>
                        <td>Father ID Card Front Image</td>
                        <td><img src="{{ asset('images/documents/' . $data->doc->father_id_picture_front) }}"
                                style="width: 150px;height:100px" /></td>
                    </tr>
                    <tr>
                        <td>Father ID Card Back Image</td>
                        <td><img src="{{ asset('images/documents/' . $data->doc->father_id_picture_back) }}"
                                style="width: 150px;height:100px" /></td>
                    </tr>
                    <tr>
                        <td>Previous School Certificate</td>
                        <td><img src="{{ asset('images/documents/' . $data->doc->previous_school_certificate_pic) }}"
                                style="width: 150px;height:100px" /></td>
                    </tr>
                    @if ($data->doc->mother_id_card_picture_front)
                        <tr>
                            <td>Mother ID Card Front Image</td>
                            <td><img src="{{ asset('images/documents/' . $data->doc->mother_id_card_picture_front) }}"
                                    style="width: 150px;height:100px" /></td>
                        </tr>
                    @endif
                    @if ($data->doc->mother_id_card_picture_back)
                        <tr>
                            <td>Mother ID Card Front Image</td>
                            <td><img src="{{ asset('images/documents/' . $data->doc->mother_id_card_picture_back) }}"
                                    style="width: 150px;height:100px" /></td>
                        </tr>
                    @endif
                </table>

            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
