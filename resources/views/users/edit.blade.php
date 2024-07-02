@extends('layout.layout')

@section('title', 'Edit Profile')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card overflow-hidden">
                <div class="card-body pt-3">
                    @include('shared.side-navbar')
                </div>
                <div class="card-footer text-center py-2">
                    <a class="btn btn-link btn-sm" href="#">View Profile </a>
                </div>
            </div>
        </div>
        <div class="col-6">
            @include('shared.success-message')
            @include('shared.submit-idea')
            <hr>
            <div class="mt-3">
                @include('users.user-card')
                <hr>
            </div>
        </div>
        <div class="col-3">
            @include('shared.search')
            @include('shared.follow-suggestion')
        </div>
    </div>
@endsection
