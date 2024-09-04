@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Portofolio</h4>
                    <form action="{{ route('admin.portofolio.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class='form-group mb-3'>
                            <label for='nama' class='mb-2'>Nama Portofolio <span class='text-danger'>*</span></label>
                            <input type='text' name='nama' class='form-control @error('nama') is-invalid @enderror'
                                value='{{ $item->nama ?? old('nama') }}'>
                            @error('nama')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='deskripsi' class='mb-2'>Deskripsi <span class='text-danger'>*</span></label>
                            <textarea name='deskripsi' id='deskripsi' cols='30' rows='3'
                                class='form-control @error('deskripsi') is-invalid @enderror'>{{ $item->deskripsi ?? old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='nilai_proyek' class='mb-2'>Nilai Proyek <span class='text-danger'>*</span></label>
                            <input type='text' name='nilai_proyek' id='nilai_proyek'
                                class='form-control @error('nilai_proyek') is-invalid @enderror'
                                value='{{ old('nilai_proyek') }}' autocomplete="off">
                            @error('nilai_proyek')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.portofolio.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update Portofolio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('nilai_proyek').addEventListener('input', function (e) {
            // Remove non-numeric characters
            let value = e.target.value.replace(/[^0-9]/g, '');
            
            // Format the number according to the Indonesian locale 'id-ID'
            let formattedValue = new Intl.NumberFormat('id-ID').format(value);
            
            // Set the formatted value back to the input field
            e.target.value = formattedValue;
        });
    </script>
@endsection
