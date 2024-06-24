<form action="{{ route('idea.comment.insertComment', $idea->id) }}" method="post">
    @csrf
    <div>
        <div class="mb-3">
            <textarea name="comment" class="fs-6 form-control" rows="1">
            </textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
        <hr>
    </div>
</form>
@forelse ($idea->comments as $item)
    <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            @if (!empty($idea->user->image)) src="{{ asset('images/' . $idea->user->image) }}" alt="user's image" @endif>
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">{{ $item->user->name }}
                </h6>
                <small class="fs-6 fw-light text-muted"> {{ $item->created_at }}</small>
            </div>
            <p class="fs-6 mt-3 fw-light">
                {{ $item->comment }}
            </p>
        </div>
    </div>
@empty
    <p class="text-center"> No comments yet </p>
@endforelse
