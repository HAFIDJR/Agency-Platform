<?php

namespace App\Http\Controllers;

use App\Models\tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Str;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tools = tool::orderBy('id', 'desc')->get();
        return view('admin.tools.index', [
            'tools' => $tools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'tagline'=> 'required|string',
            'logo'=> 'required|image|mimes:png,jpg|max:2048',
        ]);
        
        DB::beginTransaction();

        try{
            if($request->hasFile('logo')){
                $path = $request->file('logo')->store('tools', 'public');
                $validated['logo'] = $path;
            }
            
            $newTool = tool::create($validated);

            DB::commit();

            return redirect()->route('admin.tools.index')->with('Succses', 'Project created succesfully!');
        }
        catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('Eror', 'System Eror!'.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tool $tool)
    {
        //
        return view('admin.tools.edit', [
            'tool' => $tool
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tool $tool)
    {
        //
          $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'tagline'=> 'required|string',
            'logo'=> 'sometimes|image|mimes:png,jpg|max:2048',
        ]);
        
        DB::beginTransaction();

        try{
            if($request->hasFile('logo')){
                $path = $request->file('logo')->store('tools', 'public');
                $validated['logo'] = $path;
            }
            
            $tool->update($validated);

            DB::commit();

            return redirect()->route('admin.tools.index')->with('Succses', 'Project created succesfully!');
        }
        catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('Eror', 'System Eror!'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tool $tool)
    {
        //
        try{
            $tool->delete();
            return redirect()->back()->with('Succes', 'Project Berhasil Di Hapus');
        }
        catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('Eror', 'System Eror!'.$e->getMessage());
        } 
    }
}
