@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Users</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Plan</th><th>Registered</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->plan->plan_name ?? '—' }}</td>
                    <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
