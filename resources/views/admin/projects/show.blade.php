@extends('layouts.app')
@section('title', "{$project->name}")

@section('content')
    <div class="container py-4">

        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Name: {{ $project->name }}</h5>

                <h6 class="card-subtitle mb-2 text-body-secondary">Slug: {{ $project->slug }}</h6>

                <h6 class="card-subtitle mb-2 text-body-secondary">
                    Type: {{ $project->type ? $project->type->name : 'No Category' }}
                </h6>
                <h6 class="card-subtitle mb-2 text-body-secondary">Technology: </h6>
                <ul class="mx-5 list-unstyled">


                    @foreach ($project->technologies as $technology)
                        <li>
                            {{ $technology->name }}
                        </li>
                    @endforeach
                </ul>


                <p class="card-text">Description: {{ $project->description }}</p>

                <h6 class="card-subtitle mb-2 text-body-secondary">Github Url: <a href="#" class="card-link">
                        {{ $project->github_url }}</a></h6>

                <div id="form" class="d-flex justify-content-center align-items-center gap-4">
                    <button class="btn btn-outline-danger" id="trash">Trash</button>
                    <a class="btn btn-outline-warning" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
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
                              <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
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
    <div class="container">
        <div class="row">
            <ul>
                {{-- @dd($project->type) --}}
                @if ($project->type !== null)
                    @foreach ($project->type->projects as $rel_project)
                        @if ($rel_project->name !== $project->name)
                            <li>
                                <a href="{{ route('admin.projects.show', $rel_project) }}">{{ $rel_project->name }}</a>
                            </li>
                        @endif
                    @endforeach
                @else

                        <li>
                            non ci sono repo correlate in realtà ci sono ma non riesco a visualizzarle perchè c'è il fottutissimo null
                        </li>
                    {{-- @foreach ($project['type_id => null']->projects as $rel_project)
                        @if ($rel_project->name !== $project->name)
                            <li>
                                <a href="{{ route('admin.projects.show', $rel_project) }}">{{ $rel_project->name }}</a>
                            </li>
                        @endif
                    @endforeach  --}}
                @endif
            </ul>
        </div>
    </div>



@endsection
