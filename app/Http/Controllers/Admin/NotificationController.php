<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications =  Notification::paginate();         
        // dd($orders);
        return response()->view('Admin.Notifications.index' , ['notifications' => $notifications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('Admin.Notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|min:4|max:40',
            'description'=>'required',
            'image'=>'nullable',
        ]);
        // 1 :Eloquent (Model)
        $notification = new Notification();
        $notification->title = $request->input("title");
        $notification->description = $request->input("description");

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $image_name = time() . '_image_' . $notification->title . '.' . $file->getClientOriginalExtension();
            $file->storeAs("notification", $image_name , ['disk' => 'public']);
            $notification->image = "notification/" . $image_name;

        }

        // $meating->image = $request->input("image");
        $saved = $notification->save();
        return redirect()->route('notifications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $notification = Notification::findOrFail($id);
        return response()->view('Admin.Notifications.edit', ['notification' => $notification]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required|string|min:4|max:40',
            'description'=>'required',
            'image'=>'nullable',
        ]);

        // $user = User::find($id);
        $notification = Notification::findOrFail($id);
        $notification->title = $request->input("title");
        $notification->description = $request->input("description");

        
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $image_name = time() . '_image_' . $notification->title . '.' . $file->getClientOriginalExtension();
            $file->storeAs("category", $image_name , ['disk' => 'public']);
            $notification->image = "category/" . $image_name;

        }


        $saved = $notification->save();

        return redirect()->route('notifications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = Notification::destroy($id);

        return redirect()->back();
    }
}
