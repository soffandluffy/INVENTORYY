<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\Presenter;

use App\Barang;
use App\penjualan;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Excel;
use DB;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function add(request $request){
    	$a = new \App\Barang;
    	$a->kode_barang = input::get('kode_barang');
    	$a->nama_barang = input::get('nama_barang');
    	$a->satuan = input::get('satuan');
    	$a->qty = input::get('qty');
    	$a->harga_beli = input::get('harga_beli');
    	$a->harga_jual = input::get('harga_jual');
        if($request->hasFile('gambar')){
            $filename = $request->gambar->getClientOriginalName();
            $request->file('gambar')->move('images/',$filename);
            $a->gambar = $filename;
        }

    	$a->save();
        return redirect(url('/barang'));
    }

    public function Barang(){
        $data['barang'] = Barang::paginate(10);
        return view('barang.barang')->with($data);
    }

    public function tambah(){
        return view('barang.tambah_barang');
    }

    public function stok(){

        $data['barang'] = Barang::paginate(10);
        return view('stok')->with($data);
    }

    public function edit($id)
    {
        $data['barang'] = Barang::find($id);
        return view('barang.ubah_barang')->with($data);
    }

    public function update(request $request)
    {
        $a = Barang::find(Input::get('id'));
        $a->kode_barang = input::get('kode_barang');
        $a->nama_barang = input::get('nama_barang');
        $a->satuan = input::get('satuan');
        $a->qty = input::get('qty');
        $a->harga_beli = input::get('harga_beli');
        $a->harga_jual = input::get('harga_jual');
        if($request->hasFile('gambars')){
            $filename = $request->gambars->getClientOriginalName();
            $request->file('gambars')->move('images/',$filename);
            $a->gambar = $filename;
        }

        $a->save();

        return redirect(url('/barang'));
    }

    public function delete($id)
    {
        $a = Barang::find($id);
        $a->delete();

        return redirect(url('barang'));
    }

    public function downloadExcel(Request $request, $type)
    {
        $data = Barang::get()->toArray();
        return Excel::create('Laporan Barang', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel(Request $request)
    {

        if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = ['kode_barang' => $v['kode_barang
                            '], 'gambar' => $v['gambar'], 'nama_barang' => $v['nama_barang'], 'satuan' => $v['satuan'], 'qty' => $v['qty'], 'harga_beli' => $v['harga_beli'], 'harga_jual' => $v['harga_jual']];
                        }
                    }
                }

                
                if(!empty($insert)){
                    Barang::insert($insert);
                    return back()->with('success','Insert Record successfully.');
                }

            }

        }

        return back()->with('error','Please Check your file, Something is wrong there.');
    }

    public function auto(request $request){
        $term = $request->term;
        $barang = Barang::where('nama_barang','LIKE','%'.$term.'%')->get();

        if(count($barang) == 0){
            $searchResult[] = 'Barang Tidak Ditemukan';
        }else{
            foreach ($barang as $key) {
                $searchResult[] = $key->nama_barang;
            }
        }

        return $searchResult;
    }

    public function search(){
        $search = input::get('search'); //<-- we use global request to get the param of URI
 
        $barang = Barang::where('nama_barang','like','%'.$search.'%')
            ->paginate(10);
     
        return view('barang.barang',compact('barang'));   
    }

    public function searchs(){
        $search = input::get('search'); //<-- we use global request to get the param of URI
 
        $barang = Barang::where('nama_barang','like','%'.$search.'%')
            ->paginate(10);
     
        return view('stok',compact('barang'));   
    }
}

