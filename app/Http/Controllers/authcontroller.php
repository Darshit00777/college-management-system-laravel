<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class authcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $data = $request->all();

        User::create($data);

        return redirect('/login');
    }

    public function login()
    {
        return view('user.login');
    }

    public function checklogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = User::where('email', $request->email)
                            ->where('password', $request->password)
                            ->first();

        if($data){
            if($data['role'] == 'teacher'){
                return redirect('/course');
            }
            else{
                return redirect('/student/'.$data->id);
            }
        }else{
            return 'Invalid Email and Password';
        }
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
