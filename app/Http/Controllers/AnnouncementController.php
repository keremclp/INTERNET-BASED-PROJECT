<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index(){
        $announcements = Announcements::all();
        return view('announcement.list',[
            'announcements' => $announcements
        ]);
    }
    public function get($product_id){
        $announcement = Announcements::findOrFail($product_id);
        return view('announcement.detail',[
            'announcement' => $announcement
        ]);
    }
    public function create(){
        return view('announcement.create');
    }
    public function store(Request $request){
        try {
            $announcement = Announcements::create([
                'sender_id' => Auth::user()->user_id,
                'title' => $request->title,
                'text' => $request->text,
                'status' => $request->status
            ]);
            return response()->json([
                'status' => 201,
                'message' => 'Announcements Created!',
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'status' => 500,
                'message' => $e->errorInfo[2]
            ];
            return $data;
        }
    }
    public function edit($announcement_id){
        $announcement = Announcements::findOrFail($announcement_id);
        return view('announcement.update',[
            'announcement' => $announcement
        ]);
    }
    public function update($announcement_id,Request $request){
        try {
            $announcement = Announcements::findOrFail($announcement_id)->update([
                //'sender_id' => Auth::user()->user_id,
                'title' => $request->title,
                'text' => $request->text,
                'status' => $request->status
            ]);
            return response()->json([
                'status' => 201,
                'message' => 'Announcement Updated!',
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'status' => 500,
                'message' => $e->errorInfo[2]
            ];
            return $data;
        }
    }
    public function delete($announcement_id){
        try {
            Announcements::findOrFail($announcement_id)->delete();
            return response()->json([
                'status' => 201,
                'message' => 'Announcement Deleted!',
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'status' => 500,
                'message' => $e->errorInfo[2]
            ];
            return $data;
        }
    }
}
