@extends('dashboard.main')
@section('content')

 <div class="container mt-3">
    <div class="card">
        <div>
            <a href="{{route('categories.create')}}" class="btn btn-success mr-3 mt-2">Create</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="border-0">Name</th>
                    <th class="border-0">Description</th>
                    <th class="border-0">Image</th>
                    <th class="border-0">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="border-0">
                        <td class="border-0"> {{ $category->name }} </td>
                        <td class="border-0"> {{ $category->description }} </td>

                        <td class="border-0">
                        @if($category->image)
                        <img src="{{ $category->image }}" alt="Image Preview" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                        @else
                        "not found"
                        @endif
                        </td>
                        <td class="border-0">
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-small btn-secondary">
                                <i class="fa fa-eye"></i> <!-- Font Awesome Eye Icon -->
                            </a>

                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-small btn-primary">
                            <i class="fa fa-pencil-alt"></i>
                            </a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal" data-id="{{ $category->id }}" onclick="setCategoryId(this)">
                            <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->


<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteCategoryForm" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <h5 class="text-center">Are you sure you want to delete this category?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
                </form>
        </div>
    </div>
</div>

<script>
    function setCategoryId(button) {
    const categoryId = button.getAttribute('data-id');
    const form = document.getElementById('deleteCategoryForm');
    form.action = `/categories/${categoryId}`; // Adjust the URL to match your route
}
</script>

@endsection
