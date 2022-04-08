@extends('template.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>


<section id="myActivityLog">
    <div class="container">
        <div class="card col-lg-8 mx-auto px-0 mt-5">
            <div class="card-header text-light bg-primary ">
                My Equipment History
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <tr>
                        <th>#</th>
                        <th>Department</th>
                        <th>Lab</th>
                        <th>Equipments</th>
                        <th>Time</th>
                        <th>Current State</th>
                    </tr>

                    @forelse ($activityLog->equipmentProvides as $key=>$provided)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ App\Models\Category::find($provided->department, ['name'])->name }}</td>
                        <td>{{ App\Models\Category::find($provided->lab, ['name'])->name }}</td>
                        <td>
                            @foreach ($provided->equipment as $equipment)
                            <span class="btn btn-sm btn-primary">{{ $equipment->equipment_name }}</span>
                            @endforeach
                        </td>
                        <td>
                            {{ $provided->updated_at->diffForHumans() }}
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    @empty

                    @endforelse



                </table>
            </div>
        </div>
    </div>
</section>
@endsection