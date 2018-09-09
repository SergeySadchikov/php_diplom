@extends (config('app.theme').'.layouts.site')
@section('more')
    @if($question)
        <div class="card">
            <h5 class="card-header font-weight-bold">Вопрос:</h5>
            <div class="card-body">
                <h5 class="card-title font-weight-bold"><b>{{$question->title}}</b></h5>
                <p class="card-text">{{$question->text}}</p>
            </div>
        </div>
        @if($question->answer)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title font-weight-bold"><b>Ответ:</b></h5>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{$question->answer->text}}</p>
                    </blockquote>
                </div>
            </div>
        @endif
    @endif
@endsection