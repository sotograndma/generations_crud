@extends('layouts.app')

@section('title')
    Generations | Backend
@endsection

@section('javascript')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('table').DataTable({
                "pageLength" : 50
            });
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contact') }}</div>
                <div class="card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-success">
                            {!! Session::get('error') !!}
                        </div>
                    @endif

                    
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {!! Session::get('success') !!}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Year</th>
                                <th>Created_At</th>
                                <th>Updated_At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($generations as $key => $value)
                                <tr>
                                    <th>{{ ++$key }}</th>
                                    <td>{{ $value->year }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('backend.edit.user', $value->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt pe-1"></i> Edit</a>
                                        <form action="{{ route('backend.delete.user', $value->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt pe-1"> Destroy</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
