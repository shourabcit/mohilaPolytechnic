@extends('template.master')

@section('content')

<div class="card">
    <table class="table">
        <tr>
            <th>Serial</th>
            <th>Equipment Name</th>
            <th>Addedd By</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @forelse ($equipment as $key=> $equipment)
        <tr>

            <td>{{ ++$key }}</td>
            <td>{{ $equipment->equipment_name }}</td>
            <td>{{ App\Models\User::find($equipment->added_by, ['name'])->name }}</td>
            <td>
                <span class="badge {{ $equipment->status == 0 ? 'btn-primary': 'btn-info' }}">{{ $equipment->status == 0
                    ? 'Active' : 'Deactive' }}</span>
            </td>
            <td>
                <form action="{{ route('equipment.edit', $equipment->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('GET')
                    <button class="btn btn-sm btn-success ">Edit</button>
                </form>

                <button class=" btn__remove btn btn-danger btn-sm d-inline-block "> Remove </button>
                <form action="{{ route('equipment.destroy', $equipment->id) }}" method="POST"
                    class="delete__form d-inline-block">
                    @csrf
                    @method('DELETE')

                </form>

                <form action="{{ route('equipment.status', $equipment->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-sm btn-primary {{ $equipment->status == 0 ? 'btn-info':'btn-primary' }}">{{
                        $equipment->status == 0 ? 'Deactive' : 'Active' }}</button>
                </form>

            </td>
            @empty
            <td class="text-center" colspan="5">No Post Yet</td>
            @endforelse

        </tr>


    </table>

</div>

@endsection

@section('custom_js')
<script>
    $('.btn__remove').click(function(){

      

        Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
        $(this).next('.delete__form').submit()

    }
  })
    });

</script>


@endsection