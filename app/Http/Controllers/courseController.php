<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = course::all();
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cname' => 'required',
            'duration' => 'required',
            'fees' => 'required',
            'discount' => 'required',
        ]);

        $data = $request->all();

        $data['f_fees'] = $data['fees'] - (($data['fees'] * $data['discount']) / 100);

        course::create($data);

        return redirect('/course');
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
    public function edit(string $id)
    {
        $course = course::find($id);

        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cname' => 'required',
            'duration' => 'required',
            'fees' => 'required',
            'discount' => 'required',
        ]);

        $data = course::find($id);

        $data->cname = $request->cname;
        $data->duration = $request->duration;
        $data->fees = $request->fees;
        $data->discount = $request->discount;

        $data['f_fees'] = $data['fees'] - (($data['fees'] * $data['discount']) / 100);

        $data->save();

        return redirect('/course');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = course::find($id);

        $course->delete();

        return redirect('/course');
    }
}
