@extends('layouts.app')

@section('content')

<client id="{{ auth()->user()->id }}" api_token="{{ auth()->user()->api_token }}"></client>

@endsection
