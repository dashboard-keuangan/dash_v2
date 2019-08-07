<table id="tb_semi_gas" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Jumlah</th>
                              <th>Tingkat</th>
                              <th>Jenis</th>
                              <th>Detail</th>
                            </tr>
                                                                                  
                                                      
                          </thead>
        <tbody>
      <?php foreach ($data as $yuhu) { ?>
        <tr>
          <td><?php echo $yuhu->Jumlah ?></td>
          <td><?php echo $yuhu->Tingkat ?></td>
          <td><?php echo $yuhu->Jenis ?></td>
          <td><button class="btn btn-success"><i class="fas fa-info-circle" onClick="detail_pembayaran('<?php echo $yuhu->id_siswa ?>','<?php echo $yuhu->Tingkat ?>')"></button></i></td>
        </tr>
      <?php } ?>
                              
    </tbody>
</table>
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#tb_semi_gas").DataTable();
  });
</script>
<script type="text/javascript">
      function detail_pembayaran(id,tingkat){
        var baru = id+"/"+tingkat;
      $.ajax({
        
        url: "<?php echo base_url() ?>home/detailii/"+id+'/'+tingkat,
        type: "GET",
        data:{ },
        error: function() {
              console.log(data);
              alert('Something is wrong');
           },
        success: function(data){
          $('#gaspartii').html(data);
        }
      })
    }
</script>