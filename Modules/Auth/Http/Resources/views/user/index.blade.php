@extends('layouts.master')

@section('content')

    <div class="form-group">
        <a href="{{ route('user.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            &ensp; Create
        </a>
    </div>

    {!! grid_view([
        'dataProvider' => $dataProvider,
        'tableSmall' => true,
        'strictFilters' => true,
        'useFilters' => true,
        'columnFields' => [
            'username',
            'email',
            [
                'label' => 'roles',
                'value' => function (\App\Models\User $user) {
                    $roles = $user->roles;
                    $html = '';
                    foreach ($roles as $role) {
                        $html .= '<span class="badge badge-success">' . $role->name. '</span>&ensp;';
                    }

                    return $html;
                },
                'filter' => false,
                'format' => 'html'
            ],
            [
                'label' => 'permissions',
                'value' => function (\App\Models\User $user) {
                    $permissions = $user->permissions;
                    $html = '';
                    foreach ($permissions as $permission) {
                        $html .= '<span class="badge badge-success">' . $permission->name. '</span>&ensp;';
                    }

                    return $html;
                },
                'filter' => false,
                'format' => 'html'
            ],
            'created_at',
            [
                'label' => 'Actions',
                'class' => \App\Actions\ActionColumn::class,
            ]
        ]
    ]) !!}

@endsection
