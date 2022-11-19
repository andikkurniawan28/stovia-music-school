@extends('template.layouts.master')

@section('content')
<div class="container-fluid">

    @include('components.flash')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('grade') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                        <tr>
                            <td>{{ $grade->id }}</td>
                            <td><a href="#" data-toggle="modal" data-target="#show{{ $grade->id }}">{{ $grade->name }}</a></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit{{ $grade->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $grade->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create">
                Tambah {{ ucfirst('grade') }}
            </button>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="create" tabindex="-1" sample="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst('grade') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('grades.store') }}" class="text-dark">
                @csrf
                @method('POST')

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => '',
                    'modifier' => 'required',
                ])

                <input type="hidden" name="admin" value="{{ Auth()->user()->name }}">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($grades as $grade)
<div class="modal fade" id="show{{ $grade->id }}" tabindex="-1" grade="dialog" aria-labelledby="show{{ $grade->id }}Label" aria-hidden="true">
    <div class="modal-dialog" grade="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $grade->id }}Label">Informasi {{ ucfirst('grade') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $grade->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Admin',
                    'name' => 'admin',
                    'type' => 'text',
                    'value' => $grade->admin,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $grade->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $grade->updated_at,
                    'modifier' => 'readonly',
                ])

            </div>
            <div class="modal-footer">
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($grades as $grade)
<div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" grade="dialog" aria-labelledby="edit{{ $grade->id }}Label" aria-hidden="true">
    <div class="modal-dialog" grade="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $grade->id }}Label">Edit {{ ucfirst('grade') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('grades.update', $grade->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $grade->name,
                    'modifier' => 'required',
                ])

                <input type="hidden" name="admin" value="{{ Auth()->user()->name }}">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Simpan
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($grades as $grade)
<div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" grade="dialog" aria-labelledby="delete{{ $grade->id }}Label" aria-hidden="true">
    <div class="modal-dialog" grade="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $grade->id }}Label">Hapus {{ ucfirst('grade') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('grades.destroy', $grade->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Apa Anda yakin ?</p>

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $grade->name,
                    'modifier' => 'readonly',
                ])

                <input type="hidden" name="admin" value="{{ Auth()->user()->name }}">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary btn-sm">Ya, hapus!</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

