@extends('layout.main')
@section('title', 'Admission List')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Admin Setting
                        </div>


                    </div>
                    <div class="card-body">

                        <form class="form-group" action="{{ route('saveSettingChanges') }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $data->email ?? '' }}" placeholder="Email" required>
                                @error('student_name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Phone No</label>
                                <input type="number" name="phone_no" class="form-control" id="phone_no"
                                    placeholder="Phone No" value="{{ $data->phone_no ?? '' }}" required>
                                @error('natinality')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">School Name</label>
                                <input type="text" name="schoolName" class="form-control" id="schoolName"
                                    placeholder="School Name" value="{{ $data->name ?? '' }}" required>
                                @error('schoolName')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Logo</label>
                                <input type="file" name="logo" class="form-control" value="{{ $data->logo ?? '' }}"
                                    id="logo" placeholder="logo">
                                @error('natinality')
                                    {{ $message }}
                                @enderror
                                @if (isset($data->logo))
                                    <img style="margin-top: 2%;height:200px;width:200px"
                                        src="{{ asset('logo/' . $data->logo ?? '') }}" />
                                @endif
                            </div>
                            <button type="submit" class="btn btn-info mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    @push('script')
        <script type="text/javascript">
            $('.confirm-button').click(function(event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal({
                        title: `Are you sure you want to delete this row?`,
                        text: "It will gone forevert",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        </script>
    @endpush
@endsection
