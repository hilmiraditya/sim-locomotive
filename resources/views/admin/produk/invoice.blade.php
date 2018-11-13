<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }
    .table > tbody > tr > .no-line {
        border-top: none;
    }
    .table > thead > tr > .no-line {
        border-bottom: none;
    }
    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="invoice-title" align="center">
                <br>
                <img src="https://www.locomotiveproduction.com/assets/main/img/logo.png" style="width:15%;">
                <br><br>
                <h6><b>Locomotive Production :</b> (+62) 878-8696-1266 | <b>Locomotive Wedding :</b> (+62) 822-3459-9520</h6>
                <h6><b>Email :</b> admin@locomotiveproduction.com</h6>
                <h6><b>Alamat :</b> Jl. Juwono No. 7 Surabaya | Jl. Sedapmalam 18a Malang</h6>
            </div>
            <hr>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 align="center" class="panel-title"><strong>Katalog Produk</strong></h3>
                </div>
                <div class="panel-body">
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td><strong>No</strong></td>
                                    <td class="text-center"><strong>Nama Produk</strong></td>
                                    <td class="text-center"><strong>Harga</strong></td>
                                    <td class="text-center"><strong>Deskripsi</strong></td>
                                    <td class="text-right"><strong>Kuantitas</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a=1;?>
                                @foreach($produk as $produk)
                                <tr>
                                    <td>{{ $a }}</td>
                                    <td class="text-center">{{ $produk->nama_produk }}</td>
                                    <td class="text-center">
                                        {{ "Rp ".number_format($produk->harga_produk,0,',','.').",-" }}
                                    </td>
                                    <td class="text-center">{{ $produk->deskripsi_produk }}</td>
                                    <td class="text-right">{{ $produk->kuantitas_produk }}</td>
                                </tr>
                                <?php $a++;?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>