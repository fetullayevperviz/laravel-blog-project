<?php

namespace App\Http\Controllers\Back;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at','DESC')->get();
        //$data['articles'] = $articles;
        return view('back.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('back.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
             'title'    => 'required|min:3',
             'category' => 'required',
             'content'  => 'required',
             'image'    => 'required|image|mimes:jpeg,jpg,png|max:1024'
        ]);

        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category;
        $article->slug = Str::slug($request->title);
        if($request->hasFile('image'))
        {
            $imageName = rand(1,1000000).Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image = 'uploads/'.$imageName;
        }
        $article->save();
        toastr()->success('Success','Article Successfully Created');
        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('back.articles.update',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'    => 'required|min:3',
            'category' => 'required',
            'content'  => 'required',
            'image'    => 'image|mimes:jpeg,jpg,png|max:1024'
       ]);

       $article = Article::findOrFail($id);
       $article->title = $request->title;
       $article->content = $request->content;
       $article->category_id = $request->category;
       $article->slug = Str::slug($request->title);
       $article->status = $request->status;

       if($request->hasFile('image'))
       {
           $imageName = rand(1,1000000).Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
           $request->image->move(public_path('uploads'),$imageName);
           $article->image = 'uploads/'.$imageName;
       }
       $article->save();
       toastr()->success('Success','Article Successfully Updated');
       return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
       Article::find($id)->delete();
       toastr()->success('Success','Article moved to deleted articles box');
       return redirect()->route('admin.articles.index');
    }

    public function deleted()
    {
        $articles = Article::onlyTrashed()->orderBy('deleted_at','DESC')->get();
        return view('back.articles.deleted',compact('articles'));
    }

    public function recover($id)
    {
        Article::onlyTrashed()->find($id)->restore();
        toastr()->success('Success','Article Successfully Recovered');
        return redirect()->back();
    }

    public function hardDelete($id)
    {
       $article = Article::onlyTrashed()->find($id);
       if(File::exists($article->image))
       {
           File::delete(public_path($article->image));
       }
       $article->forceDelete();
       toastr()->success('Success','Article Successfully Deleted');
       return redirect()->back();
    }

}
