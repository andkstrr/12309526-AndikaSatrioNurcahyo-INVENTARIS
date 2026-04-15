@props(['title', 'value'])

<div class="card border  rounded-3">
    <div class="card-body d-flex gap-2 align-items-center">
        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3"
            style="width: 60px; height: 60px;">
            <i class="fbi fbi-person fs-3 text-black"></i>
        </div>

        <div>
            <h3 class="fw-semibold fs-4">{{ $value }}</h3>
            <h6 class="text-muted fw-normal fs-sm mb-0">{{ $title }}</h6>
        </div>
    </div>
</div>
