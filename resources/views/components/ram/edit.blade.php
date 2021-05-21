@extends('layouts.main')

@section('content')

<div class="container">
  <div class="d-flex justify-content-center">
      <div class="card h-100">
          <div class="card-header">
              <h3>Edit RAM</h3>
              <div class="d-flex justify-content-end social_icon">
              </div>
          </div>
          <div class="card-body">
          <form action="{{ route('components.update', ['component' => $component->id, 'type' => 'ram']) }}" method="POST">
              @csrf
              @method('PUT')
                  <div class="input-group form-group">
                      <select name="socket" id="socket" class="form-control">
                          <option value="" disabled hidden>Select a socket type</option>
                          @foreach ($sockets as $socket)
                          @if ($component->socket == $socket)
                              <option value="{{ $socket }}" selected>{{ $socket }}</option>
                          @else
                              <option value="{{ $socket }}">{{ $socket }}</option>
                          @endif
                          @endforeach
                      </select>
                  </div>
                  <div class="input-group form-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-microchip"></i></span>
                      </div>
                      <input name="name" id="name" type="text" class="form-control" placeholder="name" value="{{ $component->name }}">
                  </div>
                  <div class="input-group form-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-building"></i></span>
                      </div>
                      <input name="brand" id="brand" type="text" class="form-control" placeholder="brand" value="{{ $component->brand }}">
                  </div>
                  <div class="input-group form-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                      </div>
                      <input name="model" id="model" type="text" class="form-control" placeholder="model" value="{{ $component->model }}">
                  </div>
                  <div class="input-group form-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                      </div>
                      <input name="price" id="price" type="number" class="form-control" placeholder="price" value="{{ $component->price }}">
                  </div>
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-microchip"></i></span>
                    </div>
                    <input name="capacity" id="capacity" type="number" class="form-control" placeholder="memory (GB)" value="{{ $component->capacity }}">
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-microchip"></i></span>
                    </div>
                    <input name="speed" id="speed" type="number" class="form-control" placeholder="speed" value="{{ $component->speed }}">
                </div>
                  <div class="form-group">
                      <input type="submit" value="Edit" class="btn float-right login_btn">
                  </div>
              </form>
          </div>
          <div class="card-footer">
          </div>
      </div>
  </div>
</div>
@endsection