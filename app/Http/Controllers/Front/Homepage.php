<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Settings;

class Homepage extends Controller
{
    
    public function __construct()
    {
        if(Settings::find(1)->status == 0)
        {
           return redirect()->to('site-offline')->send();
        }
        view()->share('pages',Page::where('status',1)->orderBy('order','ASC')->get());
        view()->share('categories',Category::where('status',1)->get());
    }

    public function index()
    {
        $data['articles'] = Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
                  $query->where('status',1);
               })->orderBy('created_at','DESC')->paginate(10);

        //$data['articles']->withPath(url('sehife'));  //paginate de linki deyismek istesek yaza bilerik
        return view("front.homepage",$data);
    }

    public function single($slug)
    {
        //$category = Category::whereSlug($category)->first() ?? abort(403,'Yazı tapılmadı');
        $article = Article::whereSlug($slug)->first() ?? abort(403,'Yazı tapılmadı');
        $article->increment('hit');
        $data['article'] = $article;
        return view('front.single',$data);

        //->whereCategoryId($category->id)
    }

    public function category($slug)
    {
        $category=Category::whereSlug($slug)->first() ?? abort(403,'Kateqoriya tapılmadı');
        $data['category'] = $category;
        $data['articles']=Article::where('category_id',$category->id)->where('status',1)->orderBy('created_at','DESC')->paginate(1);
        return view('Front.category',$data);
    }

    public function page($slug)
    {
        $page = Page::whereSlug($slug)->first() ?? abort(403,'Səhifə tapılmadı');
        $data['page'] = $page;
        return view('front.page',$data);
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactPost(Request $request)
    {
       $rules = [
                   'fullname'=>'required|min:5',
                   'email'=>'required|email',
                   'subject'=>'required',
                   'message'=>'required|min:10'
                ];
       $validate = Validator::make($request->post(),$rules);
       if($validate->fails())
       {
           return redirect()->route('contact')->withErrors($validate)->withInput();
       }
       
       
        Mail::send([],[],function($message) use($request) {
                  $message->from('contact@blogsite.com','Blog Site');
                  $message->to('parviz.fetullayev.project@gmail.com');
                  $message->setBody('Sent the message : '.$request->fullname.'<br/>
                  Senders email : '.$request->email.'<br/>
                  Subject : '.$request->subject.'<br/>
                  Message : '.$request->message.'<br/><br/>
                  Message date : '.now().'','text/html');
                  $message->subject($request->fullname.' sent a message from communication');
       });
        
       /*
       $contact = new Contact;
       $contact->fullname=$request->fullname;
       $contact->email=$request->email;
       $contact->subject=$request->subject;
       $contact->message=$request->message;
       $contact->save();*/
       return redirect()->route('contact')->with('success','Mesajınız göndərildi. Qısa bir zamanda sizə cavab göndəriləcək');
    }
}
