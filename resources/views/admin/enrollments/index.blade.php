@extends('layouts.dashboardTemplate')

@section('title', 'Enrollments')

@section('content')
    <div class="container">
        <h1 class="my-4">Enrollments</h1>
        <a href="{{ route('admin.enrollments.create') }}" class="btn btn-primary mb-3">Add Enrollment</a>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Semester</th>
                                <th>Subject</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrollments as $enrollment)
                                <tr>
                                    <td>{{ optional($enrollment->student)->name ?? 'N/A' }}</td>
                                    <td>{{ $enrollment->course ?? 'N/A' }}</td>
                                    <td>{{ $enrollment->semester ?? 'N/A' }}</td>
                                    <td>{{ optional($enrollment->subject)->name ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.enrollments.edit', $enrollment) }}" class="btn btn-warning btn-sm">Edit</a>
                                        
                                        @if(!$enrollment->student || !$enrollment->student->grades()->exists())
                                            <form action="{{ route('admin.enrollments.destroy', $enrollment) }}" 
                                                  method="POST" 
                                                  style="display:inline;"
                                                  onsubmit="return confirm('Are you sure you want to delete this enrollment?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection