@extends('template.layouts.master')

@section('content')
<div class="container-fluid">

    @include('components.flash')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('ruang Kelas') }}</h5>
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
                        @foreach ($classrooms as $classroom)
                        <tr>
                            <td>{{ $classroom->id }}</td>
                            <td><a href="#" data-toggle="modal" data-target="#show{{ $classroom->id }}">{{ $classroom->name }}</a></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit{{ $classroom->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $classroom->id }}">
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
                Tambah {{ ucfirst('ruang Kelas') }}
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
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst('ruang Kelas') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('classrooms.store') }}" class="text-dark">
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

@foreach($classrooms as $classroom)
<div class="modal fade" id="show{{ $classroom->id }}" tabindex="-1" classroom="dialog" aria-labelledby="show{{ $classroom->id }}Label" aria-hidden="true">
    <div class="modal-dialog" classroom="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $classroom->id }}Label">Informasi {{ ucfirst('ruang Kelas') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $classroom->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Admin',
                    'name' => 'admin',
                    'type' => 'text',
                    'value' => $classroom->admin,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $classroom->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $classroom->updated_at,
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

@foreach($classrooms as $classroom)
<div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" classroom="dialog" aria-labelledby="edit{{ $classroom->id }}Label" aria-hidden="true">
    <div class="modal-dialog" classroom="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $classroom->id }}Label">Edit {{ ucfirst('ruang Kelas') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('classrooms.update', $classroom->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $classroom->name,
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

@foreach($classrooms as $classroom)
<div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" classroom="dialog" aria-labelledby="delete{{ $classroom->id }}Label" aria-hidden="true">
    <div class="modal-dialog" classroom="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $classroom->id }}Label">Hapus {{ ucfirst('ruang Kelas') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('classrooms.destroy', $classroom->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Apa Anda yakin ?</p>

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $classroom->name,
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

