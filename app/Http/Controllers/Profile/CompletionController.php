<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Traits\Auth\SendsEmailConfirmations;
use App\Traits\Profile\Completes;
use App\User;
use Validator;

class CompletionController extends Controller
{
    use Completes, SendsEmailConfirmations;

    protected function rules($haveEmail, $havePassword)
    {
        $list = [
            'name' => 'max:255',
            'username' => 'required|min:3|max:255|unique:users',
           // 'g-recaptcha-response'  => 'required|captcha'
        ];
        if ($haveEmail) {
            $list['email'] = 'required|email|unique:users|max:255';
        }
        if ($havePassword) {
            $list['password'] = 'required|min:6';
        }

        return $list;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $haveEmail, $havePassword)
    {
        return Validator::make($data, $this->rules($haveEmail, $havePassword));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $user = false;
        if (isset($data['email'])) {
            $user = User::firstOrCreate(['email' => $data['email']]);
        }
        if (!$user) {
            if (!isset($data['username'])) {
                $data['username'] = '';
            }

            $user = User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
            ]);
        }
        $this->sendEmailConfirmation($user);

        return $user;
    }
}
