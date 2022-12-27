@extends('layouts.app')

@section('title')
    Generations | Create
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Generations | Create</div>
                <div class="card-body">
                    <form id="contactForm" action="{{ route('backend.create.process.user') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12  col-md-12 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="mb-2 @error('year') text-danger fw-bold @enderror">year:</div>
                                        <input type="text" name="year" placeholder="year" value="{{ old('year') }}" class="form-control datepicker" id="datepicker">
                                        @error('year')
                                            <div class="text-danger small" >{!! $message !!}</div>
                                        @enderror
                                        @if(Session::has('error'))
                                            <div class="text-danger small" >{{Session::get('error')}}</div>
                                            
                                        @endif
                                    </div>
                                    
                                <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
