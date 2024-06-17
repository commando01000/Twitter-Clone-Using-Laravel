<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                @if ($edit ?? false)
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                            id="" aria-describedby="helpId" placeholder="" />
                    </div>
                    <div>
                    </div>
                @else
                    <div>
                        <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                            </a></h3>
                        <span class="fs-6 text-muted">@mario</span>
                    </div>
                    {{-- <div>
                        <h5 class="card-title mb-0"><a href="#"> 0
                            </a></h5>
                        <span class="fs-6 text-muted">@mario</span>
                    </div> --}}
                @endif
            </div>
            @if (Auth::user()->id == $user->id && !(isset($edit) && $edit))
                <div>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm"> Edit </a>
                </div>
            @else
                <div class="text-end">
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm"> cancel </a>
                </div>
            @endif
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            @if ($edit ?? false)
                <div class="mb-3">
                    <textarea name="idea" class="form-control" id="idea" rows="4"></textarea>
                    @error('idea')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button href="{{ route('users.update', $user->id) }}" class="btn btn-primary btn-sm mb-3"> confirm changes </button>
            @else
                <p class="fs-6 fw-light">
                    {{ $user->bio }}
                </p>
            @endif
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 0 </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->idea()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comments()->count() }} </a>
            </div>
            @if (Auth::user()->id != $user->id)
                <div class="mt-3">
                    <button class="btn btn-primary btn-sm"> Follow </button>
                </div>
            @else
                <div class="mt-3">
                    <button class="btn btn-primary btn-sm"> Followers </button>
                </div>
            @endif
        </div>
    </div>
</div>
