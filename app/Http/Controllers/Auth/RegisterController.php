<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersReferral;
use App\Models\LevelTasksBindUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/lk';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referral_code' => ['nullable']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Проверяем наличие ключа
        $referralCode = $data['referral_code'] ?? null;

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Генерируем реферальный код для нового пользователя
        $userNewCodeReferral = Str::random(10);

        // Проверка и получение parent_id 
        $userParent = null;
        if ($referralCode) {
            $userParent = UsersReferral::where('code', $referralCode)->value('user_id');
        }

        // создаём реферала в таблице users_referrals
        UsersReferral::create([
            'code' => $userNewCodeReferral,
            'user_id' => $user->id,
            'parent_id' => $userParent
        ]);

        // добавление базовых задач для уровня аккаунта NULL
        $data_level_tasks = array(
            array(
                'user_id'=> $user->id,
                'level_task_id'=> 1,
                'done'=> 0,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ),
            array(
                'user_id'=> $user->id,
                'level_task_id'=> 2,
                'done'=> 0,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ),
        );
        LevelTasksBindUsers::insert($data_level_tasks);

        return $user;
    }
}
