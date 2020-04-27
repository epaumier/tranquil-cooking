@extends('layouts.app')

@section('content')
<div class="container">
<recipe-show data="{{ $recipe }}"></recipe-show>
</div>
@endsection
