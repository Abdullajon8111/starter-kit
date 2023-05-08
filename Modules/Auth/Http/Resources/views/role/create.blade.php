@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('role.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label class="h6 font-weight-bold" for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')<span class="text-danger">{{ $errors->first('name') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="h6 font-weight-bold">Guard</label>
                            <select name="guard" class="form-control custom-select">
                                @foreach($guards as $guard)
                                    <option value="{{ $guard }}" {{ old('guard') == $guard ? 'selected' : '' }}>{{ $guard }}</option>
                                @endforeach
                            </select>

                            @error('guard') <span class="text-danger">{{ $errors->first('guard') }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-save"></i>
                                &ensp; Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
