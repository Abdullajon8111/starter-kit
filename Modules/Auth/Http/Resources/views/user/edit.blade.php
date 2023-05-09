@extends('layouts.master')

@php
    /** @var \App\Models\User $user */
    $roles = \Modules\Auth\Models\Role::all();
    $permissions = \Modules\Auth\Models\Permission::all();
@endphp

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('user.update', ['user' => $user]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="">{{ __('Username') }}</label>
                            <input class="form-control" type="text" name="username" value="{{ old('username', $user->username) }}">
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Email') }}</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Password') }}</label>
                            <input class="form-control" type="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Password confirm') }}</label>
                            <input class="form-control" type="password_confirm" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Roles') }}</label>
                            <select class="form-control custom-select" name="roles[]" multiple id="">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $role->display_name ?: $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Permissions') }}</label>
                            <select class="form-control custom-select" name="permissions[]" multiple id="">
                                @foreach($permissions as $permission)
                                    <option value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions', $user->permissions->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $permission->display_name ?: $permission->name }}
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
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('select[name="roles[]"]').select2();
            $('select[name="permissions[]"]').select2();
        })
    </script>
@endsection
