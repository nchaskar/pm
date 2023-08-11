<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
// use App\Models\Admin;
// use App\Models\Teacher;
// use App\Models\School;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:manager');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.register', ['url' => 'manager']);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function createUser(Request $request)
    {
        //echo '<pre>';print_r($request->all());die;
        /*
        return Validator::make([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        */

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'fname' => $request->first_name,
            'lname' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role,
            'gender'=>$request->gender,
        ]);

        return redirect()->intended('login');
    }

    public function chkemailExists(Request $request)
    {
        $email_id=trim($request->input('email_id'));

        $count = DB::table('users')
                    ->where('email',trim($email_id))
                    ->whereNotNull('email_verified_at')
                    ->count();

        if($count>0){
            echo "false";
        }else{
            echo "true";
        }
    }
    
}
