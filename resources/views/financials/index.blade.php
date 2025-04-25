@extends('layouts.app')

@section('title', 'Financial Records')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Financial Records</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('financial.create') }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-plus-circle"></i> Add New Record
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Recorded By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                <tr>
                    <td>{{ $record->date->format('Y-m-d') }}</td>
                    <td>
                        <span class="badge bg-{{ $record->type === 'income' ? 'success' : 'danger' }}">
                            {{ ucfirst($record->type) }}
                        </span>
                    </td>
                    <td>{{ $record->category }}</td>
                    <td class="{{ $record->type === 'income' ? 'text-success' : 'text-danger' }}">
                        ${{ number_format($record->amount, 2) }}
                    </td>
                    <td>{{ Str::limit($record->description, 50) }}</td>
                    <td>{{ $record->user->name }}</td>
                    <td>
                        <a href="{{ route('financial.show', $record->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="{{ route('financial.edit', $record->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route
