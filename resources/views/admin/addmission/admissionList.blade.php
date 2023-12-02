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
                            Admission List
                        </div>


                    </div>
                    <div class="card-body">
                        <a href="{{ route('newAddmission') }}" type="button" class="btn btn-primary"><button
                                class="btn btn-primary">New Admission</button></a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Phone</th>
                                    <th>B-Form No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admission as $list)
                                    <tr>
                                        <td>{{ $list->id ?? '' }}</td>
                                        <td>{{ $list->first_name ?? '' }} {{ $list->last_name ?? '' }}</td>
                                        <td>{{ $list->father_name ?? '' }}</td>
                                        <td>{{ $list->contact_number ?? '' }}</td>
                                        <td>{{ $list->std_bform_no ?? '' }}</td>
                                        <td style="display: flex;justify-content:space-around">
                                            <a target="_blank" href="{{ route('admissionDetail', ['id' => $list->id]) }}"
                                                class=""><span class="btn-sm fa fa-eye"></span></a>
                                            <a href="{{ route('editAddmissionInfo', ['id' => $list->id]) }}"
                                                class=""><i class="fa fa-edit"></i></a>
                                            <form method="POST" action="{{ route('deleteAddmissionInfo', $list->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class=" confirm-button"><i
                                                        class="fa fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
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
