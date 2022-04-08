@extends('template.master')
@section('content')
<div class="container-fluid">
    <div class="card px-0  mx-auto shadow">
        <div class="card-header bg-primary text-light">
            <h3>All Clearence Requests</h3>
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