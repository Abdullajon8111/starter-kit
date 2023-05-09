@extends('layouts.master')

@section('content')
    {!! detail_view([
        'showHead' => false,
        'title' => __('Show'),
        'model' => $role,
        'htmlAttributes' => [
            'class' => 'table table-bordered table-striped'
        ],
        'rowFields' => [
            'id',
            'name',
            'display_name',
            [
                'label' => 'permissions',
                'value' => function (\Modules\Auth\Models\Role $model) {
                    $permissions = $model->permissions;
                    $html = '';
                    foreach ($permissions as $permission) {
                        $html .= '<span class="badge badge-success">' . $permission->name . '</span>&ensp;';
                    }

                    return $html;
                },
                'format' => 'html'
            ]
        ]
    ]) !!}
@endsection
