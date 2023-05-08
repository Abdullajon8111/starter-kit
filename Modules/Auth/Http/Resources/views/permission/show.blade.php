@extends('layouts.master')

@section('content')
    {!! detail_view([
            'model' => $permission,
            'title' => __('Просмотреть'),
            'showHead' => false,
            'htmlAttributes' => [
                'class' => 'table table-bordered table-striped'
            ],
            'rowFields' => [
                'id',
                'name',
                'guard_name',
                'created_at',
            ]
        ]) !!}
@endsection
