@extends (env('THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('indexContent')
    {!! $indexContent !!}
@endsection

{{--<form action=" {{route('add.store')}}" id="" method="post">--}}
    {{--<p>--}}
        {{--{{ csrf_field() }}--}}
        {{--<label>id категории</label>--}}
            {{--<input name="category_id" id="" value="" type="text" size="30"/>--}}
        {{--<label>Ваше имя</label>--}}
            {{--<input name="name" id="" value=" " type="text" size="30"/>--}}
        {{--<label>Email</label>--}}
            {{--<input name="email" id="" value=" " type="text" size="30"/>--}}
        {{--<label>Заголовок</label>--}}
        {{--<input name="title" id="" value=" " type="text" size="30"/>--}}
        {{--<label>Текст вопроса</label>--}}
            {{--<textarea name="text" id="" rows="5" cols="5" ></textarea>--}}
        {{--<br />--}}
        {{--<input class="button" type="submit" value="Добавить" />--}}
    {{--@if(!empty($errors))--}}
        {{--@foreach($errors->all() as $error)--}}
            {{--<div>--}}
                {{--{{$error}}--}}
            {{--</div>--}}
            {{--@endforeach--}}
            {{--@endif--}}
    {{--</p>--}}
{{--</form>--}}

