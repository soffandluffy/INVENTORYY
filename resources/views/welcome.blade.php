@extends('layouts.app')

@section('title')
    Home | AVHERINDO
@endsection

@section('header')
    <style type="text/css">
    .pane1{
        background-color: #448aff; 
        width: 250px; 
        height: 135px;
        border: solid;
        cursor: pointer;
    }
    .pane2{
        background-color: #448aff; 
        width: 250px; 
        height: 135px;
        margin-top: 135px;
        border: solid;
        cursor: pointer;
    }
    .pane3{
        background-color: #448aff; 
        width: 250px; 
        height: 135px;
        border: solid;
        cursor: pointer;
    }
    .pane4{
        background-color: #448aff; 
        width: 250px; 
        height: 135px;
        margin-top: -20px;
        border: solid;
        cursor: pointer;
    }
    .pane5{
        background-color: #448aff; 
        width: 250px; 
        height: 135px;
        margin-top: -20px;
        margin-left: 250px;
        border: solid;
        cursor: pointer;
    }
    .menu{
        margin-top: 80px;
        margin-left: 23%;
    }
    </style>
@endsection
@section('content')
    <div class="menu">
        <div class="row">
            <div id="stok" class="pane1 col" onmousemove="moveS()" onmouseleave="outS()" onclick="stok()">
                <center>
                    <i class="large material-icons" style="vertical-align: middle;">view_list</i><br>
                    <a href="/barang" style="color: white; font-size: 22px; cursor: pointer;">Stok Barang</a>
                </center>
            </div>
            <div id="admin" class="pane2 col" onmousemove="moveA()" onmouseleave="outA()" onclick="admin()">
                <center>
                    <i class="large material-icons" style="vertical-align: middle;">person</i><br>
                    <a href="/admin" style="color: white; font-size: 22px; cursor: pointer;">Admin</a>
                </center>
            </div>
            <div id="barang" class="pane3 col" onmousemove="moveB()" onmouseleave="outB()" onclick="barang()">
                <center>
                    <i class="large material-icons" style="vertical-align: middle;">view_comfy</i><br>
                    <a href="/barang" style="color: white; font-size: 22px; cursor: pointer;">Barang</a>
                </center>
            </div>
        </div>
        <div class="row">
            <div id="penjualan" class="pane4 col" onmousemove="moveP()" onmouseleave="outP()" onclick="penjualan()">
                <center>
                    <i class="large material-icons" style="vertical-align: middle;">shopping_cart</i><br>
                    <a href="/penjualan" style="color: white; font-size: 22px; cursor: pointer;">Penjualan</a>
                </center>
            </div>
            <div id="bm" class="pane5 col" onmousemove="moveBM()" onmouseleave="outBM()" onclick="masuk()">
                <center>
                    <i class="large material-icons" style="vertical-align: middle;">subdirectory_arrow_right</i><br>
                    <a href="/barangmasuk" style="color: white; font-size: 22px; cursor: pointer;">Barang Masuk</a>
                </center>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script type="text/javascript">
        function stok(){
            window.location = '/stok';
        }

        function admin(){
            window.location = '/admin';
        }

        function barang(){
            window.location = '/barang';
        }

        function penjualan(){
            window.location = '/penjualan';
        }

        function masuk(){
            window.location = '/barangmasuk';
        }

        function moveS(){
            document.getElementById("stok").style.border = "solid #95a5a6";
        }

        function outS(){
            document.getElementById("stok").style.border = "solid";
        }

        function moveA(){
            document.getElementById("admin").style.border = "solid #95a5a6";
        }

        function outA(){
            document.getElementById("admin").style.border = "solid";
        }

        function moveB(){
            document.getElementById("barang").style.border = "solid #95a5a6";
        }

        function outB(){
            document.getElementById("barang").style.border = "solid";
        }

        function moveP(){
            document.getElementById("penjualan").style.border = "solid #95a5a6";
        }

        function outP(){
            document.getElementById("penjualan").style.border = "solid";
        }

        function moveBM(){
            document.getElementById("bm").style.border = "solid #95a5a6";
        }

        function outBM(){
            document.getElementById("bm").style.border = "solid";
        }

        document.getElementById("stoks").hidden = "true";
        document.getElementById("barangs").hidden = "true";
        document.getElementById("bmasuks").hidden = "true";
        document.getElementById("penjualans").hidden = "true";
        document.getElementById("admins").hidden = "true";
    </script>
@endsection