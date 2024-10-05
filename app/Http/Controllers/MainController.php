<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Метод для отображения главной страницы
    public function index()
    {
        return view('welcome');
    }

    // Метод для отображения страницы условий использования
    public function terms()
    {
        return view('terms');
    }
}
