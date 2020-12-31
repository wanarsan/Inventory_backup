@extends('layouts.app')
@section('content')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>

    <div class="container-fluid mt-3">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div id="app">
            <edit-component id="{{$id}}">
                
            </edit-component>
            </div>
            </div>
        </div>
    </div>
@endsection
    