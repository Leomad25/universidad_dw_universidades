<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Room;

class UniversityController extends Controller
{
    public function index()
    {
        $universites = University::all();
        return view('UniversityView', ['universites' => $universites]);
    }

    public function create()
    {
        return view('UniversityCreateView', ['isUpdate' => false]);
    }

    public function updateById($id)
    {
        $university = University::find($id);
        return view('UniversityCreateView', ['isUpdate' => true, 'university' => $university]);
    }

    public function delete($id)
    {
        $university = University::find($id);
        $rooms = Room::where('university_id', $university->id)->get();
        foreach ($rooms as $room) $room->delete();
        if ($university) $university->delete();
        return redirect()->route('home');
    }

    public function formReciver(Request $request, $id = null)
    {
        $nit = $request->input('nit');
        $name = $request->input('name');
        $address = $request->input('address');
        $email = $request->input('email');
        $date = $request->input('date');
        $phone = $request->input('phone');
        $maxRooms = $request->input('max_rooms');
        
        if ($id) {
            $university = University::find($id);
            if ($university) {
                $university->nit = $nit;
                $university->name = $name;
                $university->address = $address;
                $university->email = '\''.$email.'\'';
                $university->date = $date;
                $university->phone = $phone;
                $university->max_rooms = $maxRooms;
                $university->save();
            }
        } else {
            $university = new University();
            $university->nit = $nit;
            $university->name = $name;
            $university->address = $address;
            $university->email = '\''.$email.'\'';
            $university->date = $date;
            $university->phone = $phone;
            $university->max_rooms = $maxRooms;
            $university->save();
        }
        return redirect()->route('home');
    }
}
