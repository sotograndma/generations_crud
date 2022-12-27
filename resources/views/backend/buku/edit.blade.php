@extends('layouts.app')
@section('title')
    Generations | Edit #ID {{ $generations->id }}
@endsection
@section('css')
<link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection
@section('javascript')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(function(){
        $('.datepicker').datepicker({
            format: 'yyyy',
            minViewMode: 2,
        });
    });
</script>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Generations | Edit{{ $generations->id }}</div>
                    <div class="card-body">
                        <form action="{{ route('backend.edit.process.user', $generations->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $generations->id }}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">

                                    <div class="mb-3">
                                        <div class="mb-2 @error('year') text-danger fw-bold @enderror">year:</div>
                                        <input type="text" name="year" value="{{ $generations->year }}" placeholder="year" class="form-control datepicker @error('year') text-danger is-invalid @enderror" id="datepicker">
                                        @error('year')
                                            <small class="text-danger">{!! $message !!}</small>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-dark">Edit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
