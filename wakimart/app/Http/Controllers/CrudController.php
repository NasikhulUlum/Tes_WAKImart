<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data_member'] = DB::table('member')->get(); 
        $data['title'] = 'Form Input';
        return view('crud.create', $data);
    }
    
    public function form_tambah()
    {
        $data['title'] = 'Form Tambah Data';
        return view('crud.form_tambah', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|unique:member,name|max:255',
            'email' => 'bail|required|unique:member,email|email:rfc,dns'
        ]);
        
        if ($validator->passes()) {    
            DB::table('member')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'created_at' => date("Y-m-d H:i:s")
            ]);

            return redirect()->route('crud_biasa.list')->with('success','Data Member Berhasil Disimpan');
        }else{
            return back()->withErrors($validator)->withInput();
        }
    }

    public function form_edit($id)
	{

        $data['title'] = 'Form Edit Data';
		$data['data_member'] = DB::table('member')->where('id',$id)->get();
		
		return view('crud.form_edit', $data);
 
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
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'  => ['bail',
                            'required',
                            Rule::unique('member', 'name')->ignore($request->id, 'id'),
                            'max:255'
                            ], 
            'email'  => ['bail',
                            'required',
                            Rule::unique('member', 'email')->ignore($request->id, 'id'),
                            'email:rfc,dns'
                            ],                 
        ]);

        if ($validator->passes()) {    
            DB::table('member')->where('id',$request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            return redirect()->route('crud_biasa.list')->with('success','Data Member Berhasil Diupdate');
        }else{
            return back()->withErrors($validator)->withInput();
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
		DB::table('member')->where('id',$id)->delete();
		
		return redirect()->route('crud_biasa.list')->with('error','Data Member Berhasil Dihapus');
    }
}
