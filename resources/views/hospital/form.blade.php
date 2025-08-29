@extends('layouts.app')
@section('title', 'Rumah Sakit')
@section('content')
    <div>
        <h3 class="text-center"> {{ isset($collection->name) ? 'Ubah' : 'Tambah' }} Rumah Sakit</h3>
        @if (isset($collection->name))
            <form action="{{ route('hospital.update', $collection) }}" method="POST" class="w-50 mx-auto">
                @method('put')
            @else
                <form action="{{ route('hospital.store') }}" method="POST" class="w-50 mx-auto">
        @endif
        @csrf
        <div class="form-group coba mb-3">
            <label for="name">Nama</label>
            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                value="{{ old('name', $collection->name) }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>

        <div class="form-group mb-3">
            <label for="address">Alamat</label>
            <input id="address" class="form-control @error('address') is-invalid @enderror" type="text" name="address"
                value="{{ old('address', $collection->address) }}">
            <span class="text-danger">{{ $errors->first('address') }}</span>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                value="{{ old('email', $collection->email) }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>

        <div class="form-group mb-3">
            <label for="telephone">Telepon</label>
            <input id="telephone" class="form-control @error('telephone') is-invalid @enderror" type="text"
                name="telephone" value="{{ old('telephone', $collection->telephone) }}">
            <span class="text-danger">{{ $errors->first('telephone') }}</span>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>

    <style>
        .form-control:hover {
            border-color: blue
        }
    </style>
@endsection
