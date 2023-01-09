<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $result = Admin::create($data);
            if ($result) {
                return redirect('admin_login');
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }


        // $user->username = 'nguyendangduy';
        // $user->email = 'example@domain.com';

        // $user->password = Hash::make('123');

        // $user->save();
    }
    public function showFormLogin()
    {
        return view('admin.login');
    }
    public function logout()
    {
        if (Auth::logout()) {
            return redirect()->route('admin.showFormLogin');
        }
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
}
