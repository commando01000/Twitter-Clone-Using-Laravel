@extends('layout.layout')

@section('title', 'Ideas | Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.side-navbar')
        </div>
        <div class="col-9">
            <h1>Ideas</h1>

            <div class="table-responsive mt-3">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">username</th>
                            <th scope="col">Idea</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ideas as $idea)
                            <tr class="">
                                <td scope="row">{{ $idea->id }}</td>
                                <td>{{ $idea->user->name }}</td>
                                <td>{{ $idea->idea }}</td>
                                <td>{{ $idea->created_at->toDateString() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $ideas->links() }}
            </div>
        </div>
    </div>
@endsection
