@extends('layouts.app')

@section('content')
<div class="container">
<recipe-form> {{ csrf_field() }} </recipe-form>
</div>
@endsection
