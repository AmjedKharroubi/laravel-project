@extends('layouts.app')

@section('title', 'Livestock Management')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Livestock Management</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('animals.create') }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-plus-circle"></i> Register New Animal
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($animals as $animal)
                <tr>
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->type }}</td>
                    <td>{{ $animal->breed ?? 'N/A' }}</td>
                    <td>{{ $animal->age }} years</td>
                    <td>{{ $animal->location }}</td>
                    <td><span class="badge bg-{{ $animal->status === 'active' ? 'success' : 'secondary' }}">{{ ucfirst($animal->status) }}</span></td>
                    <td>
                        <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this animal?')">
                                <i class="bi bi-trash"></i> Remove
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        <form action="{{ route('animals.index') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search animals..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('animals.create') }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-plus-circle"></i> Register New Animal
            </a>
            <a href="{{ route('animals.export') }}" class="btn btn-sm btn-outline-success">
                <i class="bi bi-download"></i> Export to Excel
            </a>
        </div>
    </div>
    
@endsection