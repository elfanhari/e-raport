@extends('layouts.master.main')

@section('content')

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pembelajaran @can('gurumapel') Saya @endcan</h1>
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

                            <p>Nama Pembelajaran:
                                <b>{{ $pembelajaran->mapel->name . ' - ' . $pembelajaran->kelas->name }}</b> <br>
                                KKM: <b>{{ $pembelajaran->kkm }}</b> <br>
                                Guru Pengampu:
                                <b>{{ $pembelajaran->guru->name }}{{ $pembelajaran->guru->gelar ? ', ' . $pembelajaran->guru->gelar : '' }}</b>
                            </p>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (!$pembelajaran)
                                Belum ada Siswa di Pembelajaran ini.
                            @else
                                <div class="table-responsive">
                                    <form action="{{ route('datapembelajaran.insertnilai', $pembelajaran->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <table id="table1" class="table table-sm table-hover ">
                                            <thead>
                                                <tr class="bg-dark text-white">
                                                    <th scope="col">#</th>
                                                    <th scope="col">NIS</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Nilai Pengetahuan</th>
                                                    <th scope="col">Nilai Keterampilan</th>
                                                    <th scope="col">Nilai PTS</th>
                                                    <th scope="col">Nilai PAS</th>
                                                    <th scope="col">Rata-Rata</th>
                                                    <th scope="col">Deskripsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($siswa as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->nis }}</td>
                                                        <td style="max-width: 300px" class="text-uppercase">
                                                            {{ $item->name }}</td>
                                                        <td>
                                                            <input type="number" class="form-control input-nilai"
                                                                name="nilai_pengetahuans[]" id="nilai_pengetahuans"
                                                                value="
                                                                  {{ $nilaiPengetahuan->where('siswa_id', $item->id)->where('pembelajaran_id', $pembelajaran->id)->first() ? $nilaiPengetahuan->where('siswa_id', $item->id)->where('pembelajaran_id', $pembelajaran->id)->first()->nilai : '' }}
                                                                ">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control input-nilai"
                                                                name="nilai_keterampilans[]" id="nilai_keterampilans"
                                                                value="
                                                                  {{ $nilaiKeterampilan->where('siswa_id', $item->id)->where('pembelajaran_id', $pembelajaran->id)->first() ? $nilaiKeterampilan->where('siswa_id', $item->id)->where('pembelajaran_id', $pembelajaran->id)->first()->nilai : '' }}
                                                                ">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control input-nilai"
                                                                name="nilai_pts[]" id="nilai_pts"
                                                                value="
                                                                  {{ $nilaiPts->where('siswa_id', $item->id)->where('pembelajaran_id', $pembelajaran->id)->first() ? $nilaiPts->where('siswa_id', $item->id)->where('pembelajaran_id', $pembelajaran->id)->first()->nilai : '' }}
                                                                ">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control input-nilai"
                                                                name="nilai_pas[]" id="nilai_pas"
                                                                value="
                                                                  {{ $nilaiPas->where('siswa_id', $item->id)->where('pembelajaran_id', $pembelajaran->id)->first() ? $nilaiPas->where('siswa_id', $item->id)->where('pembelajaran_id', $pembelajaran->id)->first()->nilai : '' }}
                                                                ">
                                                        </td>
                                                        <td class="rataRata fw-bold">

                                                        </td>
                                                    </tr>
                                                @endforeach --}}

                                                @foreach ($siswa as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->nis }}</td>
                                                        <td style="max-width: 300px" class="text-uppercase">
                                                            {{ $item->name }}</td>
                                                        <td>
                                                            <input type="hidden" name="siswa_id[]" value="{{ $item->id }}">
                                                            <input type="number" class="form-control input-nilai"
                                                                name="nilai_pengetahuans[]" id="nilai_pengetahuans"
                                                                value="{{ $nilaiPengetahuan->where('siswa_id', $item->id)->first() ? $nilaiPengetahuan->where('siswa_id', $item->id)->first()->nilai : '' }}">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control input-nilai"
                                                                name="nilai_keterampilans[]" id="nilai_keterampilans"
                                                                value="{{ $nilaiKeterampilan->where('siswa_id', $item->id)->first() ? $nilaiKeterampilan->where('siswa_id', $item->id)->first()->nilai : '' }}">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control input-nilai"
                                                                name="nilai_pts[]" id="nilai_pts"
                                                                value="{{ $nilaiPts->where('siswa_id', $item->id)->first() ? $nilaiPts->where('siswa_id', $item->id)->first()->nilai : '' }}">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control input-nilai"
                                                                name="nilai_pas[]" id="nilai_pas"
                                                                value="{{ $nilaiPas->where('siswa_id', $item->id)->first() ? $nilaiPas->where('siswa_id', $item->id)->first()->nilai : '' }}">
                                                        </td>
                                                        <td class="rataRata fw-bold">

                                                        </td>
                                                        <td>
                                                          <textarea name="deskripsi[]" class="form-control" id="" cols="30" rows="5">{{ $nilaiAkhir->where('siswa_id', $item->id)->first() ? $nilaiAkhir->where('siswa_id', $item->id)->first()->deskripsi : '' }}</textarea>
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

                                <script src="/my-js/jquery.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        function hitungRataRata() {
                                            $(".rataRata").each(function() {
                                                var row = $(this).closest("tr");
                                                var nilaiPengetahuan = parseFloat(row.find("input[name='nilai_pengetahuans[]']")
                                                .val()) || 0;
                                                var nilaiKeterampilan = parseFloat(row.find("input[name='nilai_keterampilans[]']")
                                                .val()) || 0;
                                                var nilaiPTS = parseFloat(row.find("input[name='nilai_pts[]']").val()) || 0;
                                                var nilaiPAS = parseFloat(row.find("input[name='nilai_pas[]']").val()) || 0;

                                                var rataRata = (nilaiPengetahuan + nilaiKeterampilan + nilaiPTS + nilaiPAS) / 4;

                                                $(this).text(rataRata.toFixed(2));
                                            });
                                        }

                                        $(document).on("input", ".input-nilai", function() {
                                            hitungRataRata();
                                        });

                                        hitungRataRata();
                                    });
                                </script>
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
