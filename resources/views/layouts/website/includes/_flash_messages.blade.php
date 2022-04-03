@if (Session::has('error'))
    <div class="alert alert-danger text-center alert-dismissible fade show mt-2" role="alert">
        {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success text-center alert-dismissible fade show mt-2" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
