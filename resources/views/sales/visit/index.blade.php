@extends('sales.master')
@section('sales')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sales Visit</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- / Breadcrumbs-->
    <section class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-12">
            <div class="card mb-4 h-100">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <h6 class="card-title m-0">Sales Visit</h6>
                    <!-- Button trigger modal -->
                    <button class="btn btn-outline-secondary btn-sm text-body" data-bs-toggle="modal"
                        data-bs-target="#addVisitModal">
                        <i class="ri-add-fill"></i> Add
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table m-0 table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Sales</th>
                                    <th>Transaction Type</th>
                                    <th>Location</th>
                                    <th>Sector</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Proof</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visit as $item)
                                    <tr>
                                        <td>
                                            <span class="fw-bolder">{{ $loop->iteration }}</span>
                                        </td>
                                        <td class="text-muted">{{ $item->dataSales->name }}</td>
                                        <td class="text-muted">{{ $item->transactionType->service }}</td>
                                        <td class="text-muted">{{ $item->location }}</td>
                                        <td class="text-muted">{{ $item->sector->name }}</td>
                                        <td class="text-muted">{{ $item->address }}</td>
                                        <td class="text-muted">{{ $item->date }}</td>
                                        <td class="text-muted">{{ $item->description ? 'sudah' : 'belum'}}</td>
                                        <td class="text-muted">{{ $item->file ? 'sudah' : 'belum'}}</td>
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
                                                        <a class="dropdown-item" href="javascript:void(0)" id="edit-btn"
                                                            data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                            data-bs-target="#updateVisitModal">Edit</a>
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
                        {{ $visit->links('pagination::bootstrap-5') }}
                    </nav>
                </div>
            </div>
        </div>

        <!-- Modal Add -->
        <div class="modal fade" id="addVisitModal" tabindex="-1" aria-labelledby="addVisitModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('visit.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addVisitModalLabel">Add Visit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="data_sales_id" class="form-label">Sales Name</label>
                                    <select class="form-select" name="data_sales_id" id="data_sales_id">
                                        <option value="">Choose Sales Name</option>
                                        @foreach ($sales as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}/{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="transaction_type_id" class="form-label">Transaction Type</label>
                                    <select class="form-select" name="transaction_type_id" id="transaction_type_id">
                                        <option value="">Choose Transaction Type</option>
                                        @foreach ($transaction as $item)
                                            <option value="{{ $item->id }}">{{ $item->service }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="sector_id" class="form-label">Sector</label>
                                    <select class="form-select" name="sector_id" id="sector_id">
                                        <option value="">Choose Sector</option>
                                        @foreach ($sector as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pic" class="form-label">Pic</label>
                                    <input type="text" class="form-control" id="pic" name="pic" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="file" class="form-label">File</label>
                                    <input type="file" class="form-control" id="file" name="file" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
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
        <div class="modal fade" id="updateVisitModal" tabindex="-1" aria-labelledby="updateVisitModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="#" method="POST" enctype="multipart/form-data" id="updateVisitForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateVisitModalLabel">Update Visit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
        // document.addEventListener('DOMContentLoaded', function() {
        //     var editButtons = document.querySelectorAll('#edit-btn');
        //     editButtons.forEach(function(button) {
        //         button.addEventListener('click', function() {
        //             var id = this.getAttribute('data-id');
        //             var name = this.getAttribute('data-name');
        //             var sub = this.getAttribute('data-sub');
        //             var formAction = '{{ route('sector.update', ':id') }}';
        //             formAction = formAction.replace(':id', id);

        //             document.getElementById('updateVisitForm').action = formAction;
        //             document.getElementById('update_name').value = name;
        //             document.getElementById('update_sub').value = sub;

        //             var updateModal = new bootstrap.Modal(document.getElementById('updateVisitModal'));
        //             updateModal.show();
        //         });
        //     });
        // });
    </script>
@endsection
