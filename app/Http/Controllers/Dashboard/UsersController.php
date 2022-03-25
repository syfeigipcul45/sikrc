<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::where('id', '!=', Auth::user()->id)->orderBy('name')->get();
        return view('dashboard.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::where('id', '!=', 3)->orderBy('id', 'asc')->get();
        return view('dashboard.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|min:8|same:password',
                'role_id' => 'required'
            ], [
                'name.required' => 'Nama lengkap harus diisi!',
                'password.required' => 'Password harus diisi!',
                'password.confirmed' => 'Konfirmasi password tidak cocok!',
                'password_confirmation.required' => 'Konfirmasi password harus diisi!',
                'password_confirmation.same' => 'Konfirmasi password tidak sama',
                'email.required' => 'Email harus diisi!',
                'email.unique' => 'Email sudah terdaftar',
                'email.email' => 'Format penulisan harus berupa email!',
                'role_id.required' => 'Level user harus diisi'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ];

            $saveData = User::create($data);
            $saveData->syncRoles($request->role_id);

            Session::flash('success', 'Data Berhasil Tersimpan');
            return redirect()->route('dashboard.users.index');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
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
        $data['roles'] = Role::where('id', '!=', 3)->orderBy('id', 'asc')->get();
        $data['user'] = User::find($id);
        return view('dashboard.user.edit', $data);
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
        $user = User::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'role_id' => 'required',
            ], [
                'name.required' => 'Nama lengkap harus diisi!',
                'role_id.required' => 'Level user harus diisi',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                "name" => $request->name,
            ];

            if (!empty($request->password)) {
                $updateData['password'] = bcrypt($request->password);
            }

            $user->update($updateData);
            $user->syncRoles($request->role_id);

            Session::flash('success', 'Data Berhasil Diubah');
            return redirect()->route('dashboard.users.index');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('success', 'Data Berhasil Dihapus');
        return redirect()->route('dashboard.users.index');
    }
}
