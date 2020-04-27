@extends('layouts.app')

@section('content')
<recipe-edit data="{{ $recipe }}"> {{ csrf_field() }}  </recipe-edit>
@endsection
