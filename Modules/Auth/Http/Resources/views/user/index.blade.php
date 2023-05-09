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
            'created_at',
            [
                'label' => 'Actions',
                'class' => \App\Actions\ActionColumn::class,
            ]
        ]
    ]) !!}

@endsection
