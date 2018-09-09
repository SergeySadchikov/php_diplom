@extends (config('app.theme').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('indexContent')
    {!! $indexContent !!}
@endsection
