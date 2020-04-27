@extends('layouts.app')

@section('content')
<div class="container">
    <home-component data="{{ json_encode($recipes) }}"> </home-component>
</div>
@endsection
