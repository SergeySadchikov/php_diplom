@extends (env('THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('indexContent')
    {!! $indexContent !!}
@endsection
