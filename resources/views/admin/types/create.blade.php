@extends('layouts.app')
@section('title','Upload a New Type')
@section('content')
    
    <section>
        <div class="container py-4">
            <form action="{{ route('admin.types.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome Type</label>
                    <input type="text" name="name" class="form-control" id="name"
                        placeholder="inserisci il nome della repository" value="{{ old('name') }}">

                </div>

            
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" name="description" id="description" rows="10" placeholder="Descrizione Repository">{{ old('description') }}</textarea>
                </div>

                <button class="btn btn-primary">Upload a Type</button>
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
