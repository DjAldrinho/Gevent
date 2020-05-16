@extends('layout.template')
@section('title') Bienvenido a Gevent @endsection

@section('content')
    @if(Auth::check())
        @include('layout.includes.home')
    @else
        @include('layout.includes.login')
    @endif
@endsection