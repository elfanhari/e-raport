@extends('layouts.master.main')

@section('content')

    @php
        use Carbon\Carbon;
    @endphp

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                @if ($informasi->count() < 1)
                @can('admin')
                <div class="col-sm-6">
                  <button class="btn btn-primary btn-md p-1 mb-1 fw-bold float-right "
                  data-bs-target="#addInformasi" data-bs-toggle="modal">
                  <span class="fas fa-plus pe-1"></span>
                  Informasi</button>
                </div>
                @endcan
                @endif
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if (session()->has('info'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    @include('_success')
                    {{ session('info') }}
                </div>
            @endif

            @if (session()->has('login'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    @include('_success')
                    Anda berhasil login sebagai <b class="text-uppercase"> {{ session('login') }} </b>
                </div>
            @endif

            <div class="row">
                @if ($informasi->count() > 0)
                <div class="col-md-6 d-sm-none">
                  <div class="timeline">
                      <!-- timeline time label -->
                      <div class="time-label ms-2">
                          <span class="bg-red px-2">
                              <span class="pe-1 fas fa-bullhorn"></span> Informasi
                          </span>
                          @can('admin')
                            <button class="btn btn-primary btn-md p-1 mb-1 fw-bold float-right me-3" data-bs-target="#addInformasi" data-bs-toggle="modal">
                              <span class="fas fa-plus pe-1"></span>
                              Informasi
                            </button>
                          @endcan
                      </div>

                      @foreach ($informasi as $item)
                          <div>
                              <i class="fas fa-envelope bg-blue"></i>
                              <div class="timeline-item">
                                  <span class="time">
                                      @if (Str::before($item->created_at, ' ') == Carbon::now()->toDateString())
                                          {{ $item->created_at->diffForHumans() }}
                                      @elseif(Str::substr($item->created_at, 8, 2) + 1 == Str::substr(Carbon::now()->toDateString(), 8, 2))
                                          Kemarin
                                      @else
                                          {{ Carbon::createFromFormat('Y-m-d', Str::before($item->created_at, ' '))->locale('id')->isoFormat('D MMMM YYYY') }}
                                      @endif
                                      <i class="fas fa-clock"></i>
                                  </span>
                                  <h3 class="timeline-header"><a href="#">
                                          @if ($item->user->role == 'admin')
                                              {{ $item->user->admin->name }}{{ $item->user->admin->gelar ? ', ' . $item->user->admin->gelar : '' }}
                                          @elseif ($item->user->role == 'guru')
                                              {{ $item->user->guru->name }}{{ $item->user->guru->gelar ? ', ' . $item->user->guru->gelar : '' }}
                                          @elseif ($item->user->role == 'walisiswa')
                                              {{ $item->user->walisiswa->name }}
                                          @elseif ($item->user->role == 'siswa')
                                              {{ $item->user->siswa->name }}
                                          @endif
                                      </a></h3>

                                  <div class="timeline-body">
                                      {{ Str::limit($item->isi, 50, '...') }}
                                  </div>
                                  <div class="timeline-footer">
                                      <a class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                          data-bs-target="#showInformasiXS{{ $item->id }}">Lihat
                                          detail</a>

                                      @can('admin')
                                      <button type="submit" class="btn btn-danger btn-sm" data-bs-target="#deleteInformasiXS{{ $item->id }}" data-bs-toggle="modal">
                                        Hapus
                                      </button>
                                      @endcan
                                  </div>

                                  <div class="modal fade" id="showInformasiXS{{ $item->id }}"
                                      data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                      aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="staticBackdropLabel">
                                                      {{ $item->judul }}</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                      aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                  {{ $item->isi }}
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-primary"
                                                      data-bs-dismiss="modal">Oke</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="modal fade" id="deleteInformasiXS{{ $item->id }}"
                                      data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                      aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="staticBackdropLabel">
                                                     Hapus Informasi
                                                  </h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                      aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                  Data: <br>
                                                  <b>{{ $item->judul }}</b>

                                                  <br> <br>
                                                  Apakah anda yakin informasi tersebut akan dihapus?
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary"
                                                      data-bs-dismiss="modal">Batal</button>

                                                  <form action="{{ route('informasi.destroy', $item->id) }}" method="POST">
                                                  @method('DELETE')
                                                  @csrf

                                                  <button type="submit" class="btn btn-primary">Hapus</button>

                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      @endforeach

                  </div>
              </div>
                    <div class="col-md-6">
                        <div class="row ">

                          @if (Auth::user()->role === 'walisiswa' || Auth::user()->role === 'siswa')
                              <div class="col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>Nilai</h3>

                                        <p>Nilai Akhir</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>Raport</h3>

                                        <p>Cetak Raport</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                          @else
                            <div class="col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>{{ $cSiswa }}</h3>

                                        <p>Siswa</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $cGuru }}</h3>

                                        <p>Guru</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $cEkstrakurikuler }}</h3>

                                        <p>Ekstrakurikuler</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $cMapel }}</h3>

                                        <p>Mata Pelajaran</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- small box -->
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3>{{ $cKelas }}</h3>

                                        <p>Kelas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                                        <p>Penilaian Selesai</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-6 d-xs-none">
                        <div class="timeline">
                            <!-- timeline time label -->
                            <div class="time-label ms-2">
                                <span class="bg-red px-2">
                                    <span class="pe-1 fas fa-bullhorn"></span> Informasi
                                </span>

                                @can('admin')
                                  <button class="btn btn-primary btn-md p-1 mb-1 fw-bold float-right me-3"
                                    data-bs-target="#addInformasi" data-bs-toggle="modal">
                                    <span class="fas fa-plus pe-1"></span>
                                    Informasi
                                  </button>
                                @endcan
                            </div>

                            @foreach ($informasi as $item)
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time">
                                            @if (Str::before($item->created_at, ' ') == Carbon::now()->toDateString())
                                                {{ $item->created_at->diffForHumans() }}
                                            @elseif(Str::substr($item->created_at, 8, 2) + 1 == Str::substr(Carbon::now()->toDateString(), 8, 2))
                                                Kemarin
                                            @else
                                                {{ Carbon::createFromFormat('Y-m-d', Str::before($item->created_at, ' '))->locale('id')->isoFormat('D MMMM YYYY') }}
                                            @endif
                                            <i class="fas fa-clock"></i>
                                        </span>
                                        <h3 class="timeline-header"><a href="#">
                                                @if ($item->user->role == 'admin')
                                                    {{ $item->user->admin->name }}{{ $item->user->admin->gelar ? ', ' . $item->user->admin->gelar : '' }}
                                                @elseif ($item->user->role == 'guru')
                                                    {{ $item->user->guru->name }}{{ $item->user->guru->gelar ? ', ' . $item->user->guru->gelar : '' }}
                                                @elseif ($item->user->role == 'walisiswa')
                                                    {{ $item->user->walisiswa->name }}
                                                @elseif ($item->user->role == 'siswa')
                                                    {{ $item->user->siswa->name }}
                                                @endif
                                            </a></h3>

                                        <div class="timeline-body">
                                            {{ Str::limit($item->isi, 50, '...') }}
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#showInformasiSM{{ $item->id }}">Lihat
                                                detail</a>

                                            @can('admin')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                data-bs-target="#deleteInformasiSM{{ $item->id }}"
                                                data-bs-toggle="modal">
                                                Hapus
                                            </button>
                                            @endcan
                                        </div>

                                        <div class="modal fade" id="showInformasiSM{{ $item->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                            {{ $item->judul }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $item->isi }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Oke</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="deleteInformasiSM{{ $item->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                            Hapus Informasi
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Data: <br>
                                                        <b>{{ $item->judul }}</b>

                                                        <br> <br>
                                                        Apakah anda yakin informasi tersebut akan dihapus?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>

                                                        <form action="{{ route('informasi.destroy', $item->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf

                                                            <button type="submit" class="btn btn-primary">Hapus</button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @else
                    <div class="col">
                        <div class="row ">

                          @if (Auth::user()->role === 'siswa' || Auth::user()->role === 'walisiswa')
                            <div class="col-md-3 col-sm-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>Nilai</h3>

                                        <p>Nilai Akhir</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>Raport</h3>

                                        <p>Cetak Raport</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                          @else

                            <div class="col-md-3 col-sm-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>{{ $cSiswa }}</h3>

                                        <p>Siswa</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $cGuru }}</h3>

                                        <p>Guru</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $cEkstrakurikuler }}</h3>

                                        <p>Ekstrakurikuler</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $cMapel }}</h3>

                                        <p>Mata Pelajaran</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3>{{ $cKelas }}</h3>

                                        <p>Kelas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                                        <p>Penilaian Selesai</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Lihat detail <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                          @endif

                        </div>
                    </div>
                @endif

            </div>
            <!-- Small boxes (Stat box) -->

            <!-- /.row -->
            <!-- Main row -->
  <div class="modal fade" id="addInformasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('informasi.store') }}" method="POST">
                @csrf

                <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}" hidden>

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-semibold poppins" id="exampleModalLabel">Tambah informasi-
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('pages.dashboard._addinformasi')
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    {{--  --}}

    </div>

@endsection
