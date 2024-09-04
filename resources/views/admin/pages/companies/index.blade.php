@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Company</h4>
                    {{-- @if (!isset($companies)) --}}
                        <a class="btn my-2 mb-3 btn-sm py-2 btn-primary" href="{{ route('admin.company.create') }}">Create New Company</a>
                    {{-- @endif --}}

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Visi</th>
                            <th>Misi</th>
                            <th>Kebijakan</th>
                            <th>Jasa Pelayanan</th>
                            <th width="280px">Action</th>
                        </tr>

                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $company->visi }}</td>
                                <td>{{ $company->misi }}</td>
                                <td>{{ $company->kebijakan }}</td>
                                <td>{{ $company->jasapelayanan }}</td>

                                <td>
                                    <form action="{{ route('admin.company.destroy', $company->id) }}" method="POST">
                                        <a class="btn btn-sm py-2 btn-info" href="{{ route('admin.company.edit', $company->id) }}">Edit</a>

                                        
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<x-Datatable />


