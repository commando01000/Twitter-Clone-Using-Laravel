<div class="card mt-2">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex w-100 align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    @if (!empty($idea->user->image)) src="{{ asset('images/' . $idea->user->image) }}" alt="user's image" @endif>
                <span>
                    <h5 class="card-title mb-0"><a href="#"> {{ Auth::user()->name }}
                        </a></h5>
                </span>
            </div>
            <div class="d-flex flex-row">
                <!-- eye icon wrapped in a div -->
                <div>
                    <a href="{{ route('idea.showIdea', $idea->id) }}" class="btn btn-sm"><span
                            class="fas fa-eye"></span></a>
                </div>
                @if (Auth::user()->id == $idea->user_id)
                    <form action="{{ route('idea.deleteIdea', $idea->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm me-2">
                            X
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($edit ?? false)
            <form action="{{ route('idea.updateIdea', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="idea" class="form-control" id="idea" rows="4">{{ $idea->idea }}</textarea>
                    @error('idea')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Share </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->idea }}
            </p>
        @endif

        <div class="d-flex justify-content-between">
            @include('ideas.shared.like-dislike')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        <div>
            <hr>
            @include('ideas.post-comment')
        </div>
    </div>
</div>
