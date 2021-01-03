<?php
include("../koneksi.php");
header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=data_transaksi.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Administrator</title>
</head>
<body class="padTop53 " >
  <h2>LAPORAN DATA TRANSAKSI</h2>
<table class="table table-striped table-bordered table-hover" >
  <thead>
      <tr>
        <th width="77"><div align="center">No.</div></th>
        <th width="263"><div align="center">Invoive Number</div></th>
        <th width="100"><div align="center">Jumlah</div></th>
        <th width="153"><div align="center">Tanggal Bayar</div></th>
        <th width="153"><div align="center">Total_Beli</div></th>
        <th width="153"><div align="center">Ongkos Kirim</div></th>
        <th width="153"><div align="center">Total_Bayar</div></th>
        <th width="132"><div align="center">Status Bayar</div></th>
      </tr>
  </thead>
  <tbody>
    <?php
      $result = mysql_query("SELECT * FROM `tbl_transaksi` ORDER BY `id_transaksi`"); 
      $No = 1;
      while ($data = mysql_fetch_array($result)) {
    ?>
      <tr>
        <td><div align="center"><?php echo $No ?></div></td>
        <td><div align="left"><?php echo $data['Kd_Invoice'] ?></div></td>
        <td><div align="center"><?php echo $data['Jumlah_Barang'] ?></div></td>
        <td><div align="left"><?php echo $data['Tanggal_Bayar'] ?></div></td>
        <td><div align="left">Rp. <?php echo number_format($data['Total_Beli'],0,',','.')?></div></td>
        <td><div align="left">Rp. <?php echo number_format($data['Fee_Kirim'],0,',','.')?></div></td>
        <td><div align="left">Rp. <?php echo number_format($data['Total_Bayar'],0,',','.')?></div></td>
        <td><div align="left"><?php echo $data['Status_Bayar'] ?></div></td>  
      </tr>
      <?php
      $No++;
      }									
      ?>                                                                                                        
  </tbody>
</table>
</body>
</html>