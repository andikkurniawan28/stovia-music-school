@extends('template.layouts.master')

@section('content')
<div class="container-fluid">

    @include('components.flash')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('log') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Timestamp</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->created_at }}</td>
                            <td>{{ $log->subject }}</td>
                            <td>{{ $log->description }}</td>
                            <td>{{ $log->admin }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{--  --}}
        </div>
    </div>
</div>
@endsection
