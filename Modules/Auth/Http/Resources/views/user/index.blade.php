@extends('layouts.master')

@section('content')
    @php
        $gridData = [
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
        ];
    @endphp

    @gridView($gridData)
@endsection
