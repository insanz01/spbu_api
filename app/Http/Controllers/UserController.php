<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // api start Here
    public function index() {
      return User::all();
    }

    public function show($id) {
      return User::find($id);
    }

    public function auth(Request $req) {
      $this->validate($req, [
        'name' => 'required',
        'password' => 'required'
      ]);

      return User::where('name', $req->json('name'))->first();
    }

    public function store(Request $req) {
      $this->validate($req, [
        'name' => 'required',
        'password' => 'required'
      ]);

      return User::create([
        'name' => $req->json('name'),
        'password' => bcrypt($req->json('password'))
      ]);
    }
}
