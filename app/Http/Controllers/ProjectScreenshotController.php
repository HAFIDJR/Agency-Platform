<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\projectScreenshot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectScreenshotController extends Controller
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
        return view('admin.project_screenshots.create', [
            'project' => $project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        //
        $validated = $request->validate([
            'screenshot'=> 'required|image|mimes:png,jpg|max:2048',
        ]);
        
        DB::beginTransaction();

        try{
            if($request->hasFile('screenshot')){
                $path = $request->file('screenshot')->store('project_screenshot', 'public');
                $validated['screenshot'] = $path;
            }
            $validated['project_id'] = $project->id;

            $newScreenchot = projectScreenshot::create($validated);

            DB::commit();

            return redirect()->back()->with('Succses', 'Project Screenshot Addedd succesfully!');
        }
        catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('Eror', 'System Eror!'.$e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(projectScreenshot $projectScreenshot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projectScreenshot $projectScreenshot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, projectScreenshot $projectScreenshot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projectScreenshot $projectScreenshot)
    {
        //
        try{
            $projectScreenshot->delete();
            return redirect()->back()->with('Succes', 'SCREENSHOT Berhasil Di Hapus');
        }
        catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('Eror', 'System Eror!'.$e->getMessage());
        }
    }
}
