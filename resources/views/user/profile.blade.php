@extends('layouts.app')

@section('content')


<!-- Nucleo Icons -->
<link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />


<div class="container-fluid py-4">
    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card card-profile">
                <img src="../assets/img/pdam_ofc.png" alt="Office" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-4 col-lg-4 order-lg-2">
                        <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                            <a href="Foto Anda">
                                <img src="../assets/img/team-2.jpg"
                                    class="rounded-circle img-fluid border border-2 border-white">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">

                    <div class="text-center mt-4">
                        <h4>
                            Muhammad Sumbul
                        </h4>
                        <div class="h7 mt-2">
                            (Politeknik Nuklir Indonesia)
                        </div>

                        <h4 class="mt-3">
                            <i class="ni ni-badge mr-2"></i> (Status)
                        </h4>
                        <div class="h7 mt-3">Satuan Kerja: </div>
                        <div>
                            (Pengembangan Teknologi Informasi)
                        </div>
                        <div class="h7 mt-3">Periode Magang: </div>
                        <div class="h7 mt-0">
                            (tanggal_mulai) - (tanggal_selesai)
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Edit Profile</h5>
                    </div>
                </div>
                <!-- Informasi Pribadi -->
                <div class="card-body">
                    <p class="text-sm">Informasi Pribadi</p>
                    <form id="formEditProfile">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="form-control-label">Username</label>
                                    <input class="form-control" id="username" type="text" value="sumbulmuh" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nim" class="form-control-label">NIM / NISN</label>
                                    <input class="form-control" id="nim" type="text" disabled value="433211093013">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="asal" class="form-control-label">Asal Perguruan Tinggi / Sekolah</label>
                                    <input class="form-control" id="asal" type="text"
                                        placeholder="Contoh: SMK Negeri Swasta 1 Jayapura" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jurusan" class="form-control-label">Jurusan / Program Studi</label>
                                    <input class="form-control" id="jurusan" type="text"
                                        placeholder="Contoh: Teknologi Rekayasa Nuklir" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="semester" class="form-control-label">Semester / Kelas</label>
                                    <input class="form-control" id="semester" type="number" min="1" max="14"
                                        placeholder="Contoh: 5" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat Rumah</label>
                                    <input class="form-control" id="alamat" type="text"
                                        placeholder="Contoh: Jl. Kelud Raya No. 60" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telp" class="form-control-label">No. Telp</label>
                                    <input class="form-control" type="number" placeholder="Contoh: 628808808880"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis-kelamin" class="form-control-label">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis-kelamin" name="jenis_kelamin" required>
                                        <option selected disabled value>-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-Laki" {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Dokumen Tambahan -->
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Dokumen Tambahan</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="foto-ktm" class="form-control-label">Foto Kartu Tanda Mahasiswa /
                                            Kartu
                                            Pelajar</label>
                                        <input class="form-control" type="file" id="foto-ktm" name="foto_ktm"
                                            accept="image/*, application/pdf" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="foto-ktm" class="form-control-label">Surat Pengantar dari Perguruan
                                            Tinggi /
                                            Sekolah</label>
                                        <input class="form-control" type="file" id="surat_pengantar"
                                            name="surat_pengantar" accept="image/*, application/pdf" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="foto-ktm" class="form-control-label">Surat Keterangan Diterima
                                            Magang</label>
                                        <input class="form-control" type="file" id="surat_diterima_magang"
                                            name="surat_diterima_magang" accept="image/*, application/pdf" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="d-flex align-items-center mt-4">
                                <button type="button" class="btn btn-success btn-sm ms-auto"
                                    id="btnSimpan">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="simpanPerubahanModal" tabindex="-1" aria-labelledby="simpanPerubahanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="simpanPerubahanModalLabel">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Yakin Perubahan Sudah Benar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" form="formEditProfile" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('btnSimpan').addEventListener('click', function () {
                // Ambil form
                const form = document.getElementById('formEditProfile');

                // Cek validitas form
                if (form.checkValidity()) {
                    // Jika valid, tampilkan modal
                    const modal = new bootstrap.Modal(document.getElementById('simpanPerubahanModal'));
                    modal.show();
                } else {
                    // Jika tidak valid, tampilkan pesan validasi
                    form.reportValidity();
                }
            });
        </script>



    </div>
</div>
</div>
</div>




</div>

@endsection