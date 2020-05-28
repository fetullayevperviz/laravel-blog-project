<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index()
    {
    	$settings = Settings::find(1);
    	return view('back.settings.index',compact('settings'));
    }

    public function update(Request $request)
    {
       $request->validate([
             'logo'    => 'image|mimes:jpeg,jpg,png|max:2048',
             'favicon' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);
       	
       $settings = Settings::find(1);
       $settings->title = $request->title;
       $settings->status = $request->status;
       $settings->facebook = $request->facebook;
       $settings->twitter = $request->twitter;
       $settings->github = $request->github;
       $settings->linkedin = $request->linkedin;
       $settings->youtube = $request->youtube;
       $settings->instagram = $request->instagram;

       if($request->hasFile('logo'))
       {
       	  $logo = Str::slug($request->title).'-logo.'.$request->logo->getClientOriginalExtension();
       	  $request->logo->move(public_path('uploads/logo'),$logo);
       	  $settings->logo = 'uploads/logo/'.$logo;
       }

       if($request->hasFile('favicon'))
       {
       	  $favicon = Str::slug($request->title).'-favicon.'.$request->favicon->getClientOriginalExtension();
       	  $request->favicon->move(public_path('uploads/favicon'),$favicon);
       	  $settings->favicon = 'uploads/favicon/'.$favicon;
       }
       $settings->save();
       toastr()->success('Success','Settings Successfully Updated');
       return redirect()->back();
    }
}
