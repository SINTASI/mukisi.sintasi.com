{{-- @if (session('success'))
    <div class="ms-3 me-3 alert alert-small rounded-s shadow-xl bg-green-dark" role="alert">
        <span><i class="fa fa-check color-white"></i></span>
        <strong class="color-white">{{ session('success') }}</strong>
        <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert"
            aria-label="Close">×</button>
    </div>
@endif --}}


@if (session('error'))
    <div class="ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-red-dark" role="alert">
        <span><i class="fa fa-times color-white"></i></span>
        <strong class="color-white">{{ session('error') }}</strong>
        <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert"
            aria-label="Close">×</button>
    </div>
@endif
