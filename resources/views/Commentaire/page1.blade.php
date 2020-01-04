@extends('Layouts.default',['titre'=>'Page 1'])

@section('content')
    <h1 class="text-center">Commentaire</h1>
    <div id="app">
            <div class="container">
            {{-- <test></test> --}}
            <h2>{{$titre ?? ''}}</h2>
            <comment class="w-1/2"></comment>
            </div>
    </div>
@endsection