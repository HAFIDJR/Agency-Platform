<?php

namespace App\Http\Controllers;

use App\Models\projectOrder;
use Illuminate\Http\Request;

class ProjectOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = projectOrder::orderBy('id', 'desc')->get();
        return view('admin.project_orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(projectOrder $projectOrder)
    {
        //
        return view('admin.project_orders.show', [
            'projectOrder' => $projectOrder
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projectOrder $projectOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, projectOrder $projectOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projectOrder $projectOrder)
    {
        //
    }
}
