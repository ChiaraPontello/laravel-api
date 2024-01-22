@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Edit {{$technology->name}}</h1>
        <form action="{{ route('admin.technologies.update', $technology->slug)}}"  method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                required maxlength="200" minlength="3" value="{{old('name', $technology->name)}}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


    <div class="mt-3">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>
    </form>
    </section>
@endsection
