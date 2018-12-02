<html>
  <head>
    <title>Persetujuan Produksi</title>
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.locomotiveproduction.com/sim/assets/main/favicon.png">
    <style>
      td { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px;}
      .head { font-size: 14px; }
    </style>
  </head>
  <body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" onload="window.print()">
    <div align="center">
      <!-- Header -->
      <table width="800">
        <tbody>
          <tr>
            <td align="center" colspan="2" class="head">
              <strong>Cakralaksana Sejahtera<br>
              Unit : 
              Locomotive Wedding              <br>
              <a href="www.locomotiveproduction.com" target="_blank">www.locomotiveproduction.com</a> <br>
              <br>
            </strong>
            </td>
          </tr>
          <tr>
            <td>
              Tanggal buat : {{$data['pesanan']->created_at}}  </td>
            <td align="right">
              Tanggal cetak : {{$data['waktu']}}</td>
          </tr>
        </tbody>
      </table>
      <br>
      <!-- Persetujuan Produksi -->
      <table width="800">
        <tbody>
          <tr>
            <td colspan="2"><strong>SURAT PERSETUJUAN</strong></td>
          </tr>
          <tr>
            <td><strong>No.</strong></td>
            <td style="border-bottom:1pt solid black;"></td>
          </tr>
          <tr>
            <td width="100"><strong>Unit Produksi</strong></td>
            <td>{{$data['pesanan']->unit_produksi}}</td>
          </tr>
          <tr>
            <td colspan="2" style="padding-top:8px">Saya yang bertanda tangan dibawah ini:</td>
          </tr>
        </tbody>
      </table>
      <br>
      <!-- Data Client -->
      <table width="800" border="0" cellpadding="5" cellspacing="0" style="border:1px solid black;border-collapse:collapse">
        <tbody>
          <!-- <tr>
            <td width="150" style="font-weight: bold;">Nama</td>
            <td style="font-weight: bold;text-align: center;">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined property: stdClass::$unit_produksi</p>
<p>Filename: admin/view_export_persetujuan_produksi.php</p>
<p>Line Number: 72</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/u5318451/public_html/c001/sim/application/views/admin/view_export_persetujuan_produksi.php<br />
			Line: 72<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/u5318451/public_html/c001/sim/application/controllers/admin/Daftar_pesanan.php<br />
			Line: 128<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: /home/u5318451/public_html/c001/sim/index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div></td>
          </tr> -->
          <tr>
            <td width="150" style="font-weight: bold;">Nama</td>
            <td>{{$data['pesanan']->nama_klien}}</td>
          </tr>
          <tr>
            <td width="150" style="font-weight: bold;">No. KTP</td>
            <td>{{$data['pesanan']->noidentitas_klien}}</td>
          </tr>
          <tr>
            <td width="150" style="font-weight: bold;">Alamat</td>
            <td>{{$data['pesanan']->alamat_klien}}</td>
          </tr>
          <tr>
            <td width="150" style="font-weight: bold;">Perusahaan</td>
            <td>{{$data['pesanan']->perusahaan_klien}}</td>
          </tr>
          <tr>
            <td width="150" style="font-weight: bold;">Jabatan</td>
            <td>{{$data['pesanan']->jabatan_klien}}</td>
          </tr>
          <tr>
            <td width="150" style="font-weight: bold;">Email</td>
            <td>{{$data['pesanan']->email_klien}}</td>
          </tr>
          <tr>
            <td width="150" style="font-weight: bold;">No. Telepon</td>
            <td>{{$data['pesanan']->notelp_klien}}</td>
          </tr>
          <tr>
            <td width="150" style="font-weight: bold;">No. WhatsApp</td>
            <td>{{$data['pesanan']->nowhatsapp_klien}}</td>
          </tr>
          <tr>
            <td width="150" style="font-weight: bold;">Akun Instagram</td>
            <td>http://www.instagram.com/{{$data['pesanan']->instagram_klien}}</td>
          </tr>
        </tbody>
      </table>
      <br>
      <!-- Detail Produksi -->
      <table width="800">
        <tbody>
          <tr>
            <td>
              Kemudian disebut sebagai “Klien”, dengan ini menyatakan untuk menyetujui Penawaran Produksi<br>
              secara elektronik yang telah dilakukan oleh Locomotive Wedding.</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><strong>DETAIL PRODUKSI</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <table width="800" border="0" cellpadding="5" cellspacing="0" style="border:1px solid black;border-collapse:collapse">
                <tbody>
                  <tr>
                    <td width="30"><strong><center>No.</center></strong></td>
                    <td><strong>Item Produksi</strong></td>
                    <td><strong>Deskripsi</strong></td>
                    <td><strong>Quantity</strong></td>
                  </tr>
                  <?php $a=1; ?>
                  @foreach($data['orderproduk'] as $orderproduk)
                  <tr>
                    <td>{{ $a }}</td>
                    <td>{{ $orderproduk->nama_produk }}</td>
                    <td>{{ $orderproduk->deskripsi_produk }}</td>
                    <td>{{ $orderproduk->kuantitas_produk }}</td>
                  </tr>
                  <?php $a++; ?>
                  @endforeach
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
      <br>
      <!-- Agenda Produksi -->
      <table width="800">
        <tbody>
          <tr>
            <td colspan="2"><strong>AGENDA PRODUKSI</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <table width="800" border="0" cellpadding="5" cellspacing="0" style="border:1px solid black;border-collapse:collapse">
                <tbody>
                  <tr>
                    <td>
                    	{{$data['pesanan']->deskripsi_agenda_produksi}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <!-- Revisi & Serah Terima Produksi -->
      <table width="800">
        <tbody>
          <tr>
            <td colspan="2"><strong>JADWAL REVISI DAN SERAH TERIMA</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <table width="800" border="0" cellpadding="5" cellspacing="0" style="border:1px solid black;border-collapse:collapse">
                <tbody>
                  <tr>
                    <td><strong>Preview Pertama</strong></td>
                    <td>Tanggal <strong>{{$data['pesanan']->preview_pertama}}</strong></td>
                  </tr>
                  <tr>
                    <td><strong>Revisi Pertama</strong></td>
                    <td>Tanggal <strong>{{$data['pesanan']->jadwal_1}}</strong></td>
                  </tr>
                  <tr>
                    <td><strong>Revisi Kedua</strong></td>
                    <td>Tanggal <strong>{{$data['pesanan']->jadwal_2}}</strong></td>
                  </tr>
                  <tr>
                    <td><strong>Serah Terima</strong></td>
                    <td>Tanggal <strong>{{$data['pesanan']->serah_terimah}}</strong></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
      <br>
      <!-- Harga -->
      <table width="800">
        <tbody>
          <tr>
            <td colspan="2"><strong>HARGA</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <table width="800" border="0" cellpadding="5" cellspacing="0" style="border:1px solid black;border-collapse:collapse">
                <tbody>
                  <tr>
                    <td><strong>{{ "Rp ".number_format($data['pesanan']->total_harga,0,',','.').",-" }}</strong></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <!-- Pembayaran -->
      <table width="800">
        <tbody>
          <tr>
            <td colspan="2"><strong>PEMBAYARAN</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <table width="800" border="0" cellpadding="5" cellspacing="0" style="border:1px solid black;border-collapse:collapse">
                <tbody>
                  <tr>
                    <td><strong>Termin</strong></td>
                    <td>
                      <strong>35%</strong> DP<br>
                      <strong>65%</strong> Lunas maksimal H-3 hari produksi pertama
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Metode</strong></td>
                    <td>
                      <strong>Tunai</strong> atau<br>
                      <strong>Transfer</strong> ke Rekening 
                      <b>1520 4512 49 (Bank BCA - atas nama Budiarmanto Setyo Hutomo)</b>                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <!-- Catatan Lain -->
      <table width="800">
        <tbody>
          <tr>
            <td colspan="2"><strong>CATATAN LAIN</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <table width="800" border="0" cellpadding="5" cellspacing="0" style="border:1px solid black;border-collapse:collapse">
                <tbody>
                  <tr>
                    <td>
                    	@if($data['pesanan']->catatan_lain == NULL) Tidak ada catatan lain
                    	@else {{$data['pesanan']->catatan_lain}}
                    	@endif
					</td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <!-- Footer -->
      <table width="800">
        <tbody>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Selanjutnya terhadap Surat Persetujuan ini:</td>
          </tr>
          <tr>
            <td>
              <ul>
                <li>
                  Saya telah menyetujui seluruhnya dan telah melakukan penandatanganan secara elektronik dengan mencentang Kolom Persetujuan. 
                </li>
                <li>
                  Saya sepenuhnya mengakui, menyatakan, serta menjamin bahwa seluruh Data Pribadi yang Saya cantumkan dalam Surat Persetujuan ini adalah benar.
                </li>
                <li>
                  Saya sepenuhnya menyetujui Surat Persetujuan ini tanpa adanya paksaan dan atau tekanan dari Pihak manapun.
                </li>
                <li>
                  Saya bersedia mematuhi Syarat dan Ketentuan sebagaimana terlampir pada Persetujuan Produksi ini serta mengakui bahwa Surat Persetujuan Produksi ini adalah sah sebagai Perjanjian yang mengikat para pihak.
                </li>
                <li>
                  Pelanggaran terhadap perjanjian akan dikenakan sanksi sesuai hukum yang berlaku.
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Demikian dengan ini Surat Persetujuan dibuat untuk dipergunakan sesuai peruntukannya.</td>
          </tr>
          <tr>
            <td><br><br><br><br><br><br><br></td>
          </tr>
          <tr>
            <td><b>Rezaldy Alief Pramada</b></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
                        <td><img width="100" src="https://www.locomotiveproduction.com/assets/main/logo/wedding-logo-black.png"></td>
                      </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
              Sales Processed by Bramantyo DW, Marketing Manager, Locomotive Wedding, 0822 3459 9520<br>Approved by Director            </td>
          </tr>
          <tr>
            <td>Malang, {{$data['waktu']}}</td>
          </tr>
          <tr>
            <td style="border-bottom: 1px solid #000;">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><strong>TEMBUSAN</strong></td>
          </tr>
          <tr>
            <td>
              <ul>
                <li>Archieve</li>
                                <li>Production Team Locomotive Wedding (<a href="mailto:shincebong@gmail.com?Subject=Hello%20again" target="_top">shincebong@gmail.com</a>)</li>
                                <li>Finance Team (<a href="mailto:cakhelm@gmail.com?Subject=Hello%20again" target="_top">cakhelm@gmail.com</a>)</li>
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <br>
  </body>
</html>