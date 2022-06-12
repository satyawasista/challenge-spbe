<?php 

namespace  App\Services;

use App\Models\blogs;
use PhpParser\Node\Expr\FuncCall;

class ServiceBlog { 

    public function getData()

{
    return blogs::with('getData')->get();
}

    public function find($blog_id)
    {
        return blogs::with('createdUser')->where('id',$blog_id)->first();
    }
    public function create($data=[])
    {
        return blogs::crete ([
            'id' => $data['id'],
            'title' =>  $data['title'],
            'description' => $data['description'],
            'photo' => $data['photo'],
            'created_user_id'=> $data ['user_id'],
        ]);
    }

}
