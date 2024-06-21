<div class="card">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-1 rounded-circle"
                        @if (!empty($user->image)) src="{{ asset('images/' . $user->image) }}" alt="user's image" @endif>
                    @if ($edit ?? false)
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                id="" aria-describedby="helpId" placeholder="" />
                            @error('name')
                                <p class="text-danger pt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                        </div>
                    @else
                        <div>
                            <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                                </a></h3>
                            <span class="fs-6 text-muted">{{ '@' . $user->name }}</span>
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
                    @if (Auth::user()->id == $user->id && !(isset($edit) && $edit))
                        <div class="text-end">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm"> cancel </a>
                        </div>
                    @endif
                    @if (Auth::user()->id == $user->id && (isset($edit) && $edit))
                        <div class="text-end">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm"> cancel </a>
                        </div>
                    @endif
                @endif
            </div>
            @if ($edit ?? false)
                <div class="mb-3">
                    <label for="" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="image" id="image" value="{{ $user->image }}"
                        aria-describedby="fileHelpId" />
                    @error('image')
                        <p class="text-danger pt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endif
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                @if ($edit ?? false)
                    <div class="mb-3">
                        <textarea name="bio" class="form-control" id="bio" rows="4">{{ $user->bio }}</textarea>
                        @error('bio')
                            <p class="text-danger pt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-3"> confirm
                        changes </button>
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
            </div>
        </div>
    </form>
    @if (Auth::user()->id != $user->id)
        <div class="mt-3">
            @if (!Auth::user()->isFollowing($user))
                <form action="{{ route('users.follow', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary ms-3 mb-3 btn-sm"> Follow </button>
                </form>
            @else
                <form action="{{ route('users.unfollow', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary ms-3 mb-3 btn-sm"> Unfollow </button>
                </form>
            @endif
        </div>
    @endif
</div>
