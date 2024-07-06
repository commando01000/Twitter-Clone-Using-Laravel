@auth
    <h4> @lang ('statements.share_your_ideas') </h4>
    <div class="row">
        <form action="{{ route('idea.insertIdea') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="idea" class="form-control" id="idea" rows="4"></textarea>
                @error('idea')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth
@guest
    {{-- <h4 class="text-center text-white">@lang ('login.please', [], 'ar') @lang ('login.login', [], 'ar')
        @lang ('login.share_ideas', [], 'ar') </h4> --}}
    {{-- <h4 class="text-center text-white">@lang ('login.please') @lang ('login.login')
        @lang ('login.share_ideas') </h4> --}}
    <h4>
        {{ trans('statements.please') }}
    </h4>
@endguest
