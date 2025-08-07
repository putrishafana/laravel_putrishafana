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
                <h6>Data Pasien</h6>
            </div>
            <div class="card-body">
                <div class="row mt-2 mb-3">
                    <div class="col-1 d-flex align-items-center">Filter Data</div>
                    <div class="col d-flex justify-content-start">
                        <select name="rs_id" id="filter_rs" class="form-select">
                            <option value="" selected disabled>Semua Rumah Sakit</option>
                            @foreach ($rs as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalPasien"><i class="bi bi-plus-square-fill"></i> Tambah
                            Data</button>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Rumah Sakit</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pasienTable">
                        @foreach ($pasien as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->RumahSakit->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->telepon }}</td>
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
                                    <form action="{{ url('/pasien/' . $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Pasien
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="rs_id{{ $item->id }}" class="form-label">Rumah
                                                        Sakit</label>
                                                    <select name="rs_id" id="rs_id" class="form-select">
                                                        <option value="" selected disabled>Pilih Rumah Sakit</option>
                                                        @foreach ($rs as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ $item->rs_id == $data->id ? 'selected' : '' }}>
                                                                {{ $data->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama{{ $item->id }}" class="form-label">Nama
                                                        Pasien</label>
                                                    <input type="text" class="form-control" id="nama{{ $item->id }}"
                                                        name="nama" value="{{ $item->nama }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat{{ $item->id }}"
                                                        class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat{{ $item->id }}" name="alamat" required>{{ $item->alamat }}</textarea>
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

                <div class="modal fade" id="modalPasien" tabindex="-1" aria-labelledby="modalPasienLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ url('/pasien') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalPasienLabel">Tambah Pasien</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="rs_id" class="form-label">Rumah Sakit</label>
                                        <select name="rs_id" id="rs_id" class="form-select">
                                            <option value="" selected disabled>Pilih Rumah Sakit</option>
                                            @foreach ($rs as $data)
                                                <option value="{{ $data->id }}">
                                                    {{ $data->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Pasien</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
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
                url: "/pasien/" + idDelete,
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

        $('#filter_rs').on('change', function() {
            let rs_id = $(this).val();

            $.get(`/pasien?rs=${rs_id}`, function(data) {
                let html = '';
                data.forEach((item, index) => {
                    html += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.nama}</td>
                        <td>${item.rumah_sakit.nama}</td>
                        <td>${item.alamat}</td>
                        <td>${item.telepon}</td>
                        <td>
                            <button type="button me-2" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editModal${item.id}""><i
                                            class="bi bi-pencil-square"></i></button>

                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="modalDelete(${item.id})"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>`;
                });
                $('#pasienTable').html(html);
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
