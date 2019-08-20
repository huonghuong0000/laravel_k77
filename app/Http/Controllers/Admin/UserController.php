<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    const PER_PAGE = 6;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::paginate(self::PER_PAGE);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'email' => 'required|email',
            'password' => 'required|min:4',
            'name' => 'required',
        ]);

        //bcrypt($request->password)
        // $attributes = $request->only([
        //     'email',
        //     'pasword' => bcrypt($request->password),
        //     'name',
        //     'address',
        //     'phone'
        // ]);

        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->level = $request->level;
        $user->save();

        return redirect()->route('admin.users.edit', $user->id)->with('success', 'Tạo mới thành công');
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
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
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
            'email' => 'required|email',
            'password' => 'required|min:4',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'level' => 'required'
        ]);

        $user = User::findOrFail($id);

        $attributes = $request->only([
            'email',
            'password',
            'name',
            'address',
            'phone',
            'level'
        ]);

        $user = $user->fill($attributes);
        $user->save();

        return redirect()->route('admin.users.edit',$user->id)
        ->with('success','Sửa tài khoản thành công !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function del($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'Xóa tài khoản thành công!!!');
    }
}
