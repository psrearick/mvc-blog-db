<?php


namespace app\controllers;


use core\Controller;

class SiteController extends Controller
{

    /**
     * @return string
     */
    final public function showHome(): string
    {
        return $this->render('home');
    }

}