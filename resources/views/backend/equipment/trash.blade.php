@extends('template.master')

@section('content')

<div class="card">
    <table class="table">
        <tr>
            <th>Serial</th>
            <th>Equipment Name</th>
            <th>Addedd By</th>
            <th>Actions</th>
        </tr>

        @forelse ($equipment as $key=> $equipment)
        <tr>

            <td>{{ ++$key }}</td>
            <td>{{ $equipment->equipment_name }}</td>
            <td>{{ $equipment->added_by }}</td>


            <td> <a href="{{ route('equipment.restore',$equipment->id) }}" class="btn btn-sm btn-success">Restore</a>
                <button class=" btn__remove btn btn-danger btn-sm d-inline-block "> Remove </button>

                <form action="{{ route('equipment.per_delete', $equipment->id) }}" method="POST"
                    class="delete__form d-inline-block">
                    @csrf
                    @method('DELETE')

                </form>


            </td>
            @empty
            <td class="text-center" colspan="4">No Post Yet</td>
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