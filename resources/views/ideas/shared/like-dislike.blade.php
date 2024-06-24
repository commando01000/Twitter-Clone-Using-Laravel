<div>
    @if (Auth::user()->ideaLiked($idea))
        <form action="{{ route('idea.unlike', $idea->id) }}" method="POST">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                </span> {{ $idea->likes()->count() ? $idea->likes()->count() : 0 }} </button>
        </form>
    @else
        <form action="{{ route('idea.like', $idea->id) }}" method="POST">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                </span> {{ $idea->likes()->count() ? $idea->likes()->count() : 0 }} </button>
        </form>
    @endif
</div>
