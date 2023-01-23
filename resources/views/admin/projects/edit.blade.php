@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form class="m-5" method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input value="{{ old('name', $project->name) }}" type="text"
                class="form-control @error('name') is-invalid @enderror" id="name" name="name">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client name</label>
            <input value="{{ old('client_name', $project->client_name) }}" type="text"
                class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name">
            @error('client_name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- <select name="type_id" class="form-select" aria-label="type project select">
            <option selected>Select project type</option>
            @foreach ($project() as )
            <option value=""></option>

            @endforeach
        </select> --}}

        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <input value="{{ old('summary', $project->summary) }}" type="text"
                class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary">
            @error('summary')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="img" class="form-label">Cover img</label>
            <input onchange="showImage(event)" value="{{ old('img') }}" type="file"
                class="form-control @error('img') is-invalid @enderror" name="img">
            @error('img')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            <div class="image mt-2">
                <img id='output-image' width="150" src="{{ asset('storage/' . $project->img) }}" alt="">
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        function showImage(event) {
            const tagImage = document.getElementById('output-image');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
