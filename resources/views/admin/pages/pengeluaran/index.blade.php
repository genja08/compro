@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Pengeluaran</h4>
                    <a href="{{ route('admin.pengeluaran.create') }}" class="btn my-2 mb-3 btn-sm py-2 btn-primary">Tambah
                        Pengeluaran</a>
                    <div class="table-responsive">
                        <table class="table dtTable table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Proyek</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Uraian</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->uraian }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>
                                            <a href="{{ route('admin.pengeluaran.edit', $item->pengeluaran_id) }}"
                                                class="btn btn-sm py-2 btn-info">Edit</a>
                                            <form action="javascript:void(0)" method="post" class="d-inline"
                                                id="formDelete">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btnDelete btn-sm py-2 btn-danger"
                                                    data-action="{{ route('admin.pengeluaran.destroy', $item->pengeluaran_id) }}">Hapus</button>
                                            </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<x-Datatable />
