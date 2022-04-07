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
        $equipmentProvide = EquipmentProvide::with('equipment')->where('approved', 0)->simplePaginate(15);

        return view('backend.request.requestApprove', compact('equipmentProvide'));
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
            ->simplePaginate(15);
        // dd($allRequests);

        // studentClearence for test => [FOR REFERENCE]
        // $studentClearence = User::with('equipmentProvides.equipment')->where('id', 1)->first();
        // dd($studentClearence);

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
        $equipmentProvide = EquipmentProvide::find($id);
        $equipmentProvide->approved = 1;
        $equipmentProvide->save();


        return back()->with('success', 'Equipment Assisgned Successfully');
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
        $equipmentProvide = EquipmentProvide::find($id);
        $equipmentProvide->equipment()->detach();
        $equipmentProvide->forceDelete();
        return back()->with('success', 'Request Denied!!!');
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


    /**
     * RETURN NOTIFICATION FOR CRAFT INSPECTOR
     */
    public function returnEquipment($id)
    {
        $returnEquipment = EquipmentProvide::find($id);
        $returnEquipment->isReturn = 2; // PENDING FOR RETURN CONFIRMATION
        $returnEquipment->save();
        return back()->with('success', 'Returning Equipment is in processing...');
    }


    /**
     *  VIEW ALL RETURN REQUEST
     */
    public function returnEquipmentRequest()
    {
        $returnEquipmentRequest = EquipmentProvide::with('equipment')->where('isReturn', 2)->where('approved', 1)->paginate(15);
        // dd($returnEquipmentRequest);
        return view('backend.request.allReturnRequest', compact('returnEquipmentRequest'));
    }
}
