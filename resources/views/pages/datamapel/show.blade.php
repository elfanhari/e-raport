@extends('layouts.master.main')

@section('content')

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Mapel: {{ $mapel->name }}</h1>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($pembelajaran->count() < 1)
                              Belum ada Pembelajaran pada Mapel {{ $mapel->name }}.
                            @else
                            <div class="table-responsive">
                              {{-- Petunjuk Aksi --}}
                              <button class="btn btn-info d-inline btn-sm btn-icon-split float-right ms-3 mt-1 me-1 mb-2  rounded-circle"
                              data-bs-toggle="modal" data-bs-target="#petunjukAksi">
                              <span class="icon text-white-50">
                                  <i class="fas fa-info-circle"></i>
                              </span>
                          </button>

                              <table id="table1" class="table table-sm table-hover ">
                                  <thead>
                                      <tr class="bg-dark text-white">
                                          <th scope="col">#</th>
                                          <th scope="col">Nama Pembelajaran</th>
                                          <th scope="col">Guru Pengampu</th>
                                          <th scope="col">KKM</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($pembelajaran as $item)
                                          <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td> <b>{{ $item->mapel->name }}</b> - {{ $item->kelas->name }}</td>
                                              <td>{{ $item->guru->name }}{{ $item->guru->gelar ? ', ' . $item->guru->gelar : '' }}
                                              </td>
                                              <td>{{ $item->kkm }}</td>
                                              <td>
                                                  @if ($item->status == true)
                                                      <span class="badge px-1 bg-success">AKTIF</span>
                                                  @else
                                                      <span class="badge px-1 bg-info">NON-AKTIF</span>
                                                  @endif
                                              </td>
                                              <td>
                                                  <a href="{{ route('datapembelajaran.show', ['role' => auth()->user()->role, 'datapembelajaran' => $item->id]) }}"
                                                      class="btn btn-success pb-1 pt-0 px-2">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                          height="16" fill="currentColor"
                                                          class="bi bi-list-columns-reverse" viewBox="0 0 16 16">
                                                          <path fill-rule="evenodd"
                                                              d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                                      </svg>
                                                  </a>
                                              </td>

                                          </tr>
                                      @endforeach

                                  </tbody>
                              </table>
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
     <div class="modal fade text-black" id="petunjukAksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title fw-bold" id="exampleModalLabel">Petunjuk Aksi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body fs-xs-14">
                <table class="table table-borderless table-sm m-0">
                  {{-- @include('petunjuk.add') --}}
                  @include('petunjuk.show')
                  {{-- @include('petunjuk.edit') --}}
                  {{-- @include('petunjuk.delete') --}}
                </table>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
              </div>
          </div>
      </div>
  </div>

@endsection
