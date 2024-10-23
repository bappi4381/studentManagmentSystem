@extends('admin.adminHome')

@section('content')
<div class="container mt-5">
    <h2>All Students</h2>

    <!-- Success/Error Messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Display Students -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->section ? $student->section->name : 'N/A' }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                        <form action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
