@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">

                <table class="table bg-white">
                    <thead>
                        <tr>
                            <th scope="col"><a href="{{ route('admin.orderby', ['id', $direction]) }}">ID</a></th>
                            <th scope="col"><a href="{{ route('admin.orderby', ['name', $direction]) }}">Name</a></th>
                            <th scope="col"><a href="{{ route('admin.orderby', ['client_name', $direction]) }}">Client
                                    Name</a></th>
                            <th scope="col">actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $project)
                            <tr>
                                <th>{{ $project->id }}</th>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->client_name }}</td>
                                <td>
                                    <a href="{{ route('admin.projects.show', $project) }}">show </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}">edit</a>
                                    @include('admin.partials.delete_button')
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            {{ $data->links() }}
        </div>
    </div>
@endsection
