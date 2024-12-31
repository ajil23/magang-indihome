@extends('admin.master')
@section('admin')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
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
                    <button class="btn btn-primary btn-sm">
                        <i class="ri-download-fill align-bottom"></i> Export
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
                                        <td class="text-muted">{{ $item->description ? 'sudah' : 'belum' }}</td>
                                        <td class="text-muted">{{ $item->file ? 'sudah' : 'belum' }}</td>
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
                                                            data-sales-id="{{ $item->data_sales_id }}"
                                                            data-transaction-type-id="{{ $item->transaction_type_id }}"
                                                            data-sector-id="{{ $item->sector_id }}"
                                                            data-location="{{ $item->location }}"
                                                            data-address="{{ $item->address }}"
                                                            data-date="{{ $item->date }}" data-pic="{{ $item->pic }}"
                                                            data-description="{{ $item->description }}"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateVisitModal">Edit</a>
                                                    </li>

                                                    <!-- Delete option -->
                                                    <li>
                                                        <form action="{{ route('visit.delete', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this visit?');">
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
    </section>
@endsection
