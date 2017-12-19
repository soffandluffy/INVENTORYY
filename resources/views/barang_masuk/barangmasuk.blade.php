@extends('layouts.app')

@section('title')
    Barang Masuk | AVHERINDO
@endsection

@section('header')
	<link rel="stylesheet" href="../css/jquery-ui.css">
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
     				<h4 style="color: #448aff;">Data Barang Masuk</h4>
     			<div class="line">
     			</div>
     			<div align="right">
     				<a class="btn-flat waves-effect waves-light blue accent-2" style="color: white;" href="{{ url('bm/downloadExcel/xls') }}"><i class="material-icons left">content_paste</i>Export</a>
     				<a class="btn-flat waves-effect waves-light blue accent-2" style="color: white;" href="{{url('barangmasuk/tambah')}}"><i class="material-icons left">add</i>TAMBAH BARANG MASUK</a>
     			</div>
     			<div class="line"></div>
     			<div class="row">
     				<form action="searchBM" method="get">
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
				              <th>No.Faktur</th>
				              <th>Tanggal Transaksi</th>
				              <th>Nama Barang</th>
				              <th>Nama Supplier</th>
				              <th>Jumlah</th>
				              <th>Total Harga</th>
				          </tr>
				        </thead>
				        @foreach($barang_masuk as $key)
				        <tbody>
				          <tr>
				          	<td>{{$key->no_trans}}</td>
				            <td>{{$key->no_fak}}</td>
				            <td>{{$key->tgl_trans}}</td>
				            <td>{{$key->nama_barang}}</td>
				            <td>{{$key->supplier}}</td>
				            <td>{{$key->jumlah}}</td>
				            <td>{{$key->total_harga}}</td>
				          </tr>
				        </tbody>
				        @endforeach
				    </table>
			     	<!-- End Table -->
     			</div>
     			<div class="row right">
		     		{!! ($barang_masuk)->render() !!}
		     	</div>
     		</div>

@endsection

@section('footer')
	<script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script type="text/javascript">
    	document.getElementById("bmasuks").hidden = "true";
    	$( "#search" ).autocomplete({
	      source: '/autoBM'
	    });
    </script>
@endsection