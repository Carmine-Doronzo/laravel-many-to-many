@extends('layouts.app')
@section('title','Upload a New Repository')
@section('content')
    
    <section>
        <div class="container py-4">
            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome repository</label>
                    <input type="text" name="name" class="form-control" id="name"
                        placeholder="inserisci il nome della repository" value="{{ old('name') }}">

                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipologia di progetto</label>
                    <select class="form-control" name="type_id" id="type_id">

                        <option value="">Seleziona Tipologia</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach

                    </select>
                </div>


                <div class="mb-3">
                    <label for="github_url" class="form-label">Url github</label>
                    <input type="text" name="github_url" class="form-control" id="github_url"
                        placeholder="inserisci link alla repository" value="{{ old('github_url') }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" name="description" id="description" rows="10" placeholder="Descrizione Repository">{{ old('description') }}</textarea>
                </div>

                <button class="btn btn-primary">Carica repository</button>
            </form>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )

                    <li>
                        {{$error}}
                    </li>
                        
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </section>
@endsection
