<?php

$tittle = 'Keranjang';
require_once './../src/proses/proses_session.php';

$current_session = session_manager("get_session", [
    "username",
    "role",
]);
include_once('../layout/navbar.php');
?>
<section id="keranjang">
    <div class="row">
        <div class="col col-md-8">
            <h3>Keranjang</h3>
            <hr>
            <!-- Foreach -->
            <p><i class="fa fa-store"></i><b class="ml-1"> Nama Toko</b></p>
            <div class="row">
                <div class="col col-md-3">
                    <img src="../assets/upload/produk/1442200225_20200213_103459.jpg" style="max-width: 150px;" alt="Nama Produk">
                </div>
                <div class="col col-md-9">
                    <p class="mb-0"><b>Nama Produk</b></p>
                    <p>Jumlah : 1</p>
                    <p class="font-weight-bold">Rp 100.000</p>
                </div>
            </div>
            <hr>
            <!-- endforech -->
            <!-- Foreach -->
            <p><i class="fa fa-store"></i><b class="ml-1"> Nama Toko</b></p>
            <div class="row">
                <div class="col col-md-3">
                    <img src="../assets/upload/produk/1442200225_20200213_103459.jpg" style="max-width: 150px;" alt="Nama Produk">
                </div>
                <div class="col col-md-9">
                    <p class="mb-0"><b>Nama Produk</b></p>
                    <p>Jumlah : 1</p>
                    <p class="font-weight-bold">Rp 100.000</p>
                </div>
            </div>
            <hr>
            <!-- endforech -->
        </div>
        <div class="col col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Ringkasan</h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p>Total Harga (1 Barang)</p>
                        <p class="font-weight-bold">Rp 100.000</p>
                    </div>
                    <hr>
                    <button class="btn btn-success btn-block">Beli</button>
                </div>
            </div>
        </div>
    </div>
</section>