<div class="accordion-body">

    @foreach ($category->subcategories as $key=>$childCategory)


    <div>
        <div class="shadow rounded p-3 d-flex justify-content-between align-items-center" id="category_items">
            <div class="info">
                <p class="mb-0 text-capitalize">{{ $childCategory->name }}</p>
            </div>
            <div>
                <form action="" class="d-inline  ">
                    <button class="btn btn-sm btn-primary" id="category_edit"
                        data-id="{{ $childCategory->id }}">Edit</button>
                </form>
                <button class="btn btn-sm btn-danger category_delete" data-id="{{ $childCategory->id }}">Delete</button>
                <form action="{{ route('category.destroy', $childCategory->id) }}" class="d-inline categoryDelete"
                    method="POST">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
        <x-category :category="$childCategory" />
    </div>


    @endforeach

</div>