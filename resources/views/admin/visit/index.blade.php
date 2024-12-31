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
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exportModal">
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

    <!-- Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Export Sales Visit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Select the format for export:</p>
                    <!-- Radio buttons for Export Options -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exportOption" id="excelOption" value="excel"
                            checked>
                        <label class="form-check-label" for="excelOption">
                            Excel
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exportOption" id="pdfOption" value="pdf">
                        <label class="form-check-label" for="pdfOption">
                            PDF
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="exportConfirmBtn">Export</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Menampilkan modal ketika tombol Export diklik
        document.querySelector('.btn.btn-primary.btn-sm').addEventListener('click', function() {
            var exportModal = new bootstrap.Modal(document.getElementById('exportModal'));
            exportModal.show();
        });

        // Menangani proses export ketika tombol konfirmasi ditekan
        document.getElementById('exportConfirmBtn').addEventListener('click', function() {
            var selectedOption = document.querySelector('input[name="exportOption"]:checked').value;
            if (selectedOption === 'excel') {
                // Arahkan ke route export Excel
                window.location.href = "{{ route('visit.export', ['format' => 'excel']) }}";
            } else if (selectedOption === 'pdf') {
                // Arahkan ke route export PDF
                window.location.href = "{{ route('visit.export', ['format' => 'pdf']) }}";
            }
        });
    </script>
@endsection
