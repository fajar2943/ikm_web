<html>

<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse: collapse;
      table-layout: fixed;
      width: 630px;
    }

    table td {
      word-wrap: break-word;
      width: 20%;
    }
  </style>
</head>

<body>
  <b><?php echo $ket; ?></b><br /><br />

  <table border="1" cellpadding="8">
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Bidang</th>
      <th>Penilaian</th>
      <th>Jumlah</th>
    </tr>
    <?php
    if (!empty($penilaian)) {
      $no = 1;
      $total = 0;
      foreach ($penilaian as $data) {
        $pindah = date('d-m-Y', strtotime($data->pindah));
        $total += $data->jumlah;
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $pindah . "</td>";

        $p_id = $data->pertanyaan_id;
        $get_p =  $this->db->get_where('pertanyaan', ["pertanyaan_id" => $p_id])->row();
        $id_bid = $get_p->bidang_id;
        $bidang =  $this->db->get_where('bidang', ["bidang_id" => $id_bid])->row();
        echo "<td>" . $bidang->bidang_name . "</td>";

        $e_id = $data->emot_id;
        $get_e = $this->db->get_where('emot', ["emot_id" => $e_id])->row();
        echo "<td>" . $get_e->name . "</td>";
        echo "<td>" . $data->jumlah . "</td>";
        echo "</tr>";
        $no++;
      }
    }
    ?>
    <tr>
      <td colspan="4" align="right"><b>Total Pengunjung</b></td>
      <td align="right"><?php echo $total ?></b></td>
    </tr>
  </table>
  <script>
    window.print();
  </script>
</body>

</html>