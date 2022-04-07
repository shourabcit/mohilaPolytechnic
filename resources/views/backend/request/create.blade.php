@extends('template.master')
@section('content')
<div class="card px-0 col-lg-8 mx-auto shadow">
    <div class="card-header bg-primary text-light">
        <h3>Request Equipments</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('resquest.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label class="w-100">
                        <span class="text-dark">Select Department</span>
                        <select name="department" class="form-control" id="department">
                            <option disabled selected>Select Department</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="w-100">
                        <span class="d-block d-md-inline">
                            Select Lab
                        </span>
                        <select name="lab" class="form-control select2" id="lab">
                            <option selected disabled>Select Lab</option>
                        </select>
                        @error('lab')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="w-100">
                        <span>Select Equipments</span>
                        <select name="equipments[]" class="select2 form-control" multiple='multiple'>

                            @foreach ($equipments as $key=>$equipment)
                            <option {{ $key==0 ? 'selected' : '' }} value="{{ $equipment->id }}">{{
                                $equipment->equipment_name }}</option>
                            @endforeach
                        </select>
                        @error('equipments')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="col-md-2">
                    <br>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>



<div class="container">
    <div class="card mt-5 px-0 shadow">
        <div class="card-header bg-primary text-light">
            <h3>All Requests</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active btn rounded-0" id="approved" data-bs-toggle="pill"
                        data-bs-target="#approvedRequest" type="button" role="tab" aria-selected="true">Approved
                        Request</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn rounded-0" id="pending" data-bs-toggle="pill"
                        data-bs-target="#pendingRequest" type="button" role="tab" aria-selected="true">Pending
                        Request</button>
                </li>


            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="approvedRequest" role="tabpanel"
                    aria-labelledby="pills-home-tab">
                    <table class="table table-responsive-md">
                        <tr>
                            <th>#</th>
                            <th>Department</th>
                            <th>Lab</th>
                            <th>Requested Items</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($allRequests as $activeRequest)
                        @if ($activeRequest->approved == true)


                        <tr>
                            <td>1</td>
                            <td>{{ App\Models\Category::find($activeRequest->department, ['name'])->name }}</td>
                            <td>{{ App\Models\Category::find($activeRequest->lab, ['name'])->name }}</td>
                            <td>
                                @foreach ($activeRequest->equipment as $equip)
                                <span class="bg-primary btn btn-sm text-capitalize text-light">{{ $equip->equipment_name
                                    }}</span>
                                @endforeach

                            </td>
                            <td>
                                <a href="{{ route('request.confirmation', $activeRequest->id) }}"
                                    class="btn btn-success btn-sm">
                                    {{ $activeRequest->isReturn == 0 ? 'Return' : 'Processing...' }}</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                    <span>{{ $allRequests->links() }}</span>


                </div>
                <div class="tab-pane fade " id="pendingRequest" role="tabpanel" aria-labelledby="pills-home-tab">
                    <table class="table table-responsive-md">
                        <tr>
                            <th>#</th>
                            <th>Department</th>
                            <th>Lab</th>
                            <th>Requested Items</th>

                        </tr>
                        @foreach ($allRequests as $pendingRequest)
                        @if ($pendingRequest->approved == false)


                        <tr>
                            <td>1</td>
                            <td>{{ App\Models\Category::find($pendingRequest->department, ['name'])->name }}</td>
                            <td>{{ App\Models\Category::find($pendingRequest->lab, ['name'])->name }}</td>
                            <td>
                                @foreach ($pendingRequest->equipment as $equip)
                                <span class="bg-primary btn btn-sm text-capitalize text-light">{{ $equip->equipment_name
                                    }}</span>
                                @endforeach

                            </td>

                        </tr>
                        @endif
                        @endforeach
                    </table>
                    <span>{{ $allRequests->links() }}</span>
                </div>

            </div>
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

@section('custom_js')
<script>
    $(function($){
        $('.select2').select2();


        $('#department').change(function(){
        var department = $(this).val();
        var _token = $("input[name='_token']").val();
        $('#lab').find('option').remove()
        
        
        $.ajax({
        url: "{{ route('request.lab') }}",
        type: "POST",
        data: {_token:_token, department:department},
        datatype: 'json',
        success: function (data) {
        
        // $('#batch').html(data);
        data.map((item)=>{
            let option = `
            <option value="`+item.id+`">`+ item.name +`</option>
            `;
            $('#lab').append(option)
        })
        
        },
        
        });
        
        });


    })
</script>
@endsection