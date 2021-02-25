  
@extends('layouts.main')

@section('content')
<h1>Create your component here</h1>
<form action="{{ route('components.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="text">
    </div>
    <div>
        <label for="brand">Brand</label>
        <input name="brand" id="brand" type="text">
    </div>
    <div>
        <label for="model">Model</label>
        <input name="model" id="model" type="text">
    </div>
    <div>
        <label for="price">Price</label>
        <input name="price" id="price" type="number">
    </div>
    <div>
        <input type="submit" value="Store">
    </div>
</form>
@endsection