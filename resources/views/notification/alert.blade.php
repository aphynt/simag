@if ($errors->has('nim'))
<div class="alert alert-danger rounded-pill alert-dismissible fade show">
    {{ $errors->first('nim') }}
    <button type="button" class="btn-close custom-close" data-bs-dismiss="alert" aria-label="Close">
        <i class="bi bi-x"></i>
    </button>
</div>
@endif
