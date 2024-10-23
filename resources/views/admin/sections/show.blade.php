@extends('admin.adminHome')
@section('content')
    
        <div class=" mt-5">
            <h2 class="mb-4">Create a New Section</h2>
        
            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
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
        
            <!-- Create Section Form -->
            <form action="{{ route('sections.create') }}" method="POST">
                @csrf
        
                <div class="mb-3">
                    <label for="sectionName" class="form-label">Section Name</label>
                    <input type="text" class="form-control" id="sectionName" name="name" placeholder="Enter section name" required>
                </div>
        
                <div class="mb-3">
                    <label for="studentLimit" class="form-label">Student Limit</label>
                    <input type="number" class="form-control" id="studentLimit" name="student_limit" placeholder="Enter student limit" required>
                </div>
        
                <button type="submit" class="btn btn-primary">Create Section</button>
            </form>
        
            <h2 class="mt-5">All Sections</h2>
        
            <!-- Display Sections -->
            <table class="table table-bordered mt-3">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Section Name</th>
                    <th>Student Limit</th>
                    <th>Current Students</th>
                    <th>Status</th>
                    <th></th>
                    

                </tr>
                </thead>
                <tbody>
                @foreach ($sections as $section)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $section->name }}</td>
                        <td>{{ $section->student_limit }}</td>
                        <td>{{ $section->students_count }}</td>
                        <td>
                            @if ($section->students_count < $section->student_limit)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Full</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('students.create', ['sectionId' => $section->id]) }}" class="btn btn-sm btn-primary">
                                Add Student
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    
@endsection