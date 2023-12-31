@extends('admin.layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Mobil</h3>
                    <p class="text-subtitle text-muted">List Mobil</p>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Simple Datatable</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>harga</th>
                            <th>Persetujuan 1</th>
                            <th>Persetujuan 2</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $index => $transaksi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $transaksi->nama_peminjam }}</td>
                                <td>{{ $transaksi->no_hp }}</td>
                                <td>{{ $transaksi->alamat }}</td>
                                <td>{{ $transaksi->tanggalpinjam }}</td>
                                <td>{{ $transaksi->tanggalkembali }}</td>
                                <td>{{ $transaksi->harga }}</td>
                                <td>
                                    <span class="badge bg-success">{{ $transaksi->persetujuan1 }}</span>
                                </td>
                                <td>
                                    <span class="badge {{ $transaksi->persetujuan2 == 'diproses' ? 'bg-warning' : 'bg-success' }}">{{ $transaksi->persetujuan2 }}</span>
                                </td>
                                <td>
                                    <span class="badge {{ $transaksi->status == 'setuju' ? 'bg-success' : 'bg-warning' }}">{{ $transaksi->status }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            {{ $transaksis->links() }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
    $(document).ready(function () {
        // Initialize DataTables
        var table = $('#table1').DataTable({
            dom: 'Bfrtip',
            searching: false,
            paging: false, // Hide the "Previous" and "Next" buttons
            info: false, // Hide information about the number of entries
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Export Excel',
                    exportOptions: {
                        columns: ':visible'
                    },
                    className: 'btn btn-success',
                    attr: {
                        id: 'exportButton',
                        'data-show-export': 'true' // Set the data-show-export attribute
                    }
                }
            ]
        });
    });
</script>


@endsection
