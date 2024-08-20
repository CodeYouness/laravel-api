@extends('layouts.admin')

@section("page-title")
    {{$category->name}}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>{{$category->id}} : {{$category->name}}</h1>

            <h2 class="d-inline-block px-3 rounded" style="background: {{$category->color}}">{{$category->name}}</h2>
            <ul>
                @foreach ($category->projects as $project)
                <li>
                    <a href="{{route('admin.projects.show', $project)}}">
                        {{$project->title}} - {{$project->author}}
                    </a>
                </li>

                @endforeach
            </ul>
            <p>{{$category->content}}</p>
            <div class="card-footer">
                <a href="{{route('admin.categories.index', $category )}}" class="btn btn-primary btn-sm">Return to categories list</a>
                <a href="{{route('admin.categories.edit', $category )}}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{route('admin.categories.destroy', $category )}}" method="POST" class="d-inline-block form-destroyer" data-post-title="{{$category->title}}">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-warning btn-sm" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
