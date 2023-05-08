@extends('layouts.master')

@section('content')

    {!! grid_view([
        'dataProvider' => $dataProvider,
        'tableSmall' => true,
        'strictFilters' => true,
        'useFilters' => true,
        'columnFields' => [
            'username',
            'email',
            'created_at',
            [
                'label' => 'Actions',
                'class' => \App\Actions\ActionColumn::class,
            ]
        ]
    ]) !!}

@endsection
