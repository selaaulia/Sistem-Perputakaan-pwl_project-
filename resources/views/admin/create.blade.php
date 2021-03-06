@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Admin Perpustakaan
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form method="post" action="/admin/admin" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" name="username" class="form-control" id="username"
                            aria-describedby="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            aria-describedby="password">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="nama" name="nama" class="form-control" id="nama" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No_Handphone</label>
                        <input type="no_hp" name="no_hp" class="form-control" id="no_hp" aria-describedby="no_hp">
                    </div>
                    <label for="alamat">Alamat </label>
                    <input type="alamat" class="form-control" name="alamat"><br>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button><br>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
