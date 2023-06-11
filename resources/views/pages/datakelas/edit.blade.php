@extends('layouts.master.main')

@section('content')

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kelas</h1>
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
                            Edit Data Kelas
                        </div>
                        <div class="card-body">
                            <form action="{{ route('datakelas.update', $kelas->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                @include('pages.datakelas._editform')

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
