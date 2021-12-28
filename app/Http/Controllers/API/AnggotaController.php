<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\anggota;
use App\Http\Resources\anggotaResource;
// use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
      // DISPLAY Anggota
      public function index()
      {
        // $data = DB::table('anggota')->get();
        $data = anggota::all();
        //return response()->json(['data' => $data]);
        return response()->json($data);
        // return response()->json([anggotaResource::collection($data)]);
      }
      
      /*
      public function showAnggota(){
      $anggota = anggota::all();
      return ($anggota);
    }
    */

    // tambah anggota
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'nama' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
      ]);

      if($validator->fails()){
        return response()->json($validator->errors());
      }

      $anggota = anggota::create([
        'nim' => $request->nim,
        'nama' => $request->nama,
        'password' => Hash::make($request->password),
        'alamat' => $request->alamat,
        'kota' => $request->kota,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
      ]);

      return response()->json(['Anggota created successfully.', 'data' => $anggota]);
      //return response()->json(['Anggota created successfully.', new anggotaResource($anggota)]);
    }

    // SHOW ALL anggota
    public function show($id)
    {
      $anggota = anggota::find($id);
      if (is_null($anggota)) {
        return response()->json('Data not found', 404);
      }
      return response()->json([new anggotaResource($anggota)]);
    }

    // UPDATE anggota
    public function update(Request $request, $id)
    {
        $anggota = anggota::find($id);
        $validator = Validator::make($request->all(),[
          'name' => 'required',
          'email' => 'required|email|unique:users',
          // 'password' => 'required|min:6'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $anggota->nim = $request->nim;
        $anggota->nama = $request->name;
        // $anggota->password = $request->password;
        $anggota->alamat = $request->alamat;
        $anggota->kota = $request->kota;
        $anggota->email = $request->email;
        $anggota->no_telp = $request->no_telp;
        $anggota->save();

        return response()->json(['Anggota updated successfully.', new anggotaResource($anggota)]);
    }

    // DELETE anggota
    public function destroy($id)
    {
        $anggota = anggota::find($id);
        $anggota->delete();
        return response()->json('Anggota deleted successfully');
    }
}
