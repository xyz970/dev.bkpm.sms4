@extends('layouts.master')
@section('title', 'Data Pengalaman Kerja ')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="modal fade tambahData" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center" style="padding-bottom: 2rem">
                                                <h4>Tambah Data Pengalaman</h4>
                                            </div>
                                            <form method="POST" action="{{ route('admin.pengalaman_kerja.store') }}">
                                                {{ csrf_field() }}
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label f-w-600"
                                                        for="id">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input class="id form-control" type="text" required=""
                                                            name="nama" data-bs-original-title="" title="">
                                                    </div>
                                                </div>


                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label f-w-600"
                                                        for="id">Jabatan</label>
                                                    <div class="col-sm-9">
                                                        <input class="id form-control" type="text" required=""
                                                            name="jabatan" data-bs-original-title="" title="">
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label f-w-600" for="id">Tahun
                                                        Masuk</label>
                                                    <div class="col-sm-9">
                                                        <input class="id form-control" type="text" required=""
                                                            id="tahun_masuk" autocomplete="off" name="tahun_masuk"
                                                            data-bs-original-title="" title="">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label f-w-600" for="id">Tahun
                                                        Keluar</label>
                                                    <div class="col-sm-9">
                                                        <input class="id form-control" type="text" required=""
                                                            id="tahun_keluar" autocomplete="off" name="tahun_keluar"
                                                            data-bs-original-title="" title="">
                                                    </div>
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                                                data-bs-original-title="" title="">Tutup</button>
                                            <button class="btn btn-primary" data-type="btn-tambahdata" type="submit"
                                                data-bs-original-title="" title="">Tambah Data</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @if ($message = Session::get('success'))
                                <div style="padding-top: 2rem;">

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>

                            </div>
                          @endif
                            <div class="pb-6" style="padding-top: 1rem;">
                                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                    data-bs-target=".tambahData">Tambah Data</button>
                            </div>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Tahun Masuk</th>
                                        <th scope="col">Tahun Keluar</th>
                                        <th scope="col">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengalamanKerja as $item)
                                        <div class="modal fade editData{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center" style="padding-bottom: 2rem">
                                                            <h4>Ubah Data</h4>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('admin.pengalaman_kerja.update', $item->id) }}">
                                                            {{ csrf_field() }}
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label f-w-600"
                                                                    for="id">Nama</label>
                                                                <div class="col-sm-9">
                                                                    <input class="id form-control" type="text"
                                                                        required="" name="nama"
                                                                        value="{{ $item->nama }}"
                                                                        data-bs-original-title="" title="">
                                                                </div>
                                                            </div>


                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label f-w-600"
                                                                    for="id">Jabatan</label>
                                                                <div class="col-sm-9">
                                                                    <input class="id form-control" type="text"
                                                                        required="" name="jabatan"
                                                                        value="{{ $item->jabatan }}"
                                                                        data-bs-original-title="" title="">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label f-w-600"
                                                                    for="id">Tahun
                                                                    Masuk</label>
                                                                <div class="col-sm-9">
                                                                    <input class="id form-control" type="text"
                                                                        required="" name="tahun_masuk"
                                                                        value="{{ $item->tahun_masuk }}" id="tahun_masuk"
                                                                        autocomplete="off" data-bs-original-title=""
                                                                        title="">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label f-w-600"
                                                                    for="id">Tahun
                                                                    Keluar</label>
                                                                <div class="col-sm-9">
                                                                    <input class="id form-control" type="text"
                                                                        value="{{ $item->tahun_keluar }}" required=""
                                                                        name="tahun_keluar" id="tahun_keluar"
                                                                        autocomplete="off" data-bs-original-title=""
                                                                        title="">
                                                                </div>
                                                            </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal" data-bs-original-title=""
                                                            title="">Tutup</button>
                                                        <button class="btn btn-primary" data-type="btn-tambahdata"
                                                            type="submit" data-bs-original-title="" title="">Ubah
                                                            Data</button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td>{{ $item->tahun_masuk }}</td>
                                            <td>{{ $item->tahun_keluar }}</td>
                                            <td>
                                                <a href="{{ route('admin.pengalaman_kerja.delete', $item->id) }}"
                                                    class="btn btn-danger">Hapus</a>
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                    data-bs-target=".editData{{ $item->id }}">Ubah</button>

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@section('script')
    <script>
        $("input[id=tahun_keluar]").yearpicker()
        $("input[id=tahun_masuk]").yearpicker()
    </script>
@endsection
