<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Category;
use App\Post;
use App\Tag;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::all();

       return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $category = Category::all();
       $tag = Tag::all();

       
       if($category->count()==0 || $tag->count()==0 )
       {

       Session::flash('info','You must have some categories and Tags before creating post');
       
       return redirect()->back();

       }
    
        return view('admin.post.create', compact('category'))->with('tag',Tag::all()); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [

        'title' =>'required',
        'featured' =>'required|image',
        'content' =>'required|max:255',
        'category_id'=> 'required',
        'tags'=> 'required'

       ]);

   

       $featured = $request->featured;
       $featured_new_name = time().$featured->getClientOriginalName();
       $featured->move('uploads/posts', $featured_new_name);

    
      $post = Post::create([

      'title' => $request->title,
      'content' => $request->content,
      'featured' => 'uploads/posts/'. $featured_new_name,
      'category_id' => $request->category_id,

      'slug'=>str_slug($request->title),

       'user_id' =>Auth::id()

      ]);

      $post->tags()->attach($request->tags);

      $post->save();

       Session::flash('success','Posts Created Successfully');

       return redirect()->route('posts.index');

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
        $post = Post::find($id);

        return view('admin.post.edit',compact('post','id'))->with('category',Category::all())
           ->with('tag',Tag::all());
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
        $this->validate($request,[

         'title'=>'required',
         'content'=>'required',
         'category_id'=>'required'
        ]);


         $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request ->featured;

          $featured_new_name = time() . $featured->getClientOriginalName();

          $featured ->move('uploads/posts',$featured_new_name);

          $post->featured = 'uploads/posts/'.$featured_new_name;

        }
         $post->title = $request->title;
         $post->content =$request->content;
         $post->category_id =$request->category_id;

         $post->tags()->sync($request->tags);

         $post->save();


         Session::flash('success','You have successfully updated');

         return redirect()->route('posts.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        Session::flash('success','Your  Post is successfully deleted ');

        return redirect()->back();
    }

    public function trash(){
    
      $posts = Post::onlyTrashed()->get();

     return view('admin.post.trashed',compact('posts'));
    }

}
