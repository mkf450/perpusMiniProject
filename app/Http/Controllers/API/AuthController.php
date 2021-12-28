<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use App\Models\anggota;
use App\Http\Resources\anggotaResource;

class AuthController extends Controller
{
  // REGISTER USER
  public function register(Request $request)
  {
      $validator = Validator::make($request->all(),[
          'name' => 'required',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:6'
      ]);

      if($validator->fails()){
          return response()->json($validator->errors());
      }

      // $data = $request->all();
      // $anggota = $this->store($data);

      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'role' => 'anggota'

       ]);
      // $user = anggota::create([
      //     'nim' => $request->nim,
      //     'nama' => $request->nama,
      //     'password' => Hash::make($request->password),
      //     'alamat' => $request->alamat,
      //     'kota' => $request->kota,
      //     'email' => $request->email,
      //     'no_telp' => $request->no_telp,
      //  ]);

      $token = $user->createToken('auth_token')->plainTextToken;

      return response()
          ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
  }

  public function store(array $data)
  {
      $anggota = anggota::create([
        'nim' => $data->nim,
        'nama' => $data->name,
        'password' => Hash::make($data->password),
        'alamat' => $data->alamat,
        'kota' => $data->kota,
        'email' => $data->email,
        'no_telp' => $data->no_telp,
       ]);

      return response()->json(['Anggota created successfully.', new anggotaResource($anggota)]);
  }

  // LOGIN
  public function login(Request $request)
  {
    if (!Auth::attempt($request->only('email', 'password')))
    {
      return response()->json(['message' => 'Unauthorized'], 401);
    }

    $user = User::where('email', $request['email'])->firstOrFail();
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()
    ->json(['message' => 'Hi '.$user->name.', welcome to back!','access_token' => $token, 'token_type' => 'Bearer', ]);
  }

  // LOGOUT
  public function logout()
  { // method for user logout and delete token
    auth()->user()->tokens()->delete();
    return [
      'message' => 'You have successfully logged out and the token was successfully deleted'
    ];
  }
}
