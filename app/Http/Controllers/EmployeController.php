<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employe;
use App\Work;
use App\Salary;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = Work::all();
        $salary = Salary::all();
        $pegawais = DB::table('nama')->leftJoin('kategori', 'nama.id_category', '=', 'kategori.id')
                                    ->leftJoin('hobi', 'nama.id_hobby', '=', 'hobi.id')
                                    ->select('nama.id', 'nama.name', 'kategori.name as cat', 'hobi.name as sal')
                                    ->get();
        // print_r($pegawais);die();
        return view('arkademy/crud', ['pegawai' => $pegawais, 'position' => $position, 'salary' => $salary]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Employe::create([
    		'name' => $request->username,
    		'id_category' => $request->position,
    		'id_hobby' => $request->salary
        ]);
        
        return redirect('/crud');
    }

    public function edit(Request $request, $id)
    {       
        $pegawai = Employe::find($id);
        $pegawai->name = $request->username;
        $pegawai->id_category = $request->position;
        $pegawai->id_hobby = $request->salary;
        $pegawai->save();
        return redirect('/crud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = DB::table('nama')->leftJoin('kategori', 'nama.id_category', '=', 'kategori.id')
                                    ->leftJoin('hobi', 'nama.id_hobby', '=', 'hobi.id')
                                    ->where('nama.id', '=', $id)
                                    ->select('nama.id', 'nama.name', 'kategori.id as cat', 'hobi.id as sal')
                                    ->get();
        $response= [
            'status' => true,
            'data' => $pegawai
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
