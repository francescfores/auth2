<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class RegisterController extends Controller
{
    protected $email;
    protected $name;

    public function getRegister()
    {
        //echo "Aqui va el registre";
        return view('register');
    }

    public function postRegister(Request $request)
    {
        //dd(Input::all());

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->password = bcrypt(
            $request->get('password'));
        $user->email = $request->get('email');
        $user->save();

        $this->email =
        $this->sendRegisterEmail();
        return redirect()->route('auth.login');
        //User::create(Input::all());
        //User::create($request->all());

    }

    public function sendRegisterEmail(){
        $emailData = new \stdClass();

        $emailData -> email = "ffores93@gmail.com"; //ffores93@gmail.com
        $emailData -> name = $this->name;
        $emailData -> subject = "Welcome user" .$this->name;
        $emailData -> footer = "footer here";
        $emailData -> header = "header here";

        $data['name'] = $this->name;
        $data['var2'] = "var2";

        \Mail::send('email.message', $data, function($message) use ($emailData){
            $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'));
            $message->to($emailData->email, $emailData->name);
            $message->subject($emailData->subject);

        }


        );


    }
}
