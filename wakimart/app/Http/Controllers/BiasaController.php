<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Routing\UrlGenerator;

class BiasaController extends Controller
{

    protected $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_data_produser(Request $request)
    {
        $produsers = DB::table('produser')->get();

        $view = $this->view_details($produsers);

        $response = array(
            'error'=>false,
            'detail' => $view,
        );     
        
        return response()->json($response);

        /* return Request::ajax() ? 
                    response()->json($produsers,Response::HTTP_OK) 
                    : abort(404); */
    }

    function view_details($data) {
        $n = 1;
        $html = "";

        $link_edit_biasa = $this->url->to('crud_biasa/form_edit');
        $link_delete_biasa = $this->url->to('crud_biasa/delete');

        if(count($data) > 0) {

            foreach($data as $key=>$value){
                $html .= '
                <tr>
                    <td>'.$value->kd_produser.'</td>
                    <td>'.$value->nm_produser.'</td>
                    <td>'.$value->international.'</td>
                    <td style="width: 15%"><span>
                            <a class="btn btn-warning" href="'.$link_edit_biasa.'/'.$value->kd_produser.'">Edit Biasa</a>
                            <a class="btn btn-secondary edit_ajax" data-id="'.$value->kd_produser.'" >Edit Ajax</a>
                            <a onclick="return confirm(\'Yakin Hapus Data ini?\')" class="btn btn-danger" href="'.$link_delete_biasa.'/'.$value->kd_produser.'">Delete</a>
                    </span>
                </tr>';
            }

        } else {
            $html .= '<tr> <td colspan="4" class="text-center"> Empty list. </td></tr>';
        }

        return $html;
   }

    public function index()
    {
        $data['data_produser'] = DB::table('produser')->get(); 
        $data['title'] = 'Form Inputan Biasa';
        return view('crud_biasa.create', $data);
    }
    
    public function form_tambah()
    {
        $data['title'] = 'Form Tambah Data - Biasa';
        return view('crud_biasa.form_tambah', $data);
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
            'kd_produser' => 'bail|required|unique:produser,kd_produser|max:50',
            'nm_produser' => 'bail|required|max:50'
        ]);
        
        if ($validator->passes()) {    
            DB::table('produser')->insert([
                'kd_produser' => $request->kd_produser,
                'nm_produser' => $request->nm_produser,
                'international' => $request->international
            ]);

            return redirect()->route('crud_biasa.list')->with('success','Data Produser Berhasil Disimpan');
        }else{
            return back()->withErrors($validator)->withInput();
        }
    }

    public function form_edit($id)
	{

        $data['title'] = 'Form Edit Data - Biasa';
		$data['data_produser'] = DB::table('produser')->where('kd_produser',$id)->get();
		
		return view('crud_biasa.form_edit', $data);
 
	}

    public function form_edit_ajax($id)
    {
        $data['title'] = 'Form Edit Data - Ajax';
		$data['data_produser'] = DB::table('produser')->where('kd_produser',$id)->get();

        return response()->json([
            'data' => $data
        ]);
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
            'nm_produser' => 'bail|required|max:50'
        ]);

        if ($validator->passes()) {    
            DB::table('produser')->where('kd_produser',$request->kd_produser)->update([
                'nm_produser' => $request->nm_produser,
                'international' => $request->international
            ]);

            return redirect()->route('crud_biasa.list')->with('success','Data Produser Berhasil Diupdate');
        }else{
            return back()->withErrors($validator)->withInput();
        }
		
    }

    public function update_ajax(Request $request)
    {

        DB::table('produser')->where('kd_produser',$request->kd_produser)->update([
            'nm_produser' => $request->nm_produser,
            'international' => $request->international
        ]);

		return response()->json([
            'success' => true,
            'message' => 'Data Update successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		DB::table('produser')->where('kd_produser',$id)->delete();
		
		return redirect()->route('crud_biasa.list')->with('error','Data Produser Berhasil Dihapus');
    }
}
