<div class="row">
    <div class="col-md-{{isset($col) ? $col : 12}}">
        <div class="card">
            <div class="card-body">
                {{$slot}}
            </div>
        </div>
    </div>
</div>