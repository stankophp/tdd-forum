<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-header">{{ $reply->owner->name }} said {{ $reply->created_at->diffForHumans() }} ago</div>
        <div class="card">
            <div class="card-body">
                <div class="body">{{ $reply->body }}</div>
            </div>
        </div>
    </div>
</div>