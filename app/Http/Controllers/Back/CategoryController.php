<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('back.categories.index',compact('categories'));
    }

    public function create(Request $request)
    {
        $isExistsCategory = Category::whereSlug(Str::slug($request->category_name))->first();
        if($isExistsCategory)
        {
            toastr()->error($request->category_name . ' is available!');
            return redirect()->back();
        }
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->save();
        toastr()->success('Success','Category Successfully Created');
        return redirect()->back();
    }

    public function getCategory(Request $request)
    {
        $category = Category::findOrFail($request->id);
        return response()->json($category);
    }

    public function update(Request $request)
    {
        $isExistsCategory = Category::whereSlug(Str::slug($request->category_name))->whereNotIn('id',[$request->id])->first();
        if($isExistsCategory)
        {
            toastr()->error($request->category_name . ' is available!');
            return redirect()->back();
        }
        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->status = $request->status;
        $category->save();
        toastr()->success('Success','Category Successfully Updated');
        return redirect()->back();
    }


    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->id);
        if($category->id==1)
        {
            toastr()->error('Error','This category cannot be deleted');
            return redirect()->back();
        }
        if($category->articleCount() > 0)
        {
            Article::where('category_id',$category->id)->update(['category_id'=>1]);
            toastr()->success('Success','Category Successfully Deleted');
        }
        $category->delete();
        toastr()->success('Success','Category Successfully Deleted');
        return redirect()->back();
    }


}
