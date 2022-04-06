<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Models\EquipmentProvide;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Category::where('parent_id', null)->toBase()->get();
        $equipments = Equipment::where('status', 0)->latest()->toBase()->get();


        // ALL REQUEST DATA
        $allRequests = EquipmentProvide::with(
            ['equipment' => function ($q) {
                $q->select('equipment_name');
            }]
        )->where('user_id', Auth::user()->id)
            ->get();

        // studentClearence for test
        $studentClearence = User::with('equipmentProvides.equipment')->where('id', 1)->first();
        dd($studentClearence);

        return view('backend.request.create', compact('departments', 'equipments', 'allRequests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'lab' => 'required',
            'equipments' => 'required'
        ]);

        // STORING DATA INTO DATABASE
        $equipmentProvide = new EquipmentProvide();
        $equipmentProvide->user_id = Auth::user()->id;
        $equipmentProvide->department = $request->department;
        $equipmentProvide->lab = $request->lab;
        $equipmentProvide->save();
        $equipmentProvide->equipment()->attach($request->equipments);
        return back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * AJAX REQUEST FOR LAB
     */
    public function onlyLab(Request $request)
    {
        $department_id = $request->department;
        $labs = Category::where('parent_id', $department_id)->select('id', 'name')->toBase()->get();
        return $labs;
    }
}
