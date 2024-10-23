@extends('admin.adminHome')
@section('content')
<div class="container mt-5">
    <h2>Add Student to Section: {{ $section->name }}</h2>

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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Add Student Form -->
    <form action="{{ route('students.store', $section->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="studentName" class="form-label">Student Name</label>
            <input type="text" class="form-control" id="studentName" name="name" placeholder="Enter student name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Student</button>
    </form>
</div>  
@endsection