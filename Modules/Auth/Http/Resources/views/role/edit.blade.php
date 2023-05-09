@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('role.update', ['role' => $role]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="h6 font-weight-bold" for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}">
                            @error('name')<span class="text-danger">{{ $errors->first('name') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="h6 font-weight-bold">Guard</label>
                            <select name="guard" class="form-control custom-select">
                                @foreach($guards as $guard)
                                    <option value="{{ $guard }}" {{ old('guard', $role->guard) == $guard ? 'selected' : '' }}>{{ $guard }}</option>
                                @endforeach
                            </select>

                            @error('guard') <span class="text-danger">{{ $errors->first('guard') }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <select multiple="multiple" name="permissions[]" class="form-control custom-select">
                                @foreach($permissions as $permission)
                                    <option value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $permission->name }}
                                    </option>
                                @endforeach
                            </select>
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

@section('styles')
    <link rel="stylesheet" href="{{ asset('packages/bootstrap-duallistbox/bootstrap-duallistbox.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('packages/bootstrap-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <script>
        $('select[name="permissions[]"]').bootstrapDualListbox({
            // nonSelectedListLabel: 'Non-selected',
            // selectedListLabel: 'Selected',
            // preserveSelectionOnMove: 'moved',
            // moveOnSelect: false,
        });
    </script>
@endsection
