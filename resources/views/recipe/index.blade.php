
@extends('layouts.app')

@section('content')
<div class="container">
    <recipe-list data="{{ json_encode($recipes) }}"> {{ csrf_field() }} </recipe-list>
</div>
@endsection
