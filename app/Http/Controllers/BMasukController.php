<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;
use App\barang_masuk;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Image;
use DB;
use Excel;

class BMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function barang_masuk(){
        $data['barang_masuk'] = barang_masuk::paginate(10);
        return view('barang_masuk.barangmasuk')->with($data);
    }

    public function pt(){
        $data['qty'] = Barang::paginate(10);
        return view('barang_masuk.tambah_barang_masuk')->with($data);
    }

    public function add() {
        $bg = input::get('nama_barang');
        $stk = input::get('jumlah');
        $hb = DB::table('barangs')->where('nama_barang', $bg)->value('harga_beli');

        $a = new barang_masuk;
        $a->no_fak = input::get('no_fak');
        $a->tgl_trans = input::get('tgl_trans');
        $a->supplier = input::get('supplier');
        $a->nama_barang = input::get('nama_barang');
        $a->jumlah = input::get('jumlah');
        $a->satuan = DB::table('barangs')->where('nama_barang', $bg)->value('satuan');
        $a->total_harga = $stk * $hb;
        $id = DB::table('barangs')->where('nama_barang', $bg)->value('id');
        $stoks = DB::table('barangs')->where('nama_barang', $bg)->value('qty');
        $jumlah_barang = $stoks + $stk;
        $a->save();
        DB::table('barangs')
            ->where('id', $id)
            ->update(['qty' => $jumlah_barang]);

        return redirect(url('barangmasuk'));
    }

    public function downloadExcel(Request $request, $type)
    {
        $data = barang_masuk::get()->toArray();
        return Excel::create('Laporan Barang Masuk', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function auto(request $request){
        $term = $request->term;
        $barangmasuk = barang_masuk::where('tgl_trans','LIKE','%'.$term.'%')
                            ->get();

        if(count($barangmasuk) == 0){
            $searchResult[] = 'Tanggal Tidak Ditemukan';
        }else{
            foreach ($barangmasuk as $key) {
                $searchResult[] = $key->tgl_trans;
            }
        }

        return $searchResult;
    }

    public function search(){
        $search = input::get('search'); //<-- we use global request to get the param of URI
 
        $barang_masuk = barang_masuk::Where('tgl_trans','like','%'.$search.'%')
            ->paginate(10);
     
        return view('barang_masuk.barangmasuk',compact('barang_masuk'));   
    }
}
