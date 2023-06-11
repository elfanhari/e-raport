@extends('layouts.master.main')

@section('content')

<style>
  @media print {
  body * {
    visibility: hidden;
  }
  .print-only,
  .print-only * {
    visibility: visible;
  }
  .print-only {
    position: absolute;
    left: 0;
    top: 0;
  }
  .print-only caption {
    /* display: flex!important; */
    font-weight: bold;
    font-size: 18px;
    text-align: center;
    margin-bottom: 10px;
  }
}

</style>

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nilai Akhir - Kelas {{ $kelas->name }}</h1>
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
                            @if (!$siswa)
                                Belum ada Nilai Akhir.
                            @else
                                <div class="table-responsive">
                                    <button class="btn btn-danger btn-md float-left" id="cetakNilai">Cetak Nilai</button>
                                        <table id="table1" class="table table-sm table-hover table-bordered print-only">
                                          {{-- <caption class="d-none">NILAI AKHIR KELAS {{ $kelas->name }} TAHUN PELAJARAN {{ $kelas->tapel->tahun_pelajaran }} SEMESTER {{ $kelas->tapel->semester == 1 ? 'GANJIL' : 'GENAP' }}</caption> --}}
                                            <thead>
                                                <tr class="bg-dark text-white">
                                                    <th scope="col" rowspan="2">#</th>
                                                    <th scope="col" rowspan="2">NIS</th>
                                                    <th scope="col" rowspan="2">Nama</th>
                                                    <th scope="col" rowspan="2">L/P</th>
                                                    <th scope="col" colspan="{{ count($mapel) }}" class="text-center bg-warning">NILAI</th>
                                                    <th scope="col" rowspan="2">Rata-Rata</th>
                                                    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'guru')
                                                    <th scope="col" rowspan="2">Ranking</th>
                                                    @endif
                                                </tr>
                                                <tr class="bg-primary">
                                                  @foreach ($mapel as $i => $mpl)
                                                    <th scope="col" class="idMapel" data-id-mapel="{{ $mpl->id }}">{{ $mpl->singkatan }}</th>
                                                  @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($siswa as $item)
                                              <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nis }}</td>
                                                <td class="text-uppercase"> {{ $item->name }}</td>
                                                <td>{{ $item->jk }}</td>
                                                  {{-- // mapel_id = 7
                                                  // pembelajaran_id = 1 --}}


                                                  @for ($a = 0; $a < count($mapel); $a++)
                                                  @php
                                                      $mapelId = $mapel[$a]->id; // 11
                                                      $pembId = $pemb->where('mapel_id', $mapelId)->where('kelas_id', $item->kelas->id)->first()->id;
                                                  @endphp
                                                    <td class="nilaiMapel" data-id-mapel="{{ $mapel[$a]->id }}">{{ $nilaiAkhir->where('pembelajaran_id', $pembId)->where('siswa_id', $item->id)->first()->rata_rata ?? 0 }}</td>
                                                  @endfor

                                                <td class="rataRata fw-bold">
                                                  {{ number_format($rataRata[$loop->index], 2) }}
                                                </td>

                                                @if (auth()->user()->role === 'admin' || auth()->user()->role === 'guru')
                                                <td class="ranking">
                                                  {{ $ranking[$loop->index] }}
                                                </td>
                                                @endif

                                              </tr>
                                              @endforeach

                                            </tbody>
                                        </table>
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.nilaiMapel').each(function() {
          var idMapel = $(this).closest('tr').find('.idMapel').data('id-mapel');
          $(this).data('id-mapel', idMapel);
        });
      });
    </script>

<script>
  document.getElementById("cetakNilai").addEventListener("click", function() {
      window.print();
  });
</script>

@endsection
