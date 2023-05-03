@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <p>
            <a href="{{ route('admin.houses.index') }}">Get all houses</a>
        </p>
        <p>
            <a href="{{ route('admin.apartments.index') }}">Get all apartments</a>
        </p>
    </div>
</div>
@endsection

