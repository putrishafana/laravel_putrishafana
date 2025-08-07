@extends('halaman.index')

@section('content')
    <div class="container w-100">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-message">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-message">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="card w-100">
            <div class="card-header">
                <h6>Data Rumah Sakit</h6>
            </div>
            <div class="card-body">
                <div class="mt-2 mb-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalRumahSakit"><i class="bi bi-plus-square-fill"></i> Tambah
                        Data</button>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rs as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <button type="button me-2" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $item->id }}""><i
                                            class="bi bi-pencil-square"></i></button>

                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="modalDelete({{ $item->id }})"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ url('/rumahsakit/' . $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Rumah
                                                    Sakit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama{{ $item->id }}" class="form-label">Nama Rumah
                                                        Sakit</label>
                                                    <input type="text" class="form-control" id="nama{{ $item->id }}"
                                                        name="nama" value="{{ $item->nama }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat{{ $item->id }}"
                                                        class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat{{ $item->id }}" name="alamat" required>{{ $item->alamat }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email{{ $item->id }}" class="form-label">Email</label>
                                                    <input type="email" class="form-control"
                                                        id="email{{ $item->id }}" name="email"
                                                        value="{{ $item->email }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telepon{{ $item->id }}"
                                                        class="form-label">Telepon</label>
                                                    <input type="text" class="form-control"
                                                        id="telepon{{ $item->id }}" name="telepon"
                                                        value="{{ $item->telepon }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>

                <div class="modal fade" id="modalRumahSakit" tabindex="-1" aria-labelledby="modalRumahSakitLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ url('/rumahsakit') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalRumahSakitLabel">Tambah Rumah Sakit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Rumah Sakit</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telepon" class="form-label">Telepon</label>
                                        <input type="text" class="form-control" id="telepon" name="telepon"
                                            required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                Apakah kamu yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-danger" id="btnHapusKonfirmasi">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        let idDelete = null;

        function modalDelete(id) {
            idDelete = id;
            $('#modalHapus').modal('show');
        }

        $('#btnHapusKonfirmasi').on('click', function() {
            if (!idDelete) return;

            $.ajax({
                url: "/rumahsakit/" + idDelete,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {

                    location.reload();
                },
                error: function(err) {
                    console.error(err);
                    alert("Gagal menghapus data!");
                }
            });
        });

        setTimeout(function() {
            const alert = $('#alert-message');
            if (alert) {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }
        }, 3000);
    </script>
@endsection
