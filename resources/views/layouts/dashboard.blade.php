@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Validation Errors:</h5>
                <ul class="mb-0">
                    @foreach($errors->getMessages() as $field => $messages)
                        @foreach($messages as $message)
                            <li><strong>{{ $field }}</strong>: {{ $message }}</li>
                        @endforeach
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Domain</div>

                    <div class="card-body">
                        <form method="POST" action="/domains">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="domain" placeholder="Enter domain" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Domain</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">Your Domains</div>
                    <div class="card-body">
                        @foreach ($domains as $domain)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <form method="POST" action="/domains/{{ $domain->id }}" class="d-flex w-100">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="domain" value="{{ old('domain', $domain->domain) }}" class="form-control me-2">
                                    <button type="submit" class="btn btn-sm btn-warning me-2">Update</button>
                                </form>
                                <form method="POST" action="/domains/{{ $domain->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
