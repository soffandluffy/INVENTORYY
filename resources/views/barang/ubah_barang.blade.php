@extends('layouts.app')

@section('title')
    Ubah Barang | AVHERINDO
@endsection

@section('header')
	<style type="text/css">
		th{
			text-align: center;
		}
		td{
			text-align: center;
			vertical-align: middle;
		}
		.line{
			height: 2px;
			overflow: hidden;
			background-color: #448aff; 
		}
	</style>
@endsection

@section('content')
     <div class="container">
     	<div class="row"></div>
     	<h4 style="color: #448aff;">Ubah Barang</h4>
     	<div class="line">
     	</div>
     	<form class="col s12" action="{{url('barang/update')}}" method="POST" enctype="multipart/form-data">
     		{{ csrf_field() }}
			<div class="row">
			    <div class="file-field input-field col s12">
				    <div class="btn-flat waves-effect waves-light blue accent-2">
				    	<span style="color: white;">Pilih Gambar</span>
				    	<input type="file" name="gambar">
					</div>
					<div class="file-path-wrapper">
				    	<input class="file-path validate" value="{{$barang->gambar}}" type="text">
					</div>
				</div>
				<div class="input-field col s6">
				    <i class="material-icons prefix">code</i>
				    <input id="icon_prefix" type="text" name="kode_barang" value="{{$barang->kode_barang}}" class="validate">
				    <label for="icon_prefix">Kode Barang</label>
				</div>
				<div class="input-field col s6">
				    <i class="material-icons prefix">featured_video</i>
				    <input id="icon_prefix" type="text" name="nama_barang" value="{{$barang->nama_barang}}" class="validate">
				    <label for="icon_prefix">Nama Barang</label>
				</div>
				<div class="input-field col s6">
				    <i class="material-icons prefix">public</i>
				    <input id="icon_prefix" type="text" value="{{$barang->satuan}}" name="satuan" class="validate">
				    <label for="icon_prefix">Satuan</label>
				</div>
				<div class="input-field col s6">
				    <i class="material-icons prefix">exposure</i>
				    <input id="icon_prefix" type="text" value="{{$barang->qty}}" name="qty" class="validate">
				    <label for="icon_prefix">Qty(Jumlah)</label>
				</div>
				<div class="input-field col s6">
				    <i class="material-icons prefix">attach_money</i>
				    <input id="icon_prefix" type="text" value="{{$barang->harga_beli}}" name="harga_beli" class="validate">
					<label for="icon_prefix">Harga Beli</label>
				</div>
				<div class="input-field col s6">
			    	<i class="material-icons prefix">attach_money</i>
			    	<input id="icon_prefix" type="text" value="{{$barang->harga_jual}}" name="harga_jual" class="validate">
			    	<label for="icon_prefix">Harga Jual</label>
				</div>
			</div>
			<div align="center" class="col s12">
		   		<a class="btn-flat waves-effect waves-light red" href="/barang" style="color: white;"><i class="material-icons left">cancel</i>Batal</a>
		   		<button class="btn-flat waves-effect waves-light blue accent-2" style="color: white;" type="submit"><i class="material-icons right">send</i>Submit</button>
		   		<input type="hidden" name="id" value="{{$barang->id}}" ></input>
		    </div>
	  	</form>
	</div>
     

@endsection

@section('footer')
	<script type="text/javascript">
		document.getElementById("barangs").hidden = "true";
	</script>
@endsection