@extends('template.master')
@section('content')

<div class="container-fluid">
    <div class="card shadow px-0">
        <div class="card-header bg-primary text-light d-flex justify-content-between align-items-center">
            <span class="h5">Student Informations</span>
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger">Back</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $studentInfo->img }}" alt="{{ $studentInfo->name }}" class="img-fluid">
                </div>
                <div class="col-md-8 border-left px-lg-4">
                    <div class="student_info">

                        <h2 class="text-dark text-uppercase">{{ $studentInfo->name }} </h2>
                        <p>Email Address : - {{ $studentInfo->email }}</p>
                        <p>Phone Number: - {{ $studentInfo->phone }}</p>
                        @if ($studentInfo->student)

                        <p>Department: - {{ $studentInfo->student->department_id }}
                        </p>
                        <p>Board Roll: - {{ $studentInfo->student->board_roll }} | Registration Number: - {{
                            $studentInfo->student->registation_number }}</p>
                        <p></p>
                        <p>Session: - {{ $studentInfo->student->session }}</p>
                        <p>Semister: - {{ $studentInfo->student->semester }}</p>
                        <p>Exam Year: - {{ $studentInfo->student->exam_year }}</p>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('student.approval', $studentInfo->id) }}" class="btn btn-sm btn-success">Approve</a>
                    </div>

                </div>
            </div>
            <hr>


        </div>

    </div>
</div>

@endsection