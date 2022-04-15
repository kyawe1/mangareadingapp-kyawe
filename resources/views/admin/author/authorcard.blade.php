<div>
    <div class="card">
        <div class="card-header">
            <h4>{{ $author->user->name }}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $author->image }}" alt="{{ $author->name }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <p>{{ $author->user->email }}</p>
                </div>
            </div>
            <div class='text-decoration-none'>
                <a href="{{route('admin.author-accept',['user'=>$author->user->id])}}">
                    <button class="btn btn-primary">
                        Confirm
                    </button>
                </a>
                <a href="{{route('admin.author-delete',['waitingList'=>$author->id])}}">
                    <button class="btn btn-warning">
                        Reject
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>