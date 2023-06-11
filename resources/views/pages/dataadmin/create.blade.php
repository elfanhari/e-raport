@extends('layouts.master.main')

@section('content')

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Admin</h1>
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
                            Tambah Data Admin
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dataadmin.store') }}" method="POST">
                                @csrf

                                @include('pages.dataadmin._addform')

                            <input type="hidden" name="user_id" id="" value="1">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
