@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="@yield('form-action')" method="POST">
                @yield('form-method')
                @csrf

                <div class="mb-3">
                    <h2>
                        @yield("page-title")
                    </h2>
                </div>

                <div class="mb-3">
                    <label for="name">Category name:</label>
                    <input type="text" name="name" id="name" class="form-control mb-3"
                    value="{{ old('name', $category->name)}}">
                    @error("name")
                        <div class="alert alert-danger mb-3">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="color">Color</label>
                    <input type="color" name="color" id="color" class="form-control mb-3"
                    value="{{ old('color', $category->color)}}">
                    @error("color")
                        <div class="alert alert-danger mb-3">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <input type="submit" value="@yield('page-title')" class="btn btn-primary btn-lg">
                <input type="reset" value="Reset Fields" class="btn btn-warning btn-lg">
            </form>
        </div>
    </div>
</div>
@endsection
