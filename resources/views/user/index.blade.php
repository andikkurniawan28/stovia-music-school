@extends('template.layouts.master')

@section('content')
<div class="container-fluid">

    @include('components.flash')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('user') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="#" data-toggle="modal" data-target="#show{{ $user->id }}">{{ $user->name }}</a></td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit{{ $user->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $user->id }}">
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
                Tambah {{ ucfirst('user') }}
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
                <h5 class="modal-title" id="createLabel">Create {{ ucfirst('user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('users.store') }}" class="text-dark">
                @csrf
                @method('POST')

                @include('components.input',[
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => '',
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Username',
                    'name' => 'username',
                    'type' => 'text',
                    'value' => '',
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Password',
                    'name' => 'password',
                    'type' => 'password',
                    'value' => '',
                    'modifier' => 'required',
                ])

                <div class="form-group row">
                    <label for="role_id" class="col-sm-4 col-form-label">Hak akses</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->id }} | {{ $role->name }}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>

                <input type="hidden" name="admin" value="{{ Auth()->user()->name }}">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($users as $user)
<div class="modal fade" id="show{{ $user->id }}" tabindex="-1" user="dialog" aria-labelledby="show{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog" user="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $user->id }}Label">Informasi {{ ucfirst('user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @if($user->image != NULL)
                    <div class="form-group row text-center">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <img class="img-profile rounded-circle" src="{{ Storage::url('public/image/').$user->image }}" width="200" height="200"></img>
                    </div>
                    <br>
                @endif

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $user->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Username',
                    'name' => 'username',
                    'type' => 'text',
                    'value' => $user->username,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Hak akses',
                    'name' => 'role',
                    'type' => 'text',
                    'value' => $user->role->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Admin',
                    'name' => 'admin',
                    'type' => 'text',
                    'value' => $user->admin,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $user->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $user->updated_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Status',
                    'name' => 'active',
                    'type' => 'text',
                    'value' => $user->active,
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

@foreach($users as $user)
<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" user="dialog" aria-labelledby="edit{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog" user="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $user->id }}Label">Edit {{ ucfirst('user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('users.update', $user->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $user->name,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Username',
                    'name' => 'username',
                    'type' => 'text',
                    'value' => $user->username,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Password',
                    'name' => 'password',
                    'type' => 'password',
                    'value' => '',
                    'modifier' => 'required',
                ])

                <div class="form-group row">
                    <label for="role_id" class="col-sm-4 col-form-label">Role</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="role_id">
                            @foreach ($roles as $role)
                                <option
                                @if($user->role_id == $role->id)
                                {{ 'selected' }}
                                @endif
                                value="{{ $role->id }}">
                                {{ $role->id }} | {{ $role->name }}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="is_active" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="active">
                            @if($user->active == 1)
                                <option {{ 'selected' }} value="1">Active</option>
                                <option value="0">Non-Active</option>
                            @else
                                <option {{ 'selected' }} value="0">Non-Active</option>
                                <option value="1">Aktif</option>
                            @endif
                          </select>
                    </div>
                </div>

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

@foreach($users as $user)
<div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" user="dialog" aria-labelledby="delete{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog" user="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $user->id }}Label">Hapus {{ ucfirst('user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Apa Anda yakin ?</p>

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $user->name,
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

