@extends('dashboard.main')
@section('content')

<div class="container mt-4">
    <div class="card p-3"> <!-- Added padding inside the card for spacing -->
        <p>Name: {{ $category->name }}</p>
        <p>Description: {{ $category->description }}</p>
        <p >Image : </p>
          <img src="{{ $category->image }}" alt="{{ $category->name }}" class="img-fluid" style="max-width: 200px;"> <!-- Display the image -->
          <br>
        <p>Parent: {{ $category->parent->name }}</p>
    </div>
</div>

@endsection
