@extends('template.master')
@section('content')
<div class="container-fluid">
   <div class="card">
      <div class="card-header bg-primary text-white d-flex flex-wrap align-items-center justify-content-between">
         <h5>All Employee</h5>
         <a href="{{ route('admin.create') }}" class="btn btn-success">Add New Employee</a>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered table-hover">
               <tr class="text-center">
                  <th style="width: 10%">Sl. No.</th>
                  <th style="width: 50%">Name</th>
                  <th style="width: 20%">Role</th>
                  <th style="width: 20%">Action</th>
               </tr>
               @foreach ($employees as $employee)
               <tr class="text-capitalize">
                  <td class="text-center">{{ $loop->index + 1 }}</td>
                  <td>{{ $employee->name }}</td>
                  <td>{{ $employee->getRoleNames()->first(); }}</td>
                  <td>
                     <a href="#" class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                     </a>
                     <a href="#" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                     </a>
                     <a href="#" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                     </a>
                  </td>
               </tr>
               @endforeach
            </table>
         </div>
      </div>
   </div>
</div>
@endsection