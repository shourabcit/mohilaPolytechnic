<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clearence;
use Illuminate\Http\Request;

class ClearenceController extends Controller
{
    public function getClearenceRequest($id)
    {
        //CHECK IF STUDENT ALREADY HAS A REQUEST
        if (Clearence::where('user_id',  $id)->exists()) {
            return back()->with('success', 'Your Request is processing. Please wait patiently.');
        } else {

            $clearence = new Clearence();
            $clearence->user_id = $id;
            $clearence->save();
            return back()->with('success', 'Request Has been send.');
        }
    }


    /**
     * CRAFT CLEARENCE FOR CRAFT INSPECTOR
     */
    public function craftClearence()
    {
        $requests = Clearence::where('craftinspector', 0)
            ->where('workshopsuper', 0)
            ->where('depthead', 0)
            ->where('register', 0)
            ->where('viceprincipal', 0)
            ->where('principal', 0)
            ->with(['user' => function ($q) {
                $q->withCount(['equipmentProvides' => function ($query) {
                    $query->where('isReturn', 0)->where('approved', 1)->orWhere('isReturn', 2);
                }]);
            }])
            ->paginate(15);

        // dd($requests);
        return view('backend.clearence.clearenceRequest', compact('requests'));
    }



    /**
     * STUDENT CLEARENCE INFO VIEW
     */
    public function studentClearenceView($id, $count)
    {
        $studentInfo = User::with('equipmentProvides.equipment')->with('student')->find($id);
        // dd($studentInfo);
        return view('backend.clearence.studentView', compact('studentInfo'));
    }
}
