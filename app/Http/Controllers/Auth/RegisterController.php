<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\NewUserMessage;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

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
            'surnames' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nationality' => ['required', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*
         * Creates a new user into the database.
         */
        $user = User::create([
            'name' => $data['name'],
            'surnames' => $data['surnames'],
            'email' => $data['email'],
            'nationality' => $data['nationality'],
            'type' => 'user',
            'program' => $data['program'],
            'industry' => $this->checkArrayField($data, 'industry'),
            'university' => $this->checkArrayField($data, 'university'),
            'password' => Hash::make($data['password']),
        ]);

        /*
         * Sents a welcome email to the recent registered user once it has been inserted in the database.
         *
         * PRODUCTION: Replace the default email to the one the users provide in the form.
         */
        Mail::to($user['email'])->queue(new NewUserMessage($user));

        return $user;
    }

    /**
     * Checks array field is not empty and parse it into a JSON format to be introduced
     * to the database as a tuple (tupla).
     *
     * @param $data
     * @param $field
     * @return User|null
     */
    protected function checkArrayField($data, $field) {
        if (isset($data[$field])) {
            return $this->prepareArray($data[$field]);
        }

        return null;
    }

    /**
     * Checks if the given argument is an Array and parse it passed into a JSON format.
     *
     * @param $value
     * @return false|string
     */
    protected function prepareArray($array) {
        if (is_array($array)) {
            return json_encode($array);
        }

        return $value;
    }

    /**
     * Flashes a set of parameters into the session as to get the register form ready with the corresponding inputs loaded and
     * selected depending on the source where the request was made. Then redirects the user to the register form.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function registerWithOptions(Request $request) {
        session()->flash('options', $this->setOptions($request->all()));
        return redirect()->route('register');
    }

    /**
     * Creates the array is going to be flashed into the session by the @see registerWithOptions method.
     *
     * @param array $parameters
     * @return array
     */
    private function setOptions(Array $parameters) {
        $found = false;
        $options = [];
        while ($parameter = current($parameters) && $found !== true) {
            for ($y = 0; $y < count(__('content.programs')) && $found !== true; $y++) {
                $pattern = '/^' . __('content.programs')[$y]['value'] . '$/';
                if (preg_match($pattern, key($parameters))) {
                    $found = true;
                    $options[key($parameters)] = current($parameters);
                }
            }
            next($parameters);
        }

        $options['program'] = $parameters['program'];
        return $options;
    }
}
