@extends('layouts.app')

@section('title')
    Stok Barang | AVHERINDO
@endsection

@section('header')
	<link rel="stylesheet" href="/inventory/INVENTORYY/public/css/jquery-ui.css">
	<style type="text/css">
		th{
			text-align: center;
		}
		td{
			text-align: center;
			align-content: center;
		}
	</style>
@endsection

@section('content')
     	<div class="container">
     			<div class="row"></div>
     				<h4 style="color: #448aff;">Stok Barang</h4>
     			<div class="line">
     			</div>
     			<div class="row">
     				<form action="searchS" method="get">
						<div class="input-field right col">
							<button class="btn btn-flat blue accent-2" style="color: white;"><i class="material-icons left">search</i>Cari</button>
						</div>
					    <div class="input-field col s5 right">
					    	<i class="material-icons prefix">search</i>
					        <input id="search" type="text" name="search">
					        <label for="search">Nama Barang</label>
						</div>
     				</form>
			    </div>
			    <div class="row">
			    	@foreach($barang as $key)
			    	<div class="col s3">
			          <div class="card" style="width: 220px; height: 320px;">
					    <div class="card-image waves-effect waves-block waves-light">
					      <img class="activator" style="height: 220px; width: 220px; position: center;" src="/images/{{$key->gambar}}">
					    </div>
					    <div class="card-content">
					      <span class="card-title activator grey-text text-darken-4">{{$key->nama_barang}}<i class="material-icons right">more_vert</i></span>
					      <p>QTY : {{$key->qty}} {{$key->satuan}}</p>
					    </div>
					    <div class="card-reveal">
					      <span class="card-title grey-text text-darken-4">{{$key->nama_barang}}<i class="material-icons right">close</i></span>
					      <p>ID : {{$key->id}}</p>
					      <p>QTY : {{$key->qty}} {{$key->satuan}}</p>
					      <p>Harga : Rp {{number_format( $key->harga_jual , 2 , "," , "." )}}</p>
					    </div>
					  </div>
			        </div>
			        @endforeach
			    </div>
		     	<!-- End Table -->	
		     	<div class="row right">
		     		{!! ($barang)->render() !!}
		     	</div>
     	</div>

@endsection

@section('footer')
    <script src="/inventory/INVENTORYY/public/js/jquery-1.12.4.js"></script>
    <script src="/inventory/INVENTORYY/public/js/jquery-ui.js"></script>
    <script type="text/javascript">
    	document.getElementById("stoks").hidden = "true";
    	$( "#search" ).autocomplete({
	      source: '/autoB'
	    });
    </script>
@endsection