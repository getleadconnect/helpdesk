@extends('layouts.master')
@section('content')
    <div class="layout-wrapper">
        <div class="content-section p-3 bg-white">
            <div class="col-md-12" style="overflow: auto">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <h6 class="card-title">Role</h6>
                        <input type="text" name="name"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value=""
                            placeholder="">
                        @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <input name="id" type="hidden" value="">
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group pt-4">
                        <input type="submit" value="Update" class="btn demo-btn">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
