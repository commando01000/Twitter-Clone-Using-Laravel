@foreach ($ideas as $idea)
    <div class="card mt-2">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex w-100 align-items-center">
                    <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                    <span>
                        <h5 class="card-title mb-0"><a href="#"> Mario
                            </a></h5>
                    </span>
                </div>
                <div class="d-flex flex-row">
                    <!-- eye icon wrapped in a div -->
                    <div>
                        <a href="{{ route('idea.showIdea', $idea->id) }}" class="btn btn-sm"><span
                                class="fas fa-eye"></span></a>
                    </div>
                    <!-- pen icon wrapped in a div -->
                    @if (Auth::user()->id == $idea->user_id)
                        <div>
                            <a href="{{ route('idea.editIdea', $idea->id) }}" class="btn btn-sm mx-2"><span
                                    class="fas fa-pen"></span></a>
                        </div>
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
            <p class="fs-6 fw-light text-muted">
                {{ $idea->idea }}
            </p>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                        </span> {{ $idea->likes }} </a>
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at }} </span>
                </div>
            </div>
            <div>
                @include('ideas.post-comment')
            </div>
        </div>
    </div>
@endforeach
