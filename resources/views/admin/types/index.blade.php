@extends('layouts.app')
@section('title', 'Type index')
@section('content')

<div class="container py-4">
    <table class="table table-dark ">
        <thead>
           
            <tr>
                <th scope="col">id</th>
                <th scope="col">Type Name</th>
                <th scope="col">Link</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
            <tr>
                <th scope="row">{{$type->id}}</th>
                <td>{{ $type->name }}</td>
                <td><a class="btn btn-outline-primary" href="{{route('admin.types.show',$type)}}">More...</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection