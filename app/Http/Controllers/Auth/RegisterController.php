<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Ranting;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $data = [
            'rantings' => Ranting::all(),
        ];
        return view('auth.register', $data);
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
            'nik' => ['required', 'string', 'max:255', 'unique:users'],
            'nama' => ['required', 'string', 'max:255'],
            'ranting_id' => ['required', 'integer', 'exists:rantings,id'],
            'gender' => ['required', 'string', 'max:255', 'in:laki-laki,perempuan'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'no_hp' => ['required', 'string', 'max:13', 'unique:users'],
            'alamat_indonesia' => ['required', 'string', 'max:255'],
            'alamat_tiongkok' => ['required', 'string', 'max:255'],
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
        $user = User::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'ranting_id' => $data['ranting_id'],
            'gender' => $data['gender'],
            'no_hp' => $data['no_hp'],
            'alamat_indonesia' => $data['alamat_indonesia'],
            'alamat_tiongkok' => $data['alamat_tiongkok'],
        ]);

        $user->assignRole('user');

        return $user;
    }
}
