@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">

                <h1>Project</h1>
                <table class="table table-str iped">
                    <thead>
                        <tr>
                            <th class="table-id" scope="col"><a
                                    href="{{ route('admin.orderby', ['id', $direction]) }}">ID</a></th>
                            <th scope="col" class="table-name"><a
                                    href="{{ route('admin.orderby', ['name', $direction]) }}">Name</a></th>
                            <th scope="col" class="table-client-name"><a
                                    href="{{ route('admin.orderby', ['client_name', $direction]) }}">Client
                                    Name</a></th>
                            <th scope="col" class="table-type">Type </th>
                            <th scope="col" class="table-actions">actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $project)
                            <tr>
                                <th scope="row sc-row">{{ $project->id }}</th>
                                <td class="">{{ $project->name }}</td>
                                <td class="">{{ $project->client_name }}</td>
                                <td>
                                    <h4><span class="badge bg-primary">{{ $project->type->name }}</span></h4>

                                </td>
                                <td class="">

                                    <a class="btn btn-info " role="button"
                                        href="{{ route('admin.projects.show', $project) }}">Show </a>
                                    <a class="btn btn-warning "
                                        role="button"href="{{ route('admin.projects.edit', $project) }}">Edit</a>
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
