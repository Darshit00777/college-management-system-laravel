<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\course;
use App\Models\User;

class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $uid)
    {
        $students = student::where('user_id', $uid)->get();

        return view('student.index', compact('students','uid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $uid)
    {
        $user = User::where('id', $uid)->first();

        $courses = course::all();

        return view('student.create',compact('courses','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'nullable',
            'gender' => 'required',
            'hobby' => 'required'
        ]);

        $data = $request->all();

        $data['hobby'] = implode(",", $request->hobby);

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photoname = time().".".$photo->getClientOriginalExtension();
            $photo->move(public_path('upload'), $photoname);
            $data['photo'] = $photoname;
        }

        $data['user_id'] = $request->user_id;

        //dd($request->all());
        student::create($data);

        return redirect('/student/'.$data['user_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $uid)
    {
        $student = student::where('user_id', $uid)->findOrfail($id);

        //$user = User::find($uid);
        $courses = course::all();

        $hobby = explode(',', $student->hobby);

        return view('student.edit', compact('student','courses','hobby','uid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $uid)
    {
        $request->validate([
            'photo' => 'nullable',
            'gender' => 'required',
            'hobby' => 'required'
        ]);

        $data = student::where('user_id', $uid)->findOrfail($id);

        $data->name = $request->name;
        $data->course_id = $request->course_id;
        $data->gender = $request->gender;
        $data->hobby = implode(",", $request->hobby);

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photoname = time().".".$photo->getClientOriginalExtension();
            $photo->move(public_path('upload'), $photoname);
            $data->photo = $photoname;
        }

        //dd($request->all());
        
        $data->save();

        return redirect('/student/'.$uid);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $uid)
    {
        $student = student::where('user_id', $uid)->findOrFail($id);

    $student->delete();

    return redirect('/student/'.$uid);
    }
}
