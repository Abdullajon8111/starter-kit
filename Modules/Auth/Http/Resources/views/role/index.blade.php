@extends('layouts.master')

@section('content')
    <div class="form-group">
        <a href="{{ route('role.create') }}" class="btn btn-primary">
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
            'name',
            'guard_name',
            [
                'label' => 'permissions',
                'value' => function (\Modules\Auth\Models\Role $role) {
                    $permissions = $role->permissions;
                    $html = '';
                    foreach ($permissions as $permission) {
                        $html .= '<span class="badge badge-success">' . $permission->name . '</span>&ensp;';
                    }

                    return $html;
                },
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
