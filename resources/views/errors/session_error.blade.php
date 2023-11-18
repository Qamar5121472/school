@if (session()->has('alert'))
    <p class="alert alert-{{ session()->get('alert.type') }}">{{ session()->get('alert.message') }}</p>
@endif

{{-- Request Errors Messages --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
