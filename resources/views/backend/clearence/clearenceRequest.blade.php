@extends('template.master')
@section('content')
<div class="container-fluid">
    <div class="card px-0  mx-auto shadow">
        <div class="card-header bg-primary text-light">
            <h3>All Clearence Requests</h3>
        </div>
        <div class="card-body pb-0">
            <table class="table text-center table-md-responsive">
                <tr>
                    <th>#</th>
                    <th>Student Image</th>
                    <th>Student Name</th>
                    <th>Equipments Have</th>
                    <th>Actions</th>
                </tr>
                @forelse ($requests as $request)
                <tr class="{{ $request->user->equipment_provides_count > 0 ? 'bg-danger text-light' : ''}}">
                    <td>{{ $loop->index +1 }}</td>
                    <td>
                        <img src="{{ $request->user->img }}" alt="{{ $request->user->name }}" style="height: 100px">
                    </td>
                    <td>
                        <a href="{{ route('clearence.view', ['id'=>$request->user->id, 'count'=>$request->user->equipment_provides_count]) }}"
                            class="{{ $request->user->equipment_provides_count > 0 ? 'text-light' : 'text-dark' }}">{{
                            $request->user->name }}</a>
                    </td>
                    <td>
                        {{ $request->user->equipment_provides_count }}
                    </td>
                    <td>
                        <a href="{{ route('clearence.view', ['id'=>$request->user->id, 'count'=>$request->user->equipment_provides_count]) }}"
                            class="btn btn-primary btn-sm">View</a>
                        @if (Auth::guard('admin')->user()->getRoleNames()->first() == 'craft instructor')
                        <a href="{{ route('approve.craft', $request->id) }}" class="btn btn-success btn-sm">Approve</a>
                        @elseif (Auth::guard('admin')->user()->getRoleNames()->first() == 'workshop super')
                        <a href="{{ route('approve.worksuper', $request->id) }}"
                            class="btn btn-success btn-sm">Approve</a>
                        @elseif (Auth::guard('admin')->user()->getRoleNames()->first() == 'dept head')
                        <a href="{{ route('approve.depthead', $request->id) }}"
                            class="btn btn-success btn-sm">Approve</a>
                        @elseif (Auth::guard('admin')->user()->getRoleNames()->first() == 'register')
                        <a href="{{ route('approve.register', $request->id) }}"
                            class="btn btn-success btn-sm">Approve</a>
                        @elseif (Auth::guard('admin')->user()->getRoleNames()->first() == 'vice principal')
                        <a href="{{ route('approve.viceprincipal', $request->id) }}"
                            class="btn btn-success btn-sm">Approve</a>
                        @elseif (Auth::guard('admin')->user()->getRoleNames()->first() == 'principal')
                        <a href="{{ route('approve.principal', $request->id) }}"
                            class="btn btn-success btn-sm">Approve</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <p class="pt-2">No Clearence Request Found !</p>
                    </td>
                </tr>
                @endforelse


            </table>

        </div>
    </div>
</div>



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