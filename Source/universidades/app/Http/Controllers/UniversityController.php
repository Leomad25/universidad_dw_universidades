<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;

class UniversityController extends Controller
{
    public function index()
    {
        $universites = University::all();
        return view('UniversityView', ['universites' => $universites]);
    }

    public function create()
    {
        return view('UniversityCreateView');
    }

    public function formReciver(Request $request)
    {
        $nit = $request->input('nit');
        $name = $request->input('name');
        $address = $request->input('address');
        $email = $request->input('email');
        $date = $request->input('date');
        $phone = $request->input('phone');
        $maxRooms = $request->input('max_rooms');

        $university = new University();

        $university->nit = $nit;
        $university->name = $name;
        $university->address = $address;
        $university->email = '\''.$email.'\'';
        $university->date = $date;
        $university->phone = $phone;
        $university->max_rooms = $maxRooms;

        $university->save();

        return redirect()->route('home');
    }
}
