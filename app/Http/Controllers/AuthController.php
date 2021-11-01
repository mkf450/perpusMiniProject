<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\petugas;
use App\Models\anggota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

  public function guest()
  {
    return view('dashboard');
  }

  public function login()
  {
    return view('login');
  }


  public function masuk(Request $request)
  {
    $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      $user = $request->user();
      if ($user->isPetugas()) {
        // return redirect(view('petugasDashboard', ['user' => $user]))->withSuccess('Signed in');
        return redirect(route('petugasDashboard'))->withSuccess('Signed in');
      } else if ($user->isAnggota()) {
        return redirect(route('anggotaDashboard'))->withSuccess('Signed in');
      }

      // return redirect()->intended('dashboard')
      // return $this->dashboard($user)->withSuccess('Signed in');
      // return redirect()->dashboard($user)->withSuccess('Signed in');
    }

    return redirect("login")->withErrors('Login details are not valid');
  }



  public function anggota_registration()
  {
    return view('anggota_registration');
  }


  public function anggota_daftar(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required_with:confirm|confirmed|min:6',
      'password_confirmation' => 'same:password|min:6',
    ]);

    $data = $request->all();
    $check = $this->create($data);
    $check = $this->bikinAnggota($data);

    // return redirect("dashboard")->withSuccess('You have signed-in');
    return redirect("petugasDashboard")->withSuccess('Anggota berhasil didaftarkan');
  }

  public function create(array $data)
  {
    return User::create([
    'name' => $data['name'],
    'email' => $data['email'],
    'password' => Hash::make($data['password']),
    'role' => 'anggota',
    ]);
  }

  public function bikinAnggota(array $data)
  {
    return anggota::create([
    'nim' => $data['nim'],
    'nama' => $data['name'],
    'password' => Hash::make($data['password']),
    'alamat' => $data['alamat'],
    'kota' => $data['kota'],
    'email' => $data['email'],
    'no_telp' => $data['no_telp'],
    ]);
  }

  public function anggotaDashboard(){
    // return view('anggota_dashboard');
    $nama = Auth::user()->name;
    $anggota = anggota::where('nama', $nama)->get();
    return view('anggota_dashboard', ['anggota' => $anggota]);

  }

  // PETUGAS
  public function petugas_registration()
  {
    return view('petugas_registration');
  }

  // PETUGAS
  public function petugas_daftar(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required_with:confirm|confirmed|min:6',
      'password_confirmation' => 'same:password|min:6',
    ]);

    $data = $request->all();
    $check = $this->createPetugas($data);
    $check = $this->bikinPetugas($data);

    // return redirect("dashboard")->withSuccess('You have signed-in');
    return redirect("login")->withSuccess('Pendaftaran berhasil');
  }

  // PETUGAS
  public function createPetugas(array $data)
  {
    return User::create([
    'name' => $data['name'],
    'email' => $data['email'],
    'password' => Hash::make($data['password']),
    'role' => 'petugas',
    ]);
  }

  // PETUGAS
  public function bikinPetugas(array $data)
  {
    return petugas::create([
    'nama' => $data['name'],
    'password' => Hash::make($data['password']),
    ]);
  }

  // PETUGAS
  public function petugasDashboard(){
    // $user = Auth::user();
    $nama = Auth::user()->name;
    $petugas = petugas::where('nama', $nama)->get();
    // return view('petugas_dashboard');
    // $user = DB::table('users')->get();
    return view('petugas_dashboard', ['petugas' => $petugas]);
    // $nama = Auth::user()->name;
    // return view('petugas_dashboard', ['petugas' => $petugas]);
  }

  // public function dashboard($user)
  // {
  //   // if(Auth::check()){
  //   //   return view('dashboard');
  //   // }
  //
  //   if($user->isPetugas()) {
  //     return redirect(route('admin_dashboard'));
  //   }
  //
  //   else if($user->isAnggota()) {
  //     return redirect(route('user_dashboard'));
  //   }
  //
  //   return redirect("login")->withErrors('You are not allowed to access');
  // }




  public function signout() {
    Session::flush();
    Auth::logout();

    return Redirect('login');
  }
}
