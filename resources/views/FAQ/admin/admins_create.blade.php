@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
{!! Form::open(['url' => (isset($admin->id)) ? route('admins.update',['id'=>$admin->id]) :route('admins.store'),'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        <label for=""><h5 class="card-title font-weight-bold">Имя (логин)</h5></label>
        {!! Form::text('name',isset($admin->name) ? $admin->name  : old('name'), ['placeholder'=>'Введите имя(логин)', 'class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        <label for=""><h5 class="card-title font-weight-bold">Email</h5></label>
        {!! Form::text('email',isset($admin->email) ? $admin->email  : old('email'), ['placeholder'=>'Введите email', 'class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        <label for=""><h5 class="card-title font-weight-bold">Пароль</h5></label>
        {!! Form::password('password', ['placeholder'=>'Введите пароль', 'class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        <label for=""><h5 class="card-title font-weight-bold">Повторите пароль</h5></label>
        {!! Form::password('password_confirmation',['placeholder'=>'Повторите пароль', 'class' => "form-control"]) !!}
    </div>

    @if(isset($admin->id))
        <input type="hidden" name="_method" value="PUT">
    @endif
    {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
{!! Form::close() !!}
</div>
