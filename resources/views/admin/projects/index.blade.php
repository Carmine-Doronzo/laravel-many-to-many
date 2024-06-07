@extends('layouts.app')
@section('title', 'projects index')
@section('content')

<div class="container py-4">
    <table class="table table-dark ">
        <thead>
           
            <tr>
                <th scope="col">id</th>
                <th scope="col">Project Name</th>
                <th scope="col">Project Type</th>
                <th scope="col">Link</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{ $project->name }}</td>
                <td>{{ $project->type ? $project->type->name : 'No Category' }}</td>
                <td><a class="btn btn-outline-primary" href="{{route('admin.projects.show',$project)}}">More...</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{--<h1>questo è l'index</h1>
    
        <p>Name: </p>
        <p>Slug: {{ $project->slug }}</p>
        <p>Type id: {{ $project->type_id }}</p>
        <p>Type: </p>
        --}}
    
@endsection
