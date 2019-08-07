
<table id="tb_daftar_siswa" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>ID Siswa</th>
                              <th>NIS</th>
                              <th>Nama Lengkap</th>
                              <th>Jenis Kelamin</th>
                              <th>Detail</th>
                            </tr>
                                                                                  
                                                      
                          </thead>
        <tbody>
      <?php foreach ($data as $yuhu) { ?>
        <tr>
          <td><?php echo $yuhu->id_siswa ?></td>
          <td><?php echo $yuhu->NIS ?></td>
          <td><?php echo $yuhu->Nama_Lengkap ?></td>
          <td><?php echo $yuhu->Jenis_Kelamin ?></td>
          <td><button class="btn btn-success"><i class="fas fa-info-circle" onClick="detail('<?php echo $yuhu->id_siswa ?>')"></button></i></td>
        </tr>
      <?php } ?>
                              
    </tbody>
                 
 </div>
</table>
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#tb_daftar_siswa").DataTable();
  });
</script>