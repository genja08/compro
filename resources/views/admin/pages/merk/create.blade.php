@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Tambah Merk</h4>
                    <form action="{{ route('admin.merk.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='form-group mb-3'>
                            <label for='nama' class='mb-2'>Merk <span class='text-danger'>*</span></label>
                            <input type='text' name='nama' class='form-control @error('nama') is-invalid @enderror'
                                value='{{ old('nama') }}'>
                            @error('nama')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.merk.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Tambah Merk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
