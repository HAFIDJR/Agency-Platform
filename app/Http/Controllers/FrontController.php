<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\projectOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{
    //
    public function index(){
        $projects = Project::orderBy('id', 'desc')->take(6)->get();
        return view('front.index', [
            'projects' => $projects
        ]);
    }

    public function detail(Project $project){
        return view('front.detail', [
            'project' => $project
        ]);
    }
    public function book(){
        return view('front.book');
    }

    public function service(){
        return view('front.services');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'budget'=> 'required|integer',
            'category'=> 'required|string',
            'brief'=> 'required|string|max:65535'
        ]);
        
        DB::beginTransaction();

        try{
            

            $newProjects = projectOrder::create($validated);

            DB::commit();

            return redirect()->route('home')->with('Succses', 'Project created succesfully!');
        }
        catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('Eror', 'System Eror!'.$e->getMessage());
        }
    }
}
