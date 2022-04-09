@extends('template.master')
@section('content')

<div class="container-fluid">
    <div class="card shadow px-0">
        <div class="card-header bg-primary text-light d-flex justify-content-between align-items-center">
            <span class="h5">Student Request Informations</span>
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger">Back</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $studentInfo->img }}" alt="{{ $studentInfo->name }}" class="img-fluid">
                </div>
                <div class="col-md-8 border-left px-lg-4">
                    <div class="student_info">
                        <span class="btn btn-success rounded-0 btn-sm float-right">Clear</span>
                        <h2 class="text-dark text-uppercase">{{ $studentInfo->name }} </h2>
                        <p>Email Address : - {{ $studentInfo->email }}</p>
                        <p>Phone Number: - {{ $studentInfo->phone }}</p>
                        <p>Department: - {{ App\Models\Category::find($studentInfo->student->department_id,
                            ['name'])->name
                            }}</p>
                        <p>Board Roll: - {{ $studentInfo->student->board_roll }} | Registration Number: - {{
                            $studentInfo->student->registation_number }}</p>
                        <p></p>
                        <p>Session: - {{ $studentInfo->student->session }}</p>
                        <p>Semister: - {{ $studentInfo->student->semester }}</p>
                        <p>Exam Year: - {{ $studentInfo->student->exam_year }}</p>
                    </div>

                </div>
            </div>
            <hr>

            <section id="myActivityLog">
                <div class="container-fluid">
                    <div class="card  mx-auto px-0 mt-5 shadow">
                        <div
                            class="card-header text-light bg-primary d-flex justify-content-between align-items-center">
                            <p class="p-0 m-0 h4">Equipment History</p>

                        </div>
                        @if ($studentInfo != null)
                        <div class="card-body">
                            <table class="table table-responsive-md table-hover  table-striped text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Lab</th>
                                    <th>Equipments</th>
                                    <th>Time</th>
                                    <th>Current State</th>
                                </tr>


                                @foreach ($studentInfo->equipmentProvides as $key=>$provided)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ App\Models\Category::find($provided->department, ['name'])->name }}</td>
                                    <td>{{ App\Models\Category::find($provided->lab, ['name'])->name }}</td>
                                    <td>
                                        @foreach ($provided->equipment as $equipment)
                                        <span class="btn btn-sm btn-primary mb-2">{{ $equipment->equipment_name
                                            }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $provided->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        @if ($provided->isReturn == 0)

                                        <a class="btn btn-success btn-sm">Return</a>
                                        @elseif ($provided->isReturn == 2)
                                        <span class="btn btn-success btn-sm">Processing</span>
                                        @else
                                        <span>Equipment Has Been Returned</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>

                        </div>
                        @else
                        <p class="text-center pt-3">No Activity Yet !!!</p>
                        @endif
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

@endsection