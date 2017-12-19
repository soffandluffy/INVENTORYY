@extends('layouts.app')

@section('title')
    Tambah Barang Masuk | AVHERINDO
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
	</style>
@endsection

@section('content')
     <div class="container">
     	<div class="row"></div>
     	<h4 style="color: #448aff;">Tambah Barang</h4>
     	<div class="line">
     	</div><br>
     			<form class="col s12" action="{{url('barangmasuk/add')}}" method="POST" enctype="multipart/form-data">
     			{{ csrf_field() }}
				    <div class="row">
				        <div class="input-field col s12">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="icon_prefix" type="text" name="no_fak" class="validate">
				          <label for="icon_prefix">Nomor Faktur</label>
					    </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="tgl_trans" type="text" name="tgl_trans" class="datepicker">
				          <label for="tgl_trans">Tanggal Transaksi</label>
				        </div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="icon_prefix" type="text" name="supplier" class="validate">
				          <label for="icon_prefix">Supplier</label>
				        </div>
				        <div class="input-field col s6">
						    <select name="nama_barang">
						      <option value="" disabled selected>Pilih Barang</option>
				        @foreach($qty as $qtu)
						      <option value="{{$qtu->nama_barang}}">{{$qtu->nama_barang}}</option>
				        @endforeach
						    </select>
							<label>Nama Barang</label>
						</div>
				        <div class="input-field col s6">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="icon_prefix" type="text" name="jumlah" class="validate">
				          <label for="icon_prefix">Jumlah</label>
				        </div>
				    </div>
				        <div align="center" class="col s12">
				        	<a class="btn-flat waves-effect waves-light red" href="/barangmasuk" style="color: white;"><i class="material-icons left">cancel</i>Batal</a>
					      	<button class="btn-flat waves-effect waves-light blue accent-2" style="color: white;" type="submit"><i class="material-icons right">send</i>Submit</button>
				        </div>
		    	</form>
	     </div>
     

@endsection

@section('footer')
	<script type="text/javascript">
		document.getElementById("bmasuks").hidden = "true";
		$('.datepicker').pickadate({
				monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
				monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
				weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
				weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
			    selectMonths: true, // Creates a dropdown to control month
			    selectYears: 15, // Creates a dropdown of 15 years to control year,
			    today: 'Today',
			    clear: 'Clear',
			    close: 'Ok',
			    closeOnSelect: false // Close upon selecting a date,
			  });
	</script>
@endsection