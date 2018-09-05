{!! Form::open(['url' => (isset($admin->id)) ? route('admins.update',['id'=>$admin->id]) :route('admins.store'),'method'=>'POST','enctype'=>'multipart/form-data']) !!}

<ul>
    <li class="text-field">
        <label for="name-contact-us">
            <span class="label">Имя:</span>
            <br />
            <span class="sublabel">Имя</span><br />
        </label>
        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
            {!! Form::text('name',isset($admin->name) ? $admin->name  : old('name'), ['placeholder'=>'Введите имя(логин)']) !!}
        </div>
    </li>

    <li class="text-field">
        <label for="name-contact-us">
            <span class="label">Email:</span>
            <br />
            <span class="sublabel">Email</span><br />
        </label>
        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
            {!! Form::text('email',isset($admin->email) ? $admin->email  : old('email'), ['placeholder'=>'Введите email']) !!}
        </div>
    </li>

    <li class="text-field">
        <label for="name-contact-us">
            <span class="label">Пароль:</span>
            <br />
            <span class="sublabel">Пароль</span><br />
        </label>
        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
            {!! Form::password('password', ['placeholder'=>'Введите пароль']) !!}
        </div>
    </li>

    <li class="text-field">
        <label for="name-contact-us">
            <span class="label">Повтор пароля:</span>
            <br />
            <span class="sublabel">Повтор пароля</span><br />
        </label>
        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
            {!! Form::password('password_confirmation',['placeholder'=>'Повторите пароль']) !!}
        </div>
    </li>

    @if(isset($admin->id))
        <input type="hidden" name="_method" value="PUT">
    @endif

    <li class="submit-button">
        {!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
    </li>

</ul>
{!! Form::close() !!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
