<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Bid;
use App\Models\Contest;
use Illuminate\Http\Request;
use App\Http\Requests\BuyerContestRequest;
use App\Http\Requests\BuyerProjectRequest;
use App\Http\Requests\profileRequest;
use Illuminate\Support\Facades\DB;
use Validator;


class ProjectController extends Controller
{
    public function list()
    {
        $projects = Buyer::all();
        return response()->json(
            [
                'status'=>200,
                'projects'=> $projects,
            ]
            );
    }
    
    public function create(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'title'=> 'required|max:100',
            'project_file'=>'required|max:100',
            'price'=>'required|numeric|max:100',
            'time'=>'required|max:100',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'validate_err'=> $validator->messages(),
            ]);
        }
        else
        {
            $project=new Buyer;
            $project->title=$req->input('title');
            $project->project_file = $req->input('project_file') ;
            $project->price=$req->input('price');
            $project->time=$req->input('time');
            $project->save();
            return response()->json(
                [
                    'status'=>200,
                    'message'=> 'Project Posted',
                ]
            );
        }
        
    }

    
    public function edit($id)
    {
        $project = Buyer::find($id);
        return response()->json(
            [
                'status'=>200,
                'project'=> $project,
            ]
        );
    }
    
    public function update(Request $req,$id)
    {

        $validator = Validator::make($req->all(),[
            'title'=> 'required|max:100',
            'project_file'=>'required|max:100',
            'price'=>'required|numeric|max:100',
            'time'=>'required|max:100',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'validate_err'=> $validator->messages(),
            ]);
        }
        else{
            $project= Buyer::find($id);
            $project->title=$req->input('title');
            $project->project_file = $req->input('project_file') ;
            $project->price=$req->input('price');
            $project->time=$req->input('time');
            $project->update();
            return response()->json(
                [
                    'status'=>200,
                    'message'=> 'Project Updated Successfullty',
                ]
            );
        }
        
    }
    
    public function delete($id)
    {
        $project  = Buyer::find($id);
        $project->delete();
        return response()->json(
            [
                'status'=>200,
                'message'=> 'Project Deleted Successfullty',
            ]
        );
    }
   
}
