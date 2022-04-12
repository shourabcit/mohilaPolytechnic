@extends('template.master')

@section('content')

<div class="card col-lg-6 mx-auto mt-5 px-0">

    <div class="card-header bg-success">
        <h2 class="text-light text-center">Edit Equipment Item</h2>
    </div>

    <div class="card-body">
        <form action="{{ route('equipment.update',$equipment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="equipment_name" class="form-control mb-3" placeholder="Equipment Name"
                value="{{ $equipment->equipment_name }}">
            @error('equipment_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="text" name="added_by" class="form-control mb-3" placeholder="Updated By" readonly
                value="{{ Auth::guard('admin')->user()->name }}">
            @error('')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <button class="form-control btn btn-success">Update Equipment Items</button>
        </form>
    </div>

</div>

@endsection