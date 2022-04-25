@extends('template.master')
@section('content')
<div class="container-fluid">
   @error('test_error')
      <p>{{ $message }}</p>
   @enderror
   <div class="card shadow">
      <div class="card-header bg-primary text-white d-flex flex-wrap justify-content-between align-content-center">
         <h5 class="m-0">Add New Employee</h5>
         <a href="{{ route('admin.index') }}" class="btn btn-success">View All Employee</a>
      </div>
      <div class="card-body">
         <form action="{{ route('admin.store') }}" method="POST" class="row" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 mb-3">
               <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ old('name') }}">
               @error('name')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-6 mb-3">
               <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
               @error('email')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-6 mb-3">
               <input type="tel" class="form-control" placeholder="Enter Phone" name="phone" value="{{ old('phone') }}">
               @error('phone')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-6 mb-3">
               <input class="form-control" type="file" id="formFile" name="img" value="{{ old('img') }}">
               @error('img')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-6 mb-3">
               <input type="password" class="form-control" placeholder="Enter Password" name="password" value="{{ old('password') }}">
               @error('password')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-6 mb-3">
               <input type="password" class="form-control" placeholder="Enter Password Again" name="password_confirmation" value="{{ old('password_confirmation') }}">
               @error('password_confirmation')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-6 mb-3">
               <select class="form-select" name="role">
                  <option selected>Select Roles</option>
                  @foreach ($roles as $role)
                  <option class="text-capitalize" value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
               </select>
               @error('role')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-md-6 mb-3">
               <button type="submit" class="btn btn-success w-100">Register</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection