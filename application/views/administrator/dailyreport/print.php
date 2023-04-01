
<style type="text/css">
table, td, th {
  border: 1px solid;
}

table {
  width: 100%;
  border-collapse: collapse;
}
td,th{
    font-size: 5px!important;
}
*,
*:before,
*:after {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

.text-center{
    text-align: center!important;
}
</style>
<div class="text-center">
    <h4>Daily Report</h4>
    <p>SATRIA TIRTA PERKASA</p>
</div>

<table class="table table-bordered" border="3" align="center">
    <tr>
        <th class="align-middle text-center" rowspan="3">Date</th>
        <th class="align-middle text-center" colspan="6">Flowrate</th>
        <th class="align-middle text-center" colspan="4">Inlet/Outlet</th>
        <th class="align-middle text-center" colspan="7">Chemical</th>
        <th class="align-middle text-center" colspan="3" rowspan="2">MBBR</th>
        <th class="align-middle text-center" colspan="3" rowspan="2">Hasil Olahan Sludge</th>
        <th class="align-middle text-center" colspan="5" rowspan="2">Buang Limbah Di Sumpit</th>
        <th class="align-middle text-center" rowspan="3" >KETERANGAN</th>
    </tr>
    <tr>
        
        <th class="align-middle text-center" colspan="3">Total Flow Inlet</th>
        <th class="align-middle text-center" colspan="3">Total Flow Outlet</th>
        <th class="align-middle text-center" colspan="2">EQ</th>
        <th class="align-middle text-center" colspan="2">DAF 2</th>
        <th class="align-middle text-center">FeCL3</th>
        <th class="align-middle text-center">Anion</th>
        <th class="align-middle text-center">Cation</th>
        <th class="align-middle text-center">Coustik</th>
        <th class="align-middle text-center">Bakteri</th>
        <th class="align-middle text-center">Anti Foam</th>
    </tr>
    <tr>
        <th class="align-middle text-center">Awal</th>
        <th class="align-middle text-center">Akhir</th>
        <th class="align-middle text-center">Hasil Proses</th>
        <th class="align-middle text-center">Awal</th>
        <th class="align-middle text-center">Akhir</th>
        <th class="align-middle text-center">Hasil Proses</th>
        <th class="align-middle text-center">pH</th>
        <th class="align-middle text-center">TDS</th>
        <th class="align-middle text-center">pH</th>
        <th class="align-middle text-center">TDS</th>
        <th class="align-middle text-center">ml</th>
        <th class="align-middle text-center">kg</th>
        <th class="align-middle text-center">kg</th>
        <th class="align-middle text-center">liter</th>
        <th class="align-middle text-center">liter</th>
        <th class="align-middle text-center">liter</th>
        <th class="align-middle text-center">pH</th>
        <th class="align-middle text-center">TDS</th>
        <th class="align-middle text-center">SV 30</th>
        <th class="align-middle text-center">Stok Karung</th>
        <th class="align-middle text-center">Karung SAK</th>
        <th class="align-middle text-center">Jumbo Bag</th>
        <th class="align-middle text-center">Angkut Mobil Limbah</th>
        <th class="align-middle text-center">Saos</th>
        <th class="align-middle text-center">Mayones</th>
        <th class="align-middle text-center">Keju</th>
        <th class="align-middle text-center">IBC</th>
    </tr>
    <?php foreach ($date_note as $k => $value ): ?>
        <tr>
            <td style="max-width: 80px"><?php echo tgl_indo($value->tanggal); ?></td>
            <td width="10"><?php echo $value->awal_inlet; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->akhir_inlet; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->hasil_proses_m3_1; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->awal_outlet; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->akhir_outlet; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->hasil_proses_m3_2; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->ph_eq; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->tds_eq; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->ph_daf; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->tds_daf; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->fecl3; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->anion; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->cation; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->coustik; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->bakteri; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->antifoam; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->ph; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->tds; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->sv_30; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->stok_karung; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->karung_sak; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->jumbo_bag; ?></td>
            <td style="max-width: 5px!important"><?php echo $value->angkut_mobil_limbah; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->saos; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->mayones; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->keju; ?></td>
            <td style="max-width: 10px!important"><?php echo $value->ibc; ?></td>
            <td style="min-width: 100px"><?php echo $value->catatan; ?></td>
        </tr>
    <?php endforeach; ?>
</table>