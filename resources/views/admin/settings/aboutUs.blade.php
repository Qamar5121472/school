@extends('layout.main')
@section('title', 'Admission List')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>New Admission</h1> --}}
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
                            About Us
                        </div>


                    </div>
                    <div class="card-body">

                        <form action="{{ route('aboutUsSaveData') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea id="editor" name="aboutUs" rows="10" cols="10">{{ $about->aboutUs ?? '' }}</textarea>
                            <button type="submit" class="btn btn-info mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
@endsection
