<?php


namespace controllers;


use core\Controller;
use core\Request;
use RegisterModel;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        if ($request->isPost()) {
            $model = new RegisterModel();

            return 'Handling register sumbitted data UwU';
        }

        $this->setLayout('guest_base');
        return $this->render('register');
    }

}