@extends('layouts.admin')

@section('content')
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col">

                <h1>{{ $project->name }}</h1>

                @if($project->type)
                    <h4><span class="badge bg-primary">{{ $project->type->name }}
                @endif</span></h4>
                @if ($project->img)
                    <div>
                        <img src="{{ asset('storage/' . $project->img) }}" alt="{{ $project->name }}">
                    </div>
                @endif
                <h3>client: {{ $project->client_name }}</h3>
                <p>{{ $project->summary }}</p>

            </div>
        </div>
    </div>
@endsection
