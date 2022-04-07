@extends('template.master')
@section('content')
<div class="container-fluid">
    <div class="card px-0  mx-auto shadow">
        <div class="card-header bg-primary text-light">
            <h3>Return Equipments</h3>
        </div>
        <div class="card-body">
            <table class="table text-center table-md-responsive">
                <tr>
                    <th>#</th>
                    <th>Student Image</th>
                    <th>Student Name</th>
                    <th>Lab Name</th>
                    <th>Equipments</th>
                    <th>Actions</th>
                </tr>
                @forelse ($returnEquipmentRequest as $key=>$returnItem)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td><img style="height:100px" src="{{ App\Models\User::find($returnItem->user_id, ['img'])->img }}"
                            alt=""></td>
                    <td>{{ App\Models\User::find($returnItem->user_id, ['name'])->name }}</td>
                    <td>{{ App\Models\Category::find($returnItem->lab, ['name'])->name }}</td>
                    <td>
                        @foreach ($returnItem->equipment as $equipment)
                        <span class="btn btn-primary btn-sm">
                            {{ $equipment->equipment_name }}
                        </span>
                        @endforeach
                    </td>
                    <td>
                        <a href="#" class="btn btn-success">Approved</a>
                    </td>
                </tr>
                @empty

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