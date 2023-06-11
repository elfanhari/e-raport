@extends('layouts.master.main')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Wali Siswa</h1>
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
                            Edit Data Wali Siswa
                        </div>
                        <div class="card-body">
                            <form action="{{ route('datawalisiswa.update', ['datawalisiswa' => $walisiswa->id, 'role' => $role]) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @include('pages.datawalisiswa._editform')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
