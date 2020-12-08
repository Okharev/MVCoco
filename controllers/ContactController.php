<?php


namespace controllers;

use core\Controller;

/**
 * Class ContactController
 * @package controllers
 */
class ContactController extends Controller
{

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
     * @return string
     */
    public function handleContact()
    {
        return 'Im currently working ow your post data be patient 😘';
    }
}