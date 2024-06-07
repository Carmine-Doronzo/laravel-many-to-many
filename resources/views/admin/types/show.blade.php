@extends('layouts.app')
@section('title',"{$type->name}")

@section('content')
    <div class="container py-4">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $type->name }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Slug: {{ $type->slug }}</h6>
               
                <p class="card-text">Description: {{ $type->description }}</p>
                
                <div id="form" class="d-flex justify-content-center align-items-center gap-4">
                    <button class="btn btn-outline-danger" id="trash">Trash</button>
                    <a class="btn btn-outline-warning" href="{{ route('admin.types.edit', $type) }}">Edit</a>
                </div>
            </div>
            <script>
                let trash = document.getElementById('trash')

                trash.addEventListener('click', function() {

                    let form = document.getElementById('form')

                    let trashConf = confirm('Sei sicuro di volere eliminare?')
                    if (trashConf === true) {

                        form.innerHTML +=
                            `
                              <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                              @method('DELETE')
                              @csrf
    
                              
         
                              <button type="submit" style="display:none;" id='confirm'>trash</button>
    
                              </form>
                            `
                        let confirm = document.getElementById('confirm').click()

                    }


                })
            </script>


        </div>
    </div>
    </div>

    </div>

@endsection
