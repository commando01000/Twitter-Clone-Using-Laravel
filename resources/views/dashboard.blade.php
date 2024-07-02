@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
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
            @include('shared.success-message')
            @include('shared.submit-idea')
            <hr>
            <div class="mt-3">
                @include('ideas.idea-cards')
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search')
            @include('shared.follow-suggestion')
        </div>
    </div>
@endsection
