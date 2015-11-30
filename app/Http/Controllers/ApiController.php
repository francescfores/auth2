<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //
    public function checkEmailExists(
        Request $request)
    {
        //$email = Input::get('email');
        $email = $request->get('email');
        \Debugbar::info("comprovant email " .
            $email);
        //TODO comprovar email correctament
        if ($this->checkEmail($email)) {
            return "true";
        } else {
            return "false";
        }
    }
    private function checkEmail($email)
    {
        $user =
            User::where('email',$email)->first();
        if ($user == null) {
            return true;
        }
        return false;
    }
}

