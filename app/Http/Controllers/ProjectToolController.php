<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\projectTool;
use Illuminate\Http\Request;
use App\Models\tool;
use Illuminate\Support\Facades\DB;

class ProjectToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(project $project)
    {
        //
        $tools = tool::orderBy('id', 'desc')->get();
        return view('admin.project_tools.create', [
            'tools' => $tools,
            'project' => $project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, project $project)
    {
        //
        $validated = $request->validate([
            'tool_id' => 'required|integer',
        ]);
        
        DB::beginTransaction();

        try{
            $validated['project_id'] = $project->id;
            $assignTool = projectTool::updateOrCreate($validated);

            DB::commit();

            return redirect()->back()->with('Succses', 'Project created succesfully!');
        }
        catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('Eror', 'System Eror!'.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(projectTool $projectTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projectTool $projectTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, projectTool $projectTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projectTool $projectTool)
    {
        //
         try{
            $projectTool->delete();
            return redirect()->back()->with('Succes', 'Project Tools Berhasil Di Hapus');
        }
        catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('Eror', 'System Eror!'.$e->getMessage());
        }
    }
}
