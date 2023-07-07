<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Room;
use App\Models\Category;

class RoomController extends Controller
{
    public function index(Request $request, $id)
    {
        $university = University::where('id', $id)->get();
        $rooms = [];
        if (!$university->isEmpty())
            $rooms = Room::where('university_id', $university[0]->id)->get();
        $categories = Category::where('inherit', null)->get();
        $subCategories = Category::whereNotNull('inherit')->get();
        return view('UniversityRoomView', [
            'university' => $university,
            'rooms' => $rooms,
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }

    public function delete($id)
    {
        $room = Room::find($id);
        $university_id = null;
        try {
            $university_id = $room->university_id;
        } catch (\Throwable $th) {}
        if ($room) $room->delete();
        if ($university_id) return redirect()->route('university', ['id' => $university_id]);
        return redirect()->route('home');
    }

    public function formReciver(Request $request) {
        $university_id = $request->input('university_id');
        $category_id = $request->input('category_id');
        $sub_category_id = $request->input('sub_category_id');

        if ($category_id != '' && $sub_category_id != '') {
            $university = University::where('id', $university_id)->get();
            $university = $university[0];
            $rooms = Room::where('university_id', $university_id)->get();
            if (count($rooms) < $university->max_rooms) {
                $room = new Room();
                $room->university_id = $university_id;
                $room->category_id = $category_id;
                $room->sub_category_id = $sub_category_id;
                $room->save();
            }
        }

        return redirect()->route('university', ['id' => $university_id]);
    }
}
