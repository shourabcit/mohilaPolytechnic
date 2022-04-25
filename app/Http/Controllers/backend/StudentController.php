<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unApproveStudents = User::where('approved', 0)->with('student')->simplePaginate(30);
        return view('backend.student.index', compact('unApproveStudents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentInfo = User::with('student')->find($id);
        return view('backend.student.studentView', compact('studentInfo'));
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
     * APPROVING STUDENT
     */
    public function approval($id)
    {
        $user = User::find($id);
        $user->approved = 1;
        $user->save();
        return redirect()->route('student.index');
    }
    /**
     * STUDENT SEARCH
     */
    public function search(Request $request)
    {
        $search = $request->search;
        // dd($request->all());
        $unApproveStudents = User::where('name', 'LIKE', '%' . $search . '%')->where('approved', 0)->orWhereHas('student', function ($q) use ($search) {
            $q->where('board_roll', $search)->orWhere('registation_number', $search);
        })->simplePaginate(30);
        return view('backend.student.index', compact('unApproveStudents'));
    }
}
