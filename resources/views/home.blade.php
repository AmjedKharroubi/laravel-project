@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Farm Management Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Livestock</h5>
                    <p class="card-text display-4">{{ $stats['animals'] }}</p>
                    <a href="{{ route('animals.index') }}" class="text-white">View all</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Inventory Items</h5>
                    <p class="card-text display-4">{{ $stats['inventory'] }}</p>
                    <a href="{{ route('inventory.index') }}" class="text-white">View all</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Reports</h5>
                    <p class="card-text display-4">{{ $stats['reports'] }}</p>
                    <a href="{{ route('reports.index') }}" class="text-white">View all</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    Financial Summary
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h6>Income</h6>
                            <p class="h4 text-success">${{ number_format($stats['income'], 2) }}</p>
                        </div>
                        <div class="col-6">
                            <h6>Expenses</h6>
                            <p class="h4 text-danger">${{ number_format($stats['expenses'], 2) }}</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6>Net Balance</h6>
                        <p class="h3 {{ ($stats['income'] - $stats['expenses']) >= 0 ? 'text-success' : 'text-danger' }}">
                            ${{ number_format($stats['income'] - $stats['expenses'], 2) }}
                        </p>
                    </div>
                    <a href="{{ route('financial.index') }}" class="btn btn-primary mt-2">View Financial Records</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Quick Actions
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('animals.create') }}" class="btn btn-outline-primary">
                            <i class="bi bi-plus-circle"></i> Add New Animal
                        </a>
                        <a href="{{ route('inventory.create') }}" class="btn btn-outline-success">
                            <i class="bi bi-plus-circle"></i> Add Inventory Item
                        </a>
                        <a href="{{ route('financial.create') }}" class="btn btn-outline-info">
                            <i class="bi bi-plus-circle"></i> Record Financial Transaction
                        </a>
                        @can('manage-users')
                        <a href="{{ route('users.create') }}" class="btn btn-outline-dark">
                            <i class="bi bi-plus-circle"></i> Add New User
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection