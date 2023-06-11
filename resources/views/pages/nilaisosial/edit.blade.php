@extends('layouts.master.main')

@section('content')

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nilai Sosial - Kelas {{ $kelas->name }}</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-6">
                    @if (session()->has('info'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            @include('_success')
                            {!! session('info') !!}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- Petunjuk Aksi --}}
                            <button class="btn btn-info d-inline btn-sm btn-icon-split float-right ms-2 rounded-circle"
                                data-bs-toggle="modal" data-bs-target="#petunjukAksi">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                            </button>

                            <p>
                                Tahun Pelajaran: <b>{{ $kelas->tapel->tahun_pelajaran }} - Semester {{ $kelas->tapel->semester == '1' ? 'Ganjil' : 'Genap' }}</b> <br>
                                Wali Kelas:
                                <b>{{ $kelas->guru->name }}{{ $kelas->guru->gelar ? ', ' . $kelas->guru->gelar : '' }}</b>
                            </p>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (!$nilaiSosial)
                                Belum ada Nilai Sosial.
                            @else
                                <div class="table-responsive">
                                    <form action="{{ route('nilaisosial.update', ['nilaisosial' => $kelas->id, 'role' => $role]) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <table id="table1" class="table table-sm table-hover ">
                                            <thead>
                                                <tr class="bg-dark text-white">
                                                    <th scope="col">#</th>
                                                    <th scope="col">NIS</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">L/P</th>
                                                    <th scope="col">Predikat</th>
                                                    <th scope="col">Deskripsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($siswa as $i => $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->nis }}</td>
                                                        <td style="max-width: 300px" class="text-uppercase">
                                                          {{ $item->name }}</td>
                                                          <td>{{ $item->jk }}</td>
                                                          <td>
                                                            <input type="hidden" name="siswa_id[]" value="{{ $item->id }}">
                                                          <select aria-readonly="true" class="form-select @error('predikat') is-invalid @enderror" name="predikat[]" id="exampleSelectBorder">
                                                            {{-- <option value="" disabled selected>-- Pilih Predikat --</option> --}}
                                                            <option value="A" {{ 'A' == old('predikat', $nilaiSosial->where('siswa_id', $item->id)->first() ? $nilaiSosial->where('siswa_id', $item->id)->first()->predikat == 'A' : '') ? 'selected' : '' }}>A (Sangat Baik)</option>
                                                            <option value="B" {{ 'B' == old('predikat', $nilaiSosial->where('siswa_id', $item->id)->first() ? $nilaiSosial->where('siswa_id', $item->id)->first()->predikat == 'B' : '') ? 'selected' : '' }}>B (Baik)</option>
                                                            <option value="C" {{ 'C' == old('predikat', $nilaiSosial->where('siswa_id', $item->id)->first() ? $nilaiSosial->where('siswa_id', $item->id)->first()->predikat == 'C' : '') ? 'selected' : '' }}>C (Cukup)</option>
                                                            <option value="D" {{ 'D' == old('predikat', $nilaiSosial->where('siswa_id', $item->id)->first() ? $nilaiSosial->where('siswa_id', $item->id)->first()->predikat == 'D' : '') ? 'selected' : '' }}>D (Kurang)</option>
                                                          </select>
                                                          @error('predikat')
                                                          <span class="invalid-feedback mt-1">
                                                            {{ $message }}
                                                          </span>
                                                          @enderror
                                                        </td>
                                                        <td>
                                                          <textarea name="deskripsi[]" placeholder="Masukkan deskripsi" class="form-control" id="" cols="30" rows="5">{{ $nilaiSosial->where('siswa_id', $item->id)->first() ? $nilaiSosial->where('siswa_id', $item->id)->first()->deskripsi : '' }}</textarea>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-success float-right">
                                            Simpan
                                        </button>
                                        <div class="checkbox float-right me-3">
                                            <label>
                                                <input type="checkbox" class="mt-3" required>
                                                Saya yakin akan mengubah data tersebut
                                            </label>
                                        </div>
                                    </form>
                                </div>

                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- MODAL PETUNJUK AKSI --}}
    {{-- Modal Petunjuk Aksi --}}
    <div class="modal fade text-black" id="petunjukAksi" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Petunjuk Aksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fs-xs-14">
                    <table class="table table-borderless table-sm m-0">
                        @include('petunjuk.add')
                        @include('petunjuk.show')
                        @include('petunjuk.edit')
                        @include('petunjuk.delete')
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>

@endsection
