<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
    	$pages = Page::all();
    	return view('back.pages.index',compact('pages'));
    }

    public function create()
    {
    	return view('back.pages.create');
    }

    public function post(Request $request)
    {
    	$request->validate([
             'title'    => 'required|min:3',
             'content'  => 'required',
             'image'    => 'required|image|mimes:jpeg,jpg,png|max:1024'
        ]);

        $lastPageOrder = DB::table('pages')->orderBy('id','DESC')->latest()->first();
        $id = $lastPageOrder->id;
        
        $page = new Page;
        $page->title = $request->title;
        $page->content = $request->content;
        $page->slug = Str::slug($request->title);
        $page->order = $id+1;
        if($request->hasFile('image'))
        {
            $imageName = rand(1,1000000).Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/pages'),$imageName);
            $page->image = 'uploads/pages/'.$imageName;
        }
        $page->save();
        toastr()->success('Success','Page Successfully Created');
        return redirect()->route('admin.page.index');
    }

    public function update($id)
    {
    	$page = Page::findOrFail($id);
    	return view('back.pages.update',compact('page'));
    }

    public function updatePost(Request $request, $id)
    {
       $request->validate([
            'title'    => 'required|min:3',
            'content'  => 'required',
            'image'    => 'image|mimes:jpeg,jpg,png|max:1024'
       ]);

       $page = Page::findOrFail($id);
       $page->title = $request->title;
       $page->content = $request->content;
       $page->slug = Str::slug($request->title);
       $page->status = $request->status;
       
       if(File::exists($page->image))
       {
           File::delete(public_path($page->image));
       }

       if($request->hasFile('image'))
       {
           $imageName = rand(1,1000000).Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
           $request->image->move(public_path('uploads/pages/'),$imageName);
           $page->image = 'uploads/pages/'.$imageName;
       }
       $page->save();
       toastr()->success('Success','Page Successfully Updated');
       return redirect()->route('admin.page.index');
    }

    public function delete($id)
    {
       $page = Page::find($id);
       if(File::exists($page->image))
       {
           File::delete(public_path($page->image));
       }
       $page->delete();
       toastr()->success('Success','Page Successfully Deleted');
       return redirect()->back();
    }

    public function orders(Request $request)
    {
       foreach ($request->get('page') as $key => $order) 
       {
           Page::where('id',$order)->update(['order'=>$key]);

       }
    }
}
