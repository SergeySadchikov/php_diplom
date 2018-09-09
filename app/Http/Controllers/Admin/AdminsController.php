<?php

namespace FAQ\Http\Controllers\Admin;

use FAQ\Repositories\AdminsRepository;
use FAQ\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use FAQ\Answer;

class AdminsController extends AdminController
{
    public function __construct(AdminsRepository $adminsRepository)
    {
        parent::__construct();
        $this->adminsRepository = $adminsRepository;
        $this->template = config('app.theme').'.admin.admins';
    }

    public function index()
    {
        $this->title = 'Управление адиминистраторами';
        $admins = $this->adminsRepository->get();
        $this->content = view(config('app.theme').'.admin.admins_index')->with('admins', $admins)->render();
        return $this->renderOutput();
    }

    public function create()
    {
        $this->title = 'Создать нового администратора';
        $this->content = view(config('app.theme').'.admin.admins_create')->render();
        return $this->renderOutput();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|confirmed'
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $admin = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        return  redirect('admin/admins');
    }

    public function edit($id)
    {
        $this->title = 'Изменить админминистратора';
        $admin = $this->adminsRepository->one($id);
        $this->content = view(config('app.theme').'.admin.admins_create')->with('admin', $admin)->render();
        return $this->renderOutput();
    }

    public function update(Request $request, $id)
    {
        if(!empty($request->input('password'))) {
            $data = $request->all();
        } else {
            $data = $request->except(['password','password_confirmation']);
        }
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id
        ]);
        $validator->sometimes('password', 'required|min:5|confirmed', function ($input)
        {
            if (!empty($input->password)) {
                return TRUE;
            }
            return FALSE;

        });
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $admin = $this->adminsRepository->one($id);
        $admin->update($data);
        return redirect('admin/admins');
    }
    public function destroy($id)
    {
        $answers = Answer::where('user_id', $id)->get();
        if (!$answers->isEmpty()) {
            foreach ($answers as $answer) {
                $answer->question->update([
                    'status' => 'Ожидает ответ'
                ]);
            }
        }
        $admin = $this->adminsRepository->one($id);
        $admin->delete();
        return redirect('/admin/admins');
    }
}
