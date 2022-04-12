@extends('template.master')
@section('content')

<div class="card px-0 shadow  mx-auto">
    <div class="card-header bg-primary text-light">
        <h3>All Student Requests</h3>
    </div>
    <div class="card-body px-0 pt-0">
        <div class="search d-flex justify-content-end my-2">
            <form action="{{ route('student.search') }}" method="GET">
                @csrf
                <div class="d-flex px-3">
                    <input type="text" placeholder="Search Here" class="form-control rounded-0" name="search">
                    <button class="btn btn-sm btn-primary rounded-0">Submit</button>
                </div>
            </form>
        </div>
        <table class="table table-responsive-md table-hover table-striped text-center">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Student's Name</th>
                <th>Department</th>
                <th>Student Roll</th>
                <th>Student Registration</th>
                <th>Actions</th>
            </tr>
            @forelse ($unApproveStudents as $student)
            <tr>
                <td>{{ $loop->index +1 }}</td>
                <td><img src="{{ $student->img }}" alt="{{ $student->name }}" style="height: 100px"></td>
                <td>{{ $student->name }}</td>
                <td>{{ @$student->student->department_id }}</td>
                <td>{{ @$student->student->board_roll }}</td>
                <td>{{ @$student->student->registation_number }}</td>
                <td>
                    <a href="{{ route('student.show', $student->id) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route('student.approval', $student->id) }}" class="btn btn-sm btn-success">Approve</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No Student Requests</td>
            </tr>
            @endforelse
        </table>
        <span>{{ $unApproveStudents->appends($_GET)->links() }}</span>
    </div>

</div>

@endsection