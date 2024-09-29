@extends('dashboard.main')
@section('content')

    <form action="{{ url('categories/' . $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('Patch')
        <div class="container mt-3">
            <div class="card mb-4">
                <h5 class="card-header">Edit Category</h5>
                <div class="card-body">


            <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                <div class="alert-danger">{{ $errors->first('name') }}</div>
            </div>
        </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description">{{ old('description', $category->description) }}</textarea>
                    <div class="alert-danger">{{ $errors->first('description') }}</div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Select Parent</label>
                    <select name="parent_id" id="defaultSelect" class="form-select">
                        <option>Default select</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                                {{ $parent->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Upload Image</label>
                    <input class="form-control" name="image" type="file" id="formFile">
                    <div class="alert-danger mb-2">{{ $errors->first('file') }}</div>
                    @if($category->image)
                        <img src="{{ $category->image }}" alt="Image Preview" width="100">
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" class="btn btn-primary ms-5 mb-2">Edit</button>
            </div>
        </div>
                        </div>
            </div>
        </div>


@endsection