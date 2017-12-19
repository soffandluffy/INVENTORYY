@extends('layouts.app')

@section('title')
    Daftar Admin | AVHERINDO
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
		.line{
			height: 2px;
			overflow: hidden;
			background-color: #448aff;
			margin-bottom: 5px;
			margin-top: 5px;
		}
	</style>
@endsection

@section('content')
     	<div class="container">
     			<div class="row"></div>
     				<h4 style="color: #448aff;">Daftar Admin</h4>
     			<div class="line">
     			</div>
     			<div class="right">
     				<a class="btn-flat waves-effect waves-light blue accent-2" style="color: white;" href="{{url('/../register')}}"><i class="material-icons left">add</i>TAMBAH ADMIN</a>
     			</div>
     			<div class="row"></div>
     			<div class="row">
     				<!-- Table -->
			     	<table class="responsive-table">
				        <thead>
				          <tr>
				          	  <th>ID</th>
				              <th>Nama</th>
				              <th>Email</th>
				              <th>Tanggal Pembuatan</th>
				              <th>Aksi</th>
				          </tr>
				        </thead>
				        @foreach($admin as $key)
				        <tbody>
				          <tr>
				          	<td>{{$key->id}}</td>
				            <td>{{$key->name}}</td>
				            <td>{{$key->email}}</td>
				            <td>{{$key->created_at}}</td>
				            <td>
				            	<div>
				            		<?php
				            		$row = count($admin);

				            		if($row > 1){
				            			echo"<button id='delete' class='btn-floating waves-effect waves-light red tooltipped' data-position='top' data-tooltip='Hapus' onclick='hapus($key->id)'><i class='material-icons'>delete</i></button>";
				            		}
				            		 ?>
				            	</div>
				            </td>
				          </tr>
				        </tbody>
						@endforeach
				    </table>
			     	<!-- End Table -->	
     			</div>
     			<div class="row right">
		     		{!! ($admin)->render() !!}
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
				text: "Admin Akan Dihapus!",
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
				    window.location = '/admin/hapus/' + id;
				}
			});
		}
		
		$(document).ready(function(){
			document.getElementById("admins").hidden = "true";
	   		 $('.tooltipped').tooltip({delay: 50});
		});
	</script>
@endsection