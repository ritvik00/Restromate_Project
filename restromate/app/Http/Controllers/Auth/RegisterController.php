<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

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
    protected $redirectTo;
    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 'superadmin':
                $this->redirectTo = '/superadmin';
                return $this->redirectTo;
                    break;
            case 'admin':
            $this->redirectTo = '/admin';
            return $this->redirectTo;
                break;
            case 'sub admin':
                $this->redirectTo = '/subadmin';
                return $this->redirectTo;
                break;

                case 'sub admin':
                    $this->redirectTo = '/restaurant';
                    return $this->redirectTo;
                    break;
            case 'Company':
                $this->redirectTo = '/deliveryboy';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
         
        // return $next($request);
    } 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');

        $this->middleware('guest')->except('logout');
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
            'user_name' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phoneno' => ['required', 'numeric','digits:10', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
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

      
       return User::create([
            'user_name' => $data['user_name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phoneno' => $data['phoneno'],
            'is_active' => '0',
            'role_id' => 3
        ]);
        
    }
}
