@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card overflow-hidden">
                    <div class="card-body pt-3">
                        @include('shared.side-navbar')
                    </div>
                    <div class="card-footer text-center py-2">
                        <a class="btn btn-link btn-sm" href="{{ route('profile') }}">View Profile </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                    nulla
                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                    anim
                    id est
                    laborum.</p>
            </div>
            <div class="col-3">
                @include('shared.search')
                @include('shared.follow-suggestion')
            </div>
        </div>
    </div>
@endsection
