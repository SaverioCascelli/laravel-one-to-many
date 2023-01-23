@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        <ul class="mt-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form class="m-5" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror"
                name="name">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client name</label>
            <input value="{{ old('client_name') }}" type="text"
                class="form-control @error('client_name') is-invalid @enderror" name="client_name">
            @error('client_name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Type </label>
            <select  name="type_id" class="form-select" aria-label="type project select">
                <option value="" >Select project type</option>
                @foreach ($data_type as $type)
                    <option @if ($type->id == old('type_id')) selected @endif value="{{ $type->id }}">
                        {{ $type->name }} </option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <input value="{{ old('summary') }}" type="text" class="form-control @error('summary') is-invalid @enderror"
                name="summary">
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
                <img id='output-image' width="150" src="" alt="">
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
