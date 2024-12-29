@extends('admin.master')
@section('admin')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sector Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->
    <section class="container-fluid">
        <div class="col-12">
            <div class="card mb-4 h-100">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <h6 class="card-title m-0">Sector Category</h6>
                    <!-- Button trigger modal -->
                    <button class="btn btn-outline-secondary btn-sm text-body" data-bs-toggle="modal"
                        data-bs-target="#addSectorModal">
                        <i class="ri-add-fill"></i> Add
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table m-0 table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Sub Sector</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sector as $item)
                                    <tr>
                                        <td>
                                            <span class="fw-bolder">{{ $loop->iteration }}</span>
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                width="50" height="50">
                                        </td>
                                        <td class="text-muted">{{ $item->name }}</td>
                                        <td class="text-muted">{{ $item->sub }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                                    type="button" id="dropdownOrder-0" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ri-more-2-line"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-0">
                                                    <!-- Edit option -->
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            id="edit-btn"
                                                            data-id="{{ $item->id }}"
                                                            data-name="{{ $item->name }}"
                                                            data-sub="{{ $item->sub }}"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateSectorModal">Edit</a>
                                                    </li>

                                                    <!-- Delete option -->
                                                    <li>
                                                        <form action="{{ route('sector.delete', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this sector?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger"
                                                                style="border: none; background: none;">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <nav>
                        {{ $sector->links('pagination::bootstrap-5') }}
                    </nav>
                </div>
            </div>
        </div>

        <!-- Modal Add -->
        <div class="modal fade" id="addSectorModal" tabindex="-1" aria-labelledby="addSectorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('sector.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSectorModalLabel">Add Sector</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="mb-3">
                                <label for="sub" class="form-label">Sub Sector</label>
                                <input type="text" class="form-control" id="sub" name="sub" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="updateSectorModal" tabindex="-1" aria-labelledby="updateSectorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="#" method="POST" enctype="multipart/form-data" id="updateSectorForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateSectorModalLabel">Update Sector</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="update_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="update_name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="update_image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="update_image" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="update_sub" class="form-label">Sub Sector</label>
                                <input type="text" class="form-control" id="update_sub" name="sub" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('#edit-btn');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-id');
                    var name = this.getAttribute('data-name');
                    var sub = this.getAttribute('data-sub');
                    var formAction = '{{ route('sector.update', ':id') }}';
                    formAction = formAction.replace(':id', id);

                    document.getElementById('updateSectorForm').action = formAction;
                    document.getElementById('update_name').value = name;
                    document.getElementById('update_sub').value = sub;

                    var updateModal = new bootstrap.Modal(document.getElementById('updateSectorModal'));
                    updateModal.show();
                });
            });
        });
    </script>
@endsection
