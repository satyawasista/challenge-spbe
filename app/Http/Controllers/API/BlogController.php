<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\blogs;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = blogs::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success',$data);
        }else {
            return ApiFormatter::createApi(500,'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'tile' => 'required',
                'description'=> 'required',
                'photo' => 'required',
                'user_id' => 'required',
            ]);
            $blog = blogs::create([
                'title' =>$request->title,
                'description' =>$request->description,
                'photo' =>$request->photo,
                'user_id' =>$request->user_id,

            ]);

            $data= blogs::where('id','=',$blog->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success',$data);
            }else {
                return ApiFormatter::createApi(500,'Failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(500,'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= blogs::where('id','=',$id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success',$data);
            }else {
                return ApiFormatter::createApi(500,'Failed');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $request->validate([
                'tile' => 'required',
                'description'=> 'required',
                'photo' => 'required',
                'user_id' => 'required',
            ]);

            $blog = blogs::findOrFail($id);

            $blog ->update([
                'title' =>$request->title,
                'description' =>$request->description,
                'photo' =>$request->photo,
                'user_id' =>$request->user_id,

            ]);

            $data= blogs::where('id','=',$blog->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success',$data);
            }else {
                return ApiFormatter::createApi(500,'Failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(500,'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $blog = blogs::FindOrFail($id);

            $data =$$blog->delete();
    
                if ($data) {
                    return ApiFormatter::createApi(200, 'Success Destroy data');
                }else {
                    return ApiFormatter::createApi(500,'Failed');
                }
        } catch (Exception $error) {
            return ApiFormatter::createApi(500,'Failed');
        }
     
    }
}
