@extends('layouts.admin')

@section("page-title")
    List of all projects categories
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Number of projects</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->color}}</td>
                            <td>{{count($category->projects)}}</td>
                            <td>
                                <a href="{{route('admin.categories.show', $category )}}" class="btn btn-primary btn-sm">Show</a>
                                <a href="{{route('admin.categories.edit', $category )}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('admin.categories.destroy', $category )}}" method="POST" class="d-inline-block form-destroyer" data-post-title="{{$category->title}}">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="btn btn-warning btn-sm" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        {{$categories->links();}}
    </div>
</div>
@endsection

@section('additional-scripts')
    @vite('resources/js/projects/delete-index-confirmation.js')
@endsection
