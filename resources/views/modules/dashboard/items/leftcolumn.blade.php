<div class="col-lg-3">
    <div class="card mb-3">
        <div class="card-body">
            Good Day! Admin
            <h5 class="text-primary fw-bold pb-0 mb-0">{{ Auth::user()->name ?? '' }}</h5>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            Top Artist
            <h2 class="fs-italic" id="top-artist">---</h2>
            <small class="text-muted" >total sales: <text id="top-sales">---</text> albums</small>
        </div>
    </div>
</div>
