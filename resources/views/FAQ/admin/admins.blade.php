@extends (env('THEME').'.layouts.admin')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('content')
    <h2>{{$title}}</h2>
    {!! $content !!}
@endsection



