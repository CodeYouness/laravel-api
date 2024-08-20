@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Technology</th>
                    <th scope="col">Author</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{$project->id}}</td>
                            <td>{{ ($project->category) ? $project->category->name : '----'}}</td>
                            <td>
                            @forelse ($project->tecnologies as $tecnology)
                            <span class="badge rounded-pill text-bg-dark">{{$tecnology->name}} V:{{$tecnology->version}}</span>

                            @empty
                            No Technologies

                            @endforelse
                            </td>
                            <td>{{$project->author}}</td>
                            <td>{{$project->title}}</td>
                            <td>{{$project->date}}</td>
                            <td>
                                <a href="{{route('admin.projects.show', $project )}}" class="btn btn-primary btn-sm">Show</a>
                                <a href="{{route('admin.projects.edit', $project )}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('admin.projects.destroy', $project )}}" method="POST" class="d-inline-block form-destroyer" data-post-title="{{$project->title}}">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="btn btn-warning btn-sm" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        {{$projects->links();}}
    </div>
</div>
@endsection

@section('additional-scripts')
    @vite('resources/js/projects/delete-index-confirmation.js')
@endsection
