<?php

namespace App\Http\Controllers\backend;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment = Equipment::toBase()->paginate();

        return view('backend.equipment.index', compact('equipment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.equipment.create');
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
            'equipment_name' => 'required',
            'added_by' => 'required'
        ]);

        $equipment = new Equipment();
        $equipment->equipment_name = $request->equipment_name;
        $equipment->added_by = Auth::guard('admin')->user()->id;
        $equipment->save();
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
        $equipment = Equipment::findOrFail($id);

        return view('backend.equipment.edit', compact('equipment'));
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
        $request->validate([
            'equipment_name' => 'required',
            'added_by' => 'required'
        ]);

        $equipment = Equipment::findOrFail($id);
        $equipment->equipment_name = $request->equipment_name;
        $equipment->added_by = Auth::user()->id;
        $equipment->save();
        return redirect()->route('equipment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();
        return back();
    }

    public function status($id)
    {
        $equipment_status = Equipment::findOrFail($id);
        $equipment_status->status = $equipment_status->status == 0 ? '1' : '0';
        $equipment_status->save();
        return back();
    }

    public function equipmentTrash()
    {
        $equipment = Equipment::onlyTrashed()->get();

        return view('backend.equipment.trash', compact('equipment'));
    }

    public function equipmentRestore($id)
    {
        $equipment = Equipment::onlyTrashed()->find($id);
        $equipment->restore();
        return back();
    }

    public function permanentDelete($id)
    {
        $equipment = Equipment::onlyTrashed()->find($id);
        $equipment->forceDelete();
        return back();
    }
}
