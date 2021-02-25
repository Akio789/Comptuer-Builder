  @extends('layouts.main')

  @section('content')
  <h1>Edit your component here</h1>
  <form action="{{ route('components.update', ['component' => $component->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div>
          <label for="name">Name</label>
          <input name="name" id="name" type="text" value="{{ $component->name }}">
      </div>
      <div>
          <label for="brand">Brand</label>
          <input name="brand" id="brand" type="text" value="{{ $component->brand }}">
      </div>
      <div>
          <label for="model">Model</label>
          <input name="model" id="model" type="text" value="{{ $component->model }}">
      </div>
      <div>
          <label for="price">Price</label>
          <input name="price" id="price" type="number" value="{{ $component->price }}">
      </div>
      <div>
          <input type="submit" value="Edit">
      </div>
  </form>
  @endsection