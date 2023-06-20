<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TrafficPolice;
use App\Models\Offense;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

    public function index()
    {
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return "store pro";
    }

    public function show($id)
    {

        return view("Profile.Profile");
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

        if (Auth::guard('web')->check()) {

            // $path_img =  $request->file("image")->store("admin","bilal");
            $admin = User::findOrFail(auth("web")->user()->id);
            $old_pass = $admin->password;
            $old_image = $admin->image;
            $admin->name = $request->Name;
            $admin->email = $request->Email;

            if (!empty($request->image)) {
                $path_img =  $request->file("image")->store("admin", "bilal");
                $admin->image = $path_img;
            } else {
                $admin->image = $old_image;
            }

            if (!empty($request->password)) {
                $admin->password = Hash::make($request->password);
            } else {
                $admin->password = $old_pass;
            }

            $admin->save();
            return back()->with("success", "Data has been updated successfully!");
        }
        if (Auth::guard('police')->check()) {

            $police = TrafficPolice::findOrFail(auth("police")->user()->id);
            $old_pass = $police->password;
            $old_image = $police->image;
            $police->Name = $request->Name;
            $police->email = $request->Email;
            $police->Phone = $request->phone;
            $police->Address = $request->Address;


            if (!empty($request->image)) {
                $path_img =  $request->file("image")->store("police", "bilal");
                $police->image = $path_img;
            } else {
                $police->image = $old_image;
            }

            if (!empty($request->password)) {
                $police->password = Hash::make($request->password);
            } else {
                $police->password = $old_pass;
            }

            $police->save();
            return back()->with("success", "Data has been updated successfully!");
        }
        if (Auth::guard('offense')->check()) {

            $offense = Offense::findOrFail(auth("offense")->user()->id);
            $old_pass = $offense->password;
            $old_image = $offense->image;
            $offense->offender_name = $request->Name;
            $offense->Phone = $request->Phone;


            if (!empty($request->image)) {
                $path_img =  $request->file("image")->store("police", "bilal");
                $offense->image = $path_img;
            } else {
                $offense->image = $old_image;
            }

            if (!empty($request->password)) {
                $offense->password = Hash::make($request->password);
            } else {
                $offense->password = $old_pass;
            }

            $offense->save();
            return back()->with("success", "Data has been updated successfully!");
        }
    }


    public function destroy($id)
    {
        //
    }
}
