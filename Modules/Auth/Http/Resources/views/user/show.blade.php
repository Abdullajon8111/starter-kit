@extends('layouts.master')

@section('content')
    {!! detail_view([
            'model' => $user,
            'title' => __('Просмотреть'),
            'showHead' => false,
            'htmlAttributes' => [
                'class' => 'table table-bordered table-striped'
            ],
            'rowFields' => [
                'id',
                'username',
                'email',
                'created_at',
            ]
        ]) !!}
@endsection
