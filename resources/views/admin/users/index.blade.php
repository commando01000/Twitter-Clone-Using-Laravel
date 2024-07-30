@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.side-navbar')
        </div>
        <div class="col-9">
            <h1>Users</h1>

            <div class="table-responsive mt-3">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Joined At</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="">
                                <td scope="row">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->toDateString() }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>

        </div>
    </div>
@endsection
