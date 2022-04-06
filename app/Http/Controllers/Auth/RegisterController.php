<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'unique:users,phone', 'min:11', 'max:11'],
            'img' => ['required', 'mimes:jpg,svg,png,jpeg,webp', 'dimensions:max_width=300,max_height=300']

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
        
        $extension=$data['img']->getClientOriginalExtension();
        $path = public_path('/storage/image/');
        if(!File::exists($path)){
            mkdir($path);
        }
        $img_name= url('/'). '/storage/image/'.uniqid().'.'.$extension;
        $data['img']->move($path, $img_name);
        
            $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'img' => $img_name,

        ]);
        $student = new Student();
        $student->user_id= $user['id'];
        $student->department_id = $data['department_id'];
        $student->board_roll = $data['board_roll'];
        $student->registation_number = $data['regi_number'];
        $student->session = $data['session'];
        $student->semester = $data['semester'];
        $student->exam_year = $data['exam_year'];
        $student->save();
        return $user;
    
    }
}
