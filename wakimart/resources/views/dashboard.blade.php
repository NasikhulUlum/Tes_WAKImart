@extends('layouts.app')

@section('pageTitle', 'Koffiesoft')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <h1 class="p-3 mb-2 bg-success text-white"><strong>Congratulation, {{ $message }}</strong></h1>
    @endif
</div>
@endsection
