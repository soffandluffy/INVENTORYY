@extends('layouts.app')

@section('title')
    Penjualan | AVHERINDO
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
		#gambar{
			width: 100px;
		}
	</style>
@endsection

@section('content')
	
     	<div class="container">
     			<div class="row"></div>
     				<h4 style="color: #448aff;">Data Penjualan</h4>
     			<div class="line">
     			</div>
     			<div align="right">
     				<a class="btn-flat waves-effect waves-light blue accent-2" style="color: white;" href="{{ url('pj/downloadExcel/xls') }}"><i class="material-icons left">content_paste</i>Export</a>
     				<a class="btn-flat waves-effect waves-light blue accent-2 pulse" style="color: white;" href="{{url('penjualan/tambah')}}"><i class="material-icons left">add</i>TAMBAH Penjualan</a>
     			</div>
     			<div class="line"></div>
     			<div class="row">
     				<form action="searchP" method="get">
						<div class="input-field right col">
							<button class="btn btn-flat blue accent-2" style="color: white;"><i class="material-icons left">search</i>Cari</button>
						</div>
					    <div class="input-field col s5 right">
					    	<i class="material-icons prefix">search</i>
					        <input id="search" type="text" name="search">
					        <label for="search">Tanggal Transaksi</label>
						</div>
     				</form>
	     			<!-- Table -->
			     	<table class="responsive-table">
				        <thead>
				          <tr>
				          	  <th>No.Transaksi</th>
				              <th>Tanggal Transaksi</th>
				              <th>Pembeli</th>
				              <th>Nama Barang</th>
				              <th>Jumlah</th>
				              <th>Harga Barang</th>
				              <th>Satuan</th>
				              <th>Total</th>
				          </tr>
				        </thead>
				        @foreach($penjualan as $key)
				        <tbody>
				          <tr>
				          	<td>{{$key->no_trans}}</td>
				            <td>{{$key->tgl_trans}}</td>
				            <td>{{$key->nama_pembeli}}</td>
				            <td>{{$key->nama_barang}}</td>
				            <td>{{$key->jumlah_barang}}</td>
				            <td>{{$key->harga_barang}}</td>
				            <td>{{$key->satuan}}</td>
				            <td>{{$key->total_harga}}</td>
				          </tr>
				        </tbody>
				        @endforeach
				    </table>
			     	<!-- End Table -->	
     			</div>
     			<div class="row right">
		     		{!! ($penjualan)->render() !!}
		     	</div>
     	</div>

@endsection

@section('footer')
    <script src="/inventory/INVENTORYY/public/js/jquery-1.12.4.js"></script>
    <script src="/inventory/INVENTORYY/public/js/jquery-ui.js"></script>
    <script type="text/javascript">
    	document.getElementById("penjualans").hidden = "true";
    	$( "#search" ).autocomplete({
	      source: '/autoP'
	    });
    </script>
@endsection