<table id="detailii" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>ID Siswa</th>
                              <th>No Kwitansi</th>
                              <th>Jumlah</th>
                              <th>Tingkat</th>
                              <th>Jenis</th>
                            </tr>
                                                                                  
                                                      
                          </thead>
        <tbody>
      <?php foreach ($data as $yuhu) { ?>
        <tr>
          <td><?php echo $yuhu->id_siswa ?></td>
          <td><?php echo $yuhu->no_kwitansi ?></td>
          <td><?php echo $yuhu->Jumlah ?></td>
          <td><?php echo $yuhu->Tingkat ?></td>
          <td><?php echo $yuhu->Jenis ?></td>
        </tr>
      <?php } ?>
                              
    </tbody>
</table>
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#detailii").DataTable();
  });
</script>