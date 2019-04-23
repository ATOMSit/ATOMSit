<div class="alert alert-{{$class}} fade show" role="alert">
    <div class="alert-icon">
        <i class="flaticon-warning"></i>
    </div>
    <div class="alert-text">
        {{ session("$class") }}
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                <i class="la la-close"></i>
            </span>
        </button>
    </div>
</div>