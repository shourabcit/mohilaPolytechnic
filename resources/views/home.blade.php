@extends('template.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>


@auth
<section id="myActivityLog">
    <div class="container-fluid">
        <div class="card col-lg-8 mx-auto px-0 mt-5 shadow">
            <div class="card-header text-light bg-primary d-flex justify-content-between align-items-center">
                <p class="p-0 m-0 h4">My Equipment History</p>
                <a href="{{ route('clearence.getRequest', Auth::user()->id) }}"
                    class="btn btn-lg bg-warning text-dark">Send Out a
                    Clearence Request</a>
            </div>
            @if ($activityLog != null)
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


                    @foreach ($activityLog->equipmentProvides as $key=>$provided)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ App\Models\Category::find($provided->department, ['name'])->name }}</td>
                        <td>{{ App\Models\Category::find($provided->lab, ['name'])->name }}</td>
                        <td>
                            @foreach ($provided->equipment as $equipment)
                            <span class="btn btn-sm btn-primary mb-2">{{ $equipment->equipment_name }}</span>
                            @endforeach
                        </td>
                        <td>
                            {{ $provided->created_at->diffForHumans() }}
                        </td>
                        <td>
                            @if ($provided->isReturn == 0)

                            <a href="{{ route('request.confirmation', $provided->id) }}"
                                class="btn btn-success btn-sm">Return</a>
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

@endauth




{{-- BOOTSTRAP TOAST FOR SUCCESS MSG --}}
@if (session()->has('success'))


<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"
    style="position: absolute; min-width: 300px;max-width:100%;right: 50px; bottom: 80px">
    <div class="toast-header justify-content-between bg-primary text-light">
        <strong class="me-auto">Mohila Polytechnic</strong>

        <button type="button" class="btn-close btn float-end text-light" data-bs-dismiss="toast" aria-label="Close"><i
                class="fas fa-times"></i></button>
    </div>
    <div class="toast-body">{{ session('success') }}</div>
</div>
@endif
{{-- BOOTSTRAP TOAST FOR SUCCESS MSG END --}}
@endsection