@extends('template.master')

@section('content')
   <div class="container-fluid">
      <div class="card shadow mb-5">
         <div class="card-header bg-success d-flex flex-wrap justify-content-between">
            <h4 class="text-capitalize text-white">{{ $admin->name }}</h4>
            <a href="{{ URL::previous() }}" class="btn btn-danger px-3">
               Back
            </a>
         </div>
         <div class="card-body">
            <div class="row m-0">
               <div class="col-md-3 text-center">
                  <img class="img-fluid rounded shadow" src="{{asset('storage/image/'.$admin->img) }}" alt="">
               </div>
               <div class="offset-2 col-md-6">
                  <div class="admin_info">
                     <h2 class="text-dark text-uppercase">{{ $admin->name }}</h2>
                     <p>Email Address : - {{ $admin->email }}</p>
                     <p>Phone Number: - {{ $admin->phone }}</p>
                     <p>Designation: - <span class="text-capitalize">{{ $admin->getRoleNames()->first(); }}</span></p>
               </div>
            </div>
         </div>
      </div>

   </div>
@endsection