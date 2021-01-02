@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-white shadow">
        <div class=" py-6 px-4 sm:px-6 lg:px-8">
        <nav class="navbar navbar-expand-lg ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item mr-3">
        <router-link to='/'>Home</router-link>
        </li>
        <li class="nav-item mr-3">
        <router-link to='/product'>Product</router-link>
        </li>
        <li class="nav-item mr-3">
        <router-link to='/material'>Material</router-link>
        </li>
        <li class="nav-item mr-3">
        <router-link to='/manage'>Manage</router-link>
        </li>
        </ul>
    </div>  
    </div>
    </nav>
    </div>
    <div class="container-fluid mt-3">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <router-view></router-view>
        </div>
    </div> 
@endsection