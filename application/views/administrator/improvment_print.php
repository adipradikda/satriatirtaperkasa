<style type="text/css">
table, td, th {
  border: 1px solid;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
<div class="text-center">
    <h4>Improvment</h4>
    <p>PT KERRY INGRIDIENTS</p>
</div>
<table class="table table striped table-hover table-bordered">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Keterangan</th>
        <th>Gambar</th>
        <th>Status</th>
    </tr>

    <?php foreach($improvment as $no => $value):
        $path = 'assets/uploads/improvment/'.$value->gambar;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    <tr>
        <td><?php echo ($no+1); ?></td>
        <td><?php echo $value->judul; ?></td>
        <td><?php echo $value->keterangan; ?></td>   
        <td><img src="<?php echo $base64; ?>" width="100"></td>
        <td><?php echo $value->status; ?></td>
    </tr>
    <?php endforeach; ?>
        

</table>