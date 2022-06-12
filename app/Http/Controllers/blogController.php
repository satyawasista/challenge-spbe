<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use App\Models\User;
use Faker\Extension\PhoneNumberExtension;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use App\Services\ServiceBlog;
use Symfony\Component\HttpFoundation\ServerBag;

class blogController extends Controller
{
    protected $ServiceBlog;
    function __construct(
        ServiceBlog $ServiceBlog
    ){
        $this->ServiceBlog =$ServiceBlog;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = blogs::with('User')-> paginate();
        return view('blog.blog', ['blog'=>$blog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::all();
        return view('blog.blogcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $data = blogs::create($request->except(['_token','submit']));
       if($request->hasFile('photo')){
        $request->file('photo')->move('photoblog/',$request->file('photo')->getClientOriginalName());
        $data->photo = $request->file('photo')->getClientOriginalName();
        $data->save();
       }
        return redirect('/blog');
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
        $blog = blogs::find($id);
        return view('blog.blogedit',compact(['blog']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request )
    {
        $blog = blogs::find($id);
        $blog->update($request->except(['_token','submit']));
        if($request->hasFile('photo')){
            $request->file('photo')->move('photoblog/',$request->file('photo')->getClientOriginalName());
            $blog->photo = $request->file('photo')->getClientOriginalName();
            $blog->save();
           }
        return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = blogs::find($id);
        $blog->delete();
        return redirect('/blog');
    }
}
