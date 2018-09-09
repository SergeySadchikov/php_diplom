@extends (config('app.theme').'.layouts.admin')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('title')
    <div class="row justify-content-center">
        @if($title)
            <div class="col-md-4">
                <h2 class="header h1">{{$title}} !</h2>
            </div>
        @endif
    </div>
@endsection

