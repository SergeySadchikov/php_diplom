@extends (env('THEME').'.layouts.admin')

@section('navigation')
{!! $navigation !!}
@endsection

@section('content')
    <h1>{{$title}}</h1>
   {!! $content !!}
@endsection

