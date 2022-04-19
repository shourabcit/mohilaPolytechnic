@extends('template.master')
@section('content')
<div class="container-fluid">
   @error('test_error')
      <p>{{ $message }}</p>
   @enderror
   <div class="card shadow">
      <div class="card-header bg-primary text-white d-flex flex-wrap justify-content-between align-content-center">
         <h5 class="m-0">Add New Employee</h5>
         <a href="{{ route('admin.index') }}" class="btn btn-success">Back</a>
      </div>
      <div class="card-body">
         <form action="{{ route('admin.update',$admin->id) }}" method="POST" class="row" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-md-6 mb-3">
               <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ $admin->name }}">
               @error('name')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-6 mb-3">
               <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ $admin->email }}">
               @error('email')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-6 mb-3">
               <input type="tel" class="form-control" placeholder="Enter Phone" name="phone" value="{{ $admin->phone }}">
               @error('phone')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-5 mb-3">
               <input class="form-control" type="file" id="formFile" name="img" value="{{ $admin->img }}">
               @error('img')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-1 mb-3">
               <img class="img-fluid border w-75" src="{{asset('storage/image/'.$admin->img) }}" alt="">
            </div>
            <div class="col-md-6 mb-3">
               <select class="form-select" name="role">
                  <option>Select Roles</option>
                  @foreach ($roles as $role)
                  <option class="text-capitalize" {{ ($admin->getRoleNames()->first() == $role->name?'selected':'') }}  value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
               </select>
               @error('role')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-6 mb-3">
               <button type="submit" class="btn btn-success w-100">Update</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection