<!-- Password client -->
       <!--  Modals-->
<?php echo form_open(base_url('admin/client/password/'.$client->id_client)) ?>       
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
  <tr>
    <td width="22%">Username (email)</td>
    <td width="78%"><input type="email" name="email" value="<?php echo $client->email ?>" placeholder="Email/username" class="form-control" readonly></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="password" value="<?php if($client['password_hint']=="") { $this->load->helper('string'); echo random_string('alnum', 8); }else{ echo $client['password_hint']; } ?>" placeholder="Password" class="form-control" required></td>
  </tr>
</table>

       <input type="hidden" name="id_client" value="<?php echo $client->id_client ?>">
    <input type="submit" name="submit" value="Berikan Akses" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary">

<?php form_close() ?>