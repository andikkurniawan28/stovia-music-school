@extends('template.layouts.master')

@section('content')
<div class="container-fluid">

    @include('components.flash')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('kursus') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kursus</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td><a href="#" data-toggle="modal" data-target="#show{{ $course->id }}">{{ $course->instrument->name }} - {{ $course->grade->name }}</a></td>
                            <td>Rp. {{ number_format($course->price) }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit{{ $course->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $course->id }}">
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
                Tambah {{ ucfirst('kursus') }}
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
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst('kursus') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('courses.store') }}" class="text-dark">
                @csrf
                @method('POST')

                <div class="form-group row">
                    <label for="role_id" class="col-sm-4 col-form-label">{{ ucfirst('instrument') }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="instrument_id">
                            @foreach ($instruments as $instrument)
                                <option value="{{ $instrument->id }}">
                                    {{ $instrument->id }} | {{ $instrument->name }}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role_id" class="col-sm-4 col-form-label">{{ ucfirst('grade') }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="grade_id">
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">
                                    {{ $grade->id }} | {{ $grade->name }}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>

                @include('components.input',[
                    'label' => 'Harga',
                    'name' => 'price',
                    'type' => 'number',
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

@foreach($courses as $course)
<div class="modal fade" id="show{{ $course->id }}" tabindex="-1" course="dialog" aria-labelledby="show{{ $course->id }}Label" aria-hidden="true">
    <div class="modal-dialog" course="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $course->id }}Label">Informasi {{ ucfirst('kursus') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Instrument',
                    'name' => 'instrument',
                    'type' => 'text',
                    'value' => $course->instrument->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Grade',
                    'name' => 'grade',
                    'type' => 'text',
                    'value' => $course->grade->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Harga',
                    'name' => 'price',
                    'type' => 'text',
                    'value' => "Rp. ".number_format($course->price),
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Admin',
                    'name' => 'admin',
                    'type' => 'text',
                    'value' => $course->admin,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Created',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $course->created_at,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Updated',
                    'name' => 'updated_at',
                    'type' => 'text',
                    'value' => $course->updated_at,
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

@foreach($courses as $course)
<div class="modal fade" id="edit{{ $course->id }}" tabindex="-1" course="dialog" aria-labelledby="edit{{ $course->id }}Label" aria-hidden="true">
    <div class="modal-dialog" course="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $course->id }}Label">Edit {{ ucfirst('kursus') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('courses.update', $course->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="role_id" class="col-sm-4 col-form-label">{{ ucfirst('instrument') }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="instrument_id">
                            @foreach ($instruments as $instrument)
                                <option value="{{ $instrument->id }}">
                                    {{ $instrument->id }} | {{ $instrument->name }}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role_id" class="col-sm-4 col-form-label">{{ ucfirst('grade') }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="grade_id">
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">
                                    {{ $grade->id }} | {{ $grade->name }}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>

                @include('components.input',[
                    'label' => 'Harga',
                    'name' => 'price',
                    'type' => 'number',
                    'value' => $course->price,
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

@foreach($courses as $course)
<div class="modal fade" id="delete{{ $course->id }}" tabindex="-1" course="dialog" aria-labelledby="delete{{ $course->id }}Label" aria-hidden="true">
    <div class="modal-dialog" course="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $course->id }}Label">Hapus {{ ucfirst('kursus') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('courses.destroy', $course->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Apa Anda yakin ?</p>

                @include('components.input',[
                    'label' => 'Kursus',
                    'name' => 'course',
                    'type' => 'text',
                    'value' => $course->instrument->name." - ".$course->grade->name,
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

