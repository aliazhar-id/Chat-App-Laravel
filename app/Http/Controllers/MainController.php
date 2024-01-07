<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
  public function index()
  {
    return view('home', [
      'title' => 'Home',
      'friends' => User::whereNot("id_user", auth()->user()->id_user)->get()
    ]);
  }
}
