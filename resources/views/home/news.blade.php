@extends('layouts.main')

@section('meta')
@endsection

@section('styles')
    <style>
    </style>
@endsection

@section('title')
@endsection

@section('content')
    <div class="content" id="app">
        <p>@{{ message }}</p>
        <example-component></example-component>
        <hr>
        <ul id="news">
            <li v-for="item in items">
                @{{ item.title }}
            </li>
        </ul>
            
    </div>
@endsection
