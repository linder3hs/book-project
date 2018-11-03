<?php

namespace App\Http\Controllers\Auth;

use App\Mail\ConfirmationEmail;
use App\User;
use App\Http\Controllers\Controller;
use Couchbase\Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Socialite;
class RegisterController extends Controller {
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'apellido' => 'required|max:255',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'nacionalidad' => $data['nacionalidad'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'apellido' => $data['apellido'],
            'avatar' => 'http//lorempixel/300/300/people?' . random_int(1,100),
        ]);
    }

    public function register(Request $request) {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        Mail::to($user->email)->send(new ConfirmationEmail($user));
        return back()->with('status', 'Confirma tu cuenta, Te hemos enviado un enlace a tu correo.');
    }

    public function confirmEmail($token) {
        User::whereToken($token)->firstOrFail()->hasVerified();
        return redirect('login')->with('status', 'Gracias por confirmar tu email.');
    }

    public function redirectToProvider() {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback() {
        try {
            $socialUser = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('/');
        }

        $user = User::where('facebook_id', $socialUser->getId())->first();
        if (!$user)
            User::create([
               'facebook_id' => $socialUser->getId(),
               'name' => $socialUser->getName(),
               'email' => $socialUser->getEmail(),
            ]);

        auth()->login($user);
        return redirect()->to('/home');
    }
}
