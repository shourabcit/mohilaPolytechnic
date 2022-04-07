@extends('template.master')
@section('content')
<div class="container-fluid">
    <div class="card px-0  mx-auto shadow">
        <div class="card-header bg-primary text-light">
            <h3>Requested Equipments</h3>
        </div>
        <div class="card-body">
            <table class="table table-md-responsive">
                <tr>
                    <th>#</th>
                    <th>Student Image</th>
                    <th>Student Name</th>
                    <th>Lab Name</th>
                    <th>Equipments</th>
                    <th>Actions</th>
                </tr>
                @forelse ($equipmentProvide as $key=>$request)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>
                        <img src="{{ App\Models\User::find($request->user_id, ['img'])->img }}" alt=""
                            style="height: 100px">
                    </td>
                    <td>{{ App\Models\User::find($request->user_id, ['name'])->name }}</td>
                    <td>{{ App\Models\Category::find($request->lab, ['name'])->name }}</td>
                    <td>
                        @foreach ($request->equipment as $equipment)
                        <span class="btn btn-sm btn-primary">{{ $equipment->equipment_name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('resquest.edit', $request->id) }}" class="btn btn-success">Approved</a>

                        <form action="{{ route('resquest.destroy', $request->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Denied</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No Request For Now</td>
                </tr>
                @endforelse
            </table>
            <span>{{ $equipmentProvide->links() }}</span>
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