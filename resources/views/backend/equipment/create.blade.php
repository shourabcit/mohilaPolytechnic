@extends('template.master')

@section('content')

<div class="card col-lg-6 mx-auto mt-5 px-0">

    <div class="card-header bg-primary">
        <h2 class="text-light text-center">Add Equipment Item</h2>
    </div>

    <div class="card-body">
        <form action="{{ route('equipment.store') }}" method="POST">
            @csrf

            <input type="text" name="equipment_name" class="form-control mb-3" placeholder="Equipment Name">
            @error('equipment_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="text" name="added_by" class="form-control mb-3" placeholder="Added By" readonly
                value="{{ Auth::user()->name }}">
            @error('')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <button class="form-control btn btn-primary rounded-0 ">Add Equipment Items</button>
        </form>
    </div>

</div>

@endsection