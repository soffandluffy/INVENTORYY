@extends('layouts.app')

@section('title')
    Data Barang | AVHERINDO
@endsection

@section('header')
      <link rel="stylesheet" href="/inventory/INVENTORYY/public/css/jquery-ui.css">
	<style type="text/css">
		th{
			text-align: center;
		}
		td{
			text-align: center;
			vertical-align: middle;
		}
	</style>
@endsection

@section('content')
     	<div class="container">
     			<div class="row"></div>
     				<h4 style="color: #448aff;">Data Barang</h4>
     			<div class="line">
     			</div>
     			<div align="right">
     				<a class="btn-flat waves-effect waves-light blue accent-2" style="color: white;" href="{{ url('downloadExcel/xls') }}"><i class="material-icons left">content_paste</i>Export</a>
     				<a class="btn-flat waves-effect waves-light blue accent-2" style="color: white;" href="{{url('barang/tambah')}}"><i class="material-icons left">add</i>TAMBAH BARANG</a>
     			</div>
     			<div class="line"></div>
     			<div class="row">
     				<form action="searchB" method="get">
						<div class="input-field right col">
							<button class="btn btn-flat blue accent-2" style="color: white;"><i class="material-icons left">search</i>Cari</button>
						</div>
					    <div class="input-field col s5 right">
					    	<i class="material-icons prefix">search</i>
					        <input id="search" type="text" name="search">
					        <label for="search">Nama Barang</label>
						</div>
     				</form>
     				<!-- Table -->
			     	<table class="responsive-table">
				        <thead>
				          <tr>
				          	  <th>Kode Barang</th>
				              <th>Nama Barang</th>
				              <th>Satuan</th>
				              <th>Harga Beli</th>
				              <th>Harga Jual</th>
				              <th>Aksi</th>
				          </tr>
				        </thead>
				        @foreach($barang as $key)
				        <tbody>
				          <tr>
				          	<td>{{$key->kode_barang}}</td>
				            <td>{{$key->nama_barang}}</td>
				            <td>{{$key->satuan}}</td>
				            <td>{{$key->harga_beli}}</td>
				            <td>{{$key->harga_jual}}</td>
				            <td>
				            	<div>
				            		 <a class="btn-floating waves-effect waves-light blue accent-2 tooltipped" data-position="top" data-tooltip="Edit" href="{{url('barang/ubah/'.$key->id)}}"><i class="material-icons">edit</i></a>
				            		 <button id="delete" class="btn-floating waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Hapus" onclick="hapus('{{$key->id}}')"><i class="material-icons">delete</i></button>
				            	</div>
				            </td>
				          </tr>
				        </tbody>
				        @endforeach
				    </table>
			     	<!-- End Table -->	
     			</div>
     			<div class="row right">
		     		{!! ($barang)->render() !!}
		     	</div>
     	</div>    

@endsection

@section('footer')
	<script src="/inventory/INVENTORYY/public/js/jquery-1.12.4.js"></script>
    <script src="/inventory/INVENTORYY/public/js/jquery-ui.js"></script>
	<script type="text/javascript">
		function hapus(id){
			swal({
			  title: "Apakah anda yakin?",
			  text: "Data Barang Akan Dihapus!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Ya",
			  cancelButtonText: "Tidak",
			  closeOnConfirm: false,
			  closeOnCancel: true
			},
			function(isConfirm){
			  if (isConfirm) {
			    window.location = 'barang/hapus/'+id;
			  }
			});
		}

		$(document).ready(function(){
			document.getElementById("barangs").hidden = "true";
		    $('.tooltipped').tooltip({delay: 50});
		  });
		
		$( "#search" ).autocomplete({
	      source: '/autoB'
	    });
	</script>
@endsection