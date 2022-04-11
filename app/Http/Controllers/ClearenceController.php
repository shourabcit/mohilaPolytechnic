<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Clearence;
use App\Notifications\CraftNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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
            $user = User::find($id, ['name', 'img']);
            $craftInspectors = Admin::role('craft instructor')->get();

            Notification::send($craftInspectors, new CraftNotify($user->name, $user->img, route('clearence.craft')));
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
            }])->latest()
            ->paginate(15);

        // dd($requests);
        return view('backend.clearence.clearenceRequest', compact('requests'));
    }
    /** 
     * CRAFT INSPECTOR APPROVAL
     */
    public function craftApproval($id)
    {
        $clearence = Clearence::find($id);
        $clearence->craftinspector = true;
        $clearence->save();
        // sending notification
        $userId = $clearence->user_id;
        $user = User::find($userId, ['img', 'name']);
        $workSuper = Admin::role('workshop super')->get();

        Notification::send($workSuper, new CraftNotify($user->name, $user->img, route('clearence.worksuper')));
        // sending notification end
        return back()->with('success', 'Student Has Been Cleared');
    }


    /** 
     * WORKSHOP SUPER CLEARENCE 
     */
    public function workshopClearence()
    {
        $requests = Clearence::where('craftinspector', 1)
            ->where('workshopsuper', 0)
            ->where('depthead', 0)
            ->where('register', 0)
            ->where('viceprincipal', 0)
            ->where('principal', 0)
            ->with(['user' => function ($q) {
                $q->withCount(['equipmentProvides' => function ($query) {
                    $query->where('isReturn', 0)->where('approved', 1)->orWhere('isReturn', 2);
                }]);
            }])->latest()
            ->paginate(15);
        // dd($requests);
        return view('backend.clearence.clearenceRequest', compact('requests'));
    }



    /** 
     * WORKSHOP SUPER INSPECTOR APPROVAL
     */
    public function workApproval($id)
    {
        $clearence = Clearence::find($id);
        $clearence->workshopsuper = true;
        $clearence->save();

        // sending notification
        $userId = $clearence->user_id;
        $user = User::find($userId, ['img', 'name']);
        $workSuper = Admin::role('dept. head')->get();
        Notification::send($workSuper, new CraftNotify($user->name, $user->img, route('clearence.depthead')));
        // sending notification end

        return back()->with('success', 'Student Has Been Cleared');
    }

    /** 
     * Department HEAD CLEARENCE 
     */
    public function deptHeadClearence()
    {
        $requests =   Clearence::where('craftinspector', 1)
            ->where('workshopsuper', 1)
            ->where('depthead', 0)
            ->where('register', 0)
            ->where('viceprincipal', 0)
            ->where('principal', 0)
            ->with(['user' => function ($q) {
                $q->withCount(['equipmentProvides' => function ($query) {
                    $query->where('isReturn', 0)->where('approved', 1)->orWhere('isReturn', 2);
                }]);
            }])->latest()
            ->paginate(15);
        // dd($requests);
        return view('backend.clearence.clearenceRequest', compact('requests'));
    }



    /** 
     * Department HEAD  APPROVAL
     */
    public function deptHeadApproval($id)
    {
        $clearence = Clearence::find($id);
        $clearence->depthead = true;
        $clearence->save();

        // sending notification
        $userId = $clearence->user_id;
        $user = User::find($userId, ['img', 'name']);
        $workSuper = Admin::role('register')->get();
        Notification::send($workSuper, new CraftNotify($user->name, $user->img, route('clearence.register')));
        // sending notification end
        return back()->with('success', 'Student Has Been Cleared');
    }


    /** 
     * REGISTER  CLEARENCE 
     */
    public function registerClearence()
    {
        $requests =   Clearence::where('craftinspector', 1)
            ->where('workshopsuper', 1)
            ->where('depthead', 1)
            ->where('register', 0)
            ->where('viceprincipal', 0)
            ->where('principal', 0)
            ->with(['user' => function ($q) {
                $q->withCount(['equipmentProvides' => function ($query) {
                    $query->where('isReturn', 0)->where('approved', 1)->orWhere('isReturn', 2);
                }]);
            }])->latest()
            ->paginate(15);
        // dd($requests);
        return view('backend.clearence.clearenceRequest', compact('requests'));
    }



    /** 
     * REGISTER  APPROVAL
     */
    public function registerApproval($id)
    {
        $clearence = Clearence::find($id);
        $clearence->register = true;
        $clearence->save();
        // sending notification
        $userId = $clearence->user_id;
        $user = User::find($userId, ['img', 'name']);
        $workSuper = Admin::role('vice principal')->get();
        Notification::send($workSuper, new CraftNotify($user->name, $user->img, route('clearence.viceprincipal')));
        // sending notification end
        return back()->with('success', 'Student Has Been Cleared');
    }


    /** 
     * VICE PRINCIPAL  CLEARENCE 
     */
    public function vicePrincipalClearence()
    {
        $requests =   Clearence::where('craftinspector', 1)
            ->where('workshopsuper', 1)
            ->where('depthead', 1)
            ->where('register', 1)
            ->where('viceprincipal', 0)
            ->where('principal', 0)
            ->with(['user' => function ($q) {
                $q->withCount(['equipmentProvides' => function ($query) {
                    $query->where('isReturn', 0)->where('approved', 1)->orWhere('isReturn', 2);
                }]);
            }])->latest()
            ->paginate(15);
        // dd($requests);
        return view('backend.clearence.clearenceRequest', compact('requests'));
    }



    /** 
     * VICE PRINCIPAL  APPROVAL
     */
    public function vicePrincipalApproval($id)
    {
        $clearence = Clearence::find($id);
        $clearence->register = true;
        $clearence->save();
        // sending notification
        $userId = $clearence->user_id;
        $user = User::find($userId, ['img', 'name']);
        $workSuper = Admin::role('principal')->get();
        Notification::send($workSuper, new CraftNotify($user->name, $user->img, route('clearence.principal')));
        // sending notification end
        return back()->with('success', 'Student Has Been Cleared');
    }


    /** 
     *  PRINCIPAL  CLEARENCE 
     */
    public function principalClearence()
    {
        $requests =    Clearence::where('craftinspector', 1)
            ->where('workshopsuper', 1)
            ->where('depthead', 1)
            ->where('register', 1)
            ->where('viceprincipal', 1)
            ->where('principal', 0)
            ->with(['user' => function ($q) {
                $q->withCount(['equipmentProvides' => function ($query) {
                    $query->where('isReturn', 0)->where('approved', 1)->orWhere('isReturn', 2);
                }]);
            }])->latest()
            ->paginate(15);
        // dd($requests);
        return view('backend.clearence.clearenceRequest', compact('requests'));
    }



    /** 
     *  PRINCIPAL  APPROVAL
     */
    public function principalApproval($id)
    {
        $clearence = Clearence::find($id);
        $clearence->register = true;
        $clearence->save();
        return back()->with('success', 'Student Has Been Cleared');
    }


    /**
     * STUDENT CLEARENCE INFO VIEW
     */
    public function studentClearenceView($id, $count)
    {
        $studentInfo = User::with('equipmentProvides.equipment')->with('student')->find($id);
        // dd($studentInfo);
        return view('backend.clearence.studentView', compact('studentInfo', 'count'));
    }
}
