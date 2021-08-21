<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Bid;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BuyerContestRequest;
use App\Http\Requests\BuyerProjectRequest;
use App\Http\Requests\profileRequest;
use Illuminate\Support\Facades\DB;
use Validator;


class BlogController extends Controller
{
    public function store_blog(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'title'=> 'required|max:100',
            'category'=>'required|max:100',
          
        ]);
        if($validator->fails())
        {
            return response()->json([
                'validate_err'=> $validator->messages(),
            ]);
        }
        else{
            $blog = new Blog ;
            $blog->title = $req->input('title');
            $blog->category = $req->input('category');
            $blog->save();   
            return response()->json(
            [
                'status'=>200,
                'message'=> 'create blog',
            ]
            );
        }
        
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return response()->json(
            [
                'status'=>200,
                'blog'=> $blog,
            ]
        );
    }
    
    public function update(Request $req,$id)
    {
        $validator = Validator::make($req->all(),[
            'title'=> 'required|max:100',
            'category'=>'required|max:100',
          
        ]);
        if($validator->fails())
        {
            return response()->json([
                'validate_err'=> $validator->messages(),
            ]);
        }
        else{
            $blog= Blog::find($id);
            $blog->title = $req->input('title');
            $blog->category = $req->input('category');
            $blog->update();
            return response()->json(
                [
                    'status'=>200,
                    'message'=> 'Blog Updated Successfullty',
                ]
            );
        }
        
    }

    public function index()
    {
        $blogs = Blog::all();
        return response()->json(
            [
                'status'=>200,
                'blogs'=> $blogs,
            ]
            );
    }

    public function delete($id)
    {
        $blog  = Blog::find($id);
        $blog->delete();
        return response()->json(
            [
                'status'=>200,
                'message'=> 'Blog Deleted Successfullty',
            ]
        );
    }
}
