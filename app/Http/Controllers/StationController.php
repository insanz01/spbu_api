<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    //
    public function index() {
      return Station::all();
    }

    public function show($id) {
      return Station::find($id);
    }

    public function store(Request $r) {
      $this->validate($r, [
        'name' => 'required',
        'description' => 'required',
        'location' => 'required'
      ]);

      return Station::create([
        'name' => $r->json('name'),
        'description' => $r->json('description'),
        'image' => 'spbu.png',
        'location' => 'Yogyakarta',
        'lat' => '-7.8031391',
        'long' => '110.3851081'
      ]);
    }
}
