<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{ $project->id }}">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="delete_{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Delete project id:
                    {{ $project->id }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                confirm elimination of
                <strong>
                    <p> {{ $project->name }}</p>
                </strong>
                project?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-primary">Confirm
                        delete</button>
                </form>

            </div>
        </div>
    </div>
</div>
