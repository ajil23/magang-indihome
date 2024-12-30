@extends('admin.master')
@section('admin')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transaction Type</li>
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
                    <h6 class="card-title m-0">Transaction Type</h6>
                    <!-- Button trigger modal -->
                    <button class="btn btn-outline-secondary btn-sm text-body" data-bs-toggle="modal"
                        data-bs-target="#addTransactionModal">
                        <i class="ri-add-fill"></i> Add
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table m-0 table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Service</th>
                                    <th>Transaction</th>
                                    <th>Type</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactionType as $item)
                                    <tr>
                                        <td>
                                            <span class="fw-bolder">{{ $loop->iteration }}</span>
                                        </td>
                                        <td class="text-muted">{{ $item->service }}</td>
                                        <td class="text-muted">{{ $item->type == 'penawaran' ? 'Penawaran' : 'Penjualan' }}
                                        </td>
                                        <td class="text-muted">
                                            <i
                                                class="{{ $item->type == 'penawaran' ? 'ri-arrow-up-circle-fill' : 'ri-arrow-down-circle-fill' }} fs-3"></i>
                                        </td>
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
                                                            data-id="{{ $item->id }}"
                                                            data-service="{{ $item->service }}"
                                                            data-type="{{ $item->type }}" data-bs-toggle="modal"
                                                            data-bs-target="#updateTransactionModal">Edit</a>
                                                    </li>

                                                    <!-- Delete option -->
                                                    <li>
                                                        <form action="{{ route('transaction.delete', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this transaction type?');">
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
                        {{ $transactionType->links('pagination::bootstrap-5') }}
                    </nav>
                </div>
            </div>
        </div>

        <!-- Modal Add -->
        <div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTransactionModalLabel">Add Transaction</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="service" class="form-label">Product Service</label>
                                <input type="text" class="form-control" id="service" name="service" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Transaction Type</label>
                                <select class="form-select" name="type" id="type">
                                    <option value="">Choose Type</option>
                                    <option value="penawaran">Penawaran</option>
                                    <option value="penjualan">Penjualan</option>
                                </select>
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
        <div class="modal fade" id="updateTransactionModal" tabindex="-1" aria-labelledby="updateTransactionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="#" method="POST" enctype="multipart/form-data" id="updateTransactionForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateTransactionModalLabel">Update Transaction</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="service" class="form-label">Product Service</label>
                                <input type="text" class="form-control" id="service_update" name="service" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Transaction Type</label>
                                <select class="form-select" name="type" id="type_update">
                                    <option value="">Choose Type</option>
                                    <option value="penawaran">Penawaran</option>
                                    <option value="penjualan">Penjualan</option>
                                </select>
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
                    // Ambil data dari atribut tombol
                    var id = this.getAttribute('data-id');
                    var service = this.getAttribute('data-service');
                    var type = this.getAttribute('data-type');

                    // Set action form
                    var formAction = '{{ route('transaction.update', ':id') }}';
                    formAction = formAction.replace(':id', id);
                    document.getElementById('updateTransactionForm').action = formAction;

                    // Masukkan data ke input modal
                    document.getElementById('service_update').value = service; // Perbaikan di sini
                    document.getElementById('type_update').value = type; // Perbaikan di sini

                    // Tampilkan modal
                    var updateModal = new bootstrap.Modal(document.getElementById(
                        'updateTransactionModal'));
                    updateModal.show();
                });
            });
        });
    </script>
@endsection
