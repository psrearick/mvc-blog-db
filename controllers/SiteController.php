<?php


namespace app\controllers;


use app\models\User;
use app\src\Controller;

class SiteController extends Controller
{
public function showHome() {
    return $this->render('home');
}

}