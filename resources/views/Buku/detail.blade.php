@extends('layouts.admin')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Buku
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><img src="{{ asset('storage/' . $bukus->gambar) }}" width="200px;" height="300px;" alt=""></li>
                        <li class="list-group-item"><b>ID: </b>{{ $bukus->id_buku }}</li>
                        <li class="list-group-item"><b>Kode Buku: </b>{{ $bukus->kode_buku }}</li>
                        <li class="list-group-item"><b>Judul Buku: </b>{{ $bukus->judul_buku }}</li>
                        <li class="list-group-item"><b>Kategori: </b>{{ $bukus->kategori_buku }}</li>
                        <li class="list-group-item"><b>Penulis: </b>{{ $bukus->nama_penulis }}</li>
                        <li class="list-group-item"><b>Penerbit: </b>{{ $bukus->nama_penerbit }}</li>
                        <li class="list-group-item"><b>Nomor Rak: </b>{{ $bukus->no_rak }}</li>
                        <li class="list-group-item"><b>Tahun Terbit: </b>{{ $bukus->tahun }}</li>
                        <li class="list-group-item"><b>Jumlah: </b>{{ $bukus->jumlah }}</li>
                    </ul>
                </div>
                @if (Auth::user()->role == 'admin')
                <a class="btn btn-success mt-3" href="/admin/buku">Kembali</a>
                @else
                <a class="btn btn-success mt-3" href="/petugas/buku">Kembali</a>
                @endif
                

            </div>
        </div>
    </div>
@endsection