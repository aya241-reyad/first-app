@extends('dashboard.main')
@section('content')


<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container mt-3">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">New Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name">
                                <div class="alert-danger">{{ $errors->first('name') }}</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                                <div class="alert-danger">{{ $errors->first('description') }}</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Select Parent</label>
                                <select name="parent_id" id="defaultSelect" class="form-select">
                                    <option>Default select</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{$parent->id}}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Upload Image</label>
                                <input class="form-control" name="image" type="file" id="formFile">
                                <div class="alert-danger">{{ $errors->first('file') }}</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



@endsection