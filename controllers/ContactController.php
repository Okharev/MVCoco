<?php


namespace controllers;

use core\Application;
use core\Controller;
use core\Request;

/**
 * Class ContactController
 * @package controllers
 */
class ContactController extends Controller
{

    /**
     * @return string|string[]
     */
    public function index()
    {
        $params = [
            'email' => 'gigi@gmail.com',
            'tel' => '06 17 64 76 12',
            'name' => 'GEORGE'
        ];

        return $this->render('home', $params);
    }

    /**
     * @return string|string[]
     */
    public function contact()
    {
        return $this->render('contact');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function handleContact(Request $request)
    {
        $body = $request->getBody();

        return 'Im currently working ow your post data be patient 😘';
    }
}