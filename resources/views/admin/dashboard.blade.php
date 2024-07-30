@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.side-navbar')
        </div>
        <div class="col-9">
            <h1>Admin Dashboard</h1>
        </div>
    </div>
@endsection
