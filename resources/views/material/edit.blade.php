@extends('layouts.app')
@section('content')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit product') }}
        </h2>

    <div class="container-fluid mt-3">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div id="app">
            <materialedit-component id="{{$id}}">
                
            </materialedit-component>
            </div>
            </div>
        </div>
    </div>
 
@endsection