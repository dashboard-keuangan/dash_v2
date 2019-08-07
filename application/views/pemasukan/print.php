<table id="example" class="display" style="width:100%">
  <thead>
    <th>No Kwitansi</th>
    <th>Jumlah</th>
    <th>Tanggal</th>
    <th>Tanggal Input</th>
    <th>Tingkat</th>
  </thead>
    <?php foreach ($data as $yuhu) { ?>
        <tr>
          <td><?php echo $yuhu->no_kwitansi ?></td>
          <td><?php echo $yuhu->Jumlah ?></td>
          <td><?php echo $yuhu->Tanggal ?></td>
          <td><?php echo $yuhu->Tanggal_Input ?></td>
          <td><?php echo $yuhu->Tingkat ?></td>
        </tr>
      <?php } ?>
</table>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script>