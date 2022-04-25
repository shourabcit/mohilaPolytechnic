@extends('template.master')
@section('content')
<div class="modal" id="editModal" style="background: rgba(0, 0, 0, 0.45)">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Department</h5>
                <button type="button" class="close btn__close btn btn-sm " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control mb-3" name="name" value="" placeholder="Category Name">

                    <select name="parent_id" class="select2 mb-3 edit_modal_select w-100 form-control">
                        <option value="">No Parent Department</option>
                        @forelse ($categories as $key=>$category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        <option disabled>No Department Found</option>
                        @endforelse

                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn__close">Close</button>
                <button type="button" type="submit" class="btn btn-primary" id="saveBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="card shadow col-xl-8 mx-auto">
    <div class="card-header">
        <h2 class="text-primary">Add Department</h2>
        <hr>
        <div class="card-body px-0 px-lg-3">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="row ">
                    <div class="col-xl-4 mb-3">
                        <input type="text" name="name" placeholder="Department Name | Computer" class="form-control">
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-xl-4 mb-3">
                        <select name="parent_category" class="select2">
                            <option disabled selected>Select Parent Department</option>
                            @forelse ($categories as $key=>$category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                            <option disabled>No Department Found</option>
                            @endforelse

                        </select>
                        @error('parent_category')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-xl-4">
                        <button class="btn btn-primary" name="submit">
                            <i class="bi bi-bookmarks-fill"></i> Create Department
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="card mt-5  mx-auto" id="allCategory">
    <div class="card-header">
        <h2 class="heading">
            All Departments
        </h2>
        <hr>
        <div class="card-body" id="allCategory">
            <div class="accordion " id="accordionExample">
                @forelse ($parentCategories as $key=>$category)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button
                            class="accordion-button d-flex justify-content-between text-uppercase w-100 p-3 border-0"
                            style="font-size: 20px" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $key }}">
                            {{ $category->name }}
                            <div>
                                <form action="" class="d-inline  ms-auto">
                                    <span class="btn btn-sm btn-primary category_edit " data-id="{{ $category->id
                                    }}">
                                        Edit
                                    </span>
                                </form>
                                <span class="ms-2 btn btn-sm btn-danger category_delete"
                                    data-id="{{ $category->id }}">Delete</span>
                                <form action="{{ route('category.destroy', $category->id) }}"
                                    class="d-inline categoryDelete" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </button>
                    </h2>
                    @if (count($category->subcategories) > 0)
                    <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        {{-- recursive Category blade Component --}}
                        <x-category :category="$category" />
                        {{--x recursive Category blade Component x --}}

                    </div>
                    @endif


                </div>
                @empty

                @endforelse
                <br>

                <span class="mt-5">
                    {{ $parentCategories->links() }}
                </span>
            </div>
        </div>
    </div>
</div>

@endsection


@section('custom_js')
<!-- JavaScript Bundle with Popper -->

<script>
    $(document).ready(function(){
        $('.select2').select2();


        // category Edit button modal
        $('.category_edit').on('click', editCategory);

        let EditModal = $('#editModal');

        $('button#category_edit').on('click', editCategory);


        // Category Edit Function

        $('#saveBtn').click(function(){
        $('#editModal form').submit();
        });
        function editCategory(){

            EditModal.fadeToggle();

            let itemId = $(this).attr('data-id');

            event.preventDefault();

            var _token = $("input[name='_token']").val();
            let path =  "{{ route('category.edit', ':id') }}";
            let newPath = path.replace(':id', itemId);
            $.ajax({
                url: newPath,


            type: "GET",
            data: {_token:_token, itemId:itemId},
            datatype: 'json',
            success: function (data) {

                console.log(data);
            $("#editModal form input[name='name']").val(data[0].name);
            let parent = data[0].parent_id == null ? 'No Parent Category' : data[1].name;

            $('.select2-selection__rendered').text(parent);
            let update = "{{ route('category.update', ':itemId') }}";
            let updateRoute = update.replace(':itemId', data[0].id);
            $('#editModal form').attr('action', updateRoute);
            },

            });




        }


        // Category Model Close
        $('.btn__close').on('click', function(){
            EditModal.fadeOut();
        });

        // Delete Category
        $('.category_delete').click(function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d95e36',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {

                $(this).siblings('.categoryDelete').submit();
           //$('.categoryDelete').submit();

            }
            })
        });

        });
</script>


@if (session()->has('success'))
<script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'New Category Has Been Created',
    showConfirmButton: false,
    timer: 1500
    })
</script>
@endif
@endsection