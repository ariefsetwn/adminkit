<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Request;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create', compact('user'));
    }

    public function store(UserRequest $request)
    {
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request['password'])
        ]);

        session()->flash('pesan', 'Data Berhasil Ditambah');
        return redirect('/user');
    }

    public function edit($id = null)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update($id = null, UserRequest $request)
    {
      $user = User::findOrFail($id);  
      $idUser = auth()->user()->id;
      $user = User::where('id', $idUser)->first();

        if ($user) {
            if (Hash::check($request['old_password'], $user->password)) {
              $user->password = Hash::make($request['password']);
              $user->save();
              session()->flash('pesan', 'Password berhasil diubah');
              return redirect()->back();
            } else {
              session()->flash('error', 'Password lama salah!');
              return redirect()->back();
            }
          }

        $user = User::findOrFail($id);
        if (!empty($request->password)) {
        $user->password = Hash::make($request['password']);
      }

      $user->username = $request->username;
      $user->email = $request->email;
      $user->save();

      session()->flash('pesan', 'Data Berhasil Diubah');
      return redirect('/user');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete($id);

        session()->flash('pesan', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
