<div>
	<p>
		<h2><a href=<?php echo base_url()."users/";?>>List of users</a></h2>
		<?php if ($this->session->userdata('username')):?>
			<p>Hello: <?php print_r($this->session->userdata('username'));?></p>
			<p>Previos time zone: <span id="previosTimeZone"><?php echo $this->session->userdata('userTimeZone');?></span> <span id="change"></span></p>
			<p>New time zone: <span id="newTimeZone"></span></p>
			<a href=<?=base_url().'logout';?>>Log out</a>
		<?php endif;?>
		<?=$user_id = $this->input->get('id');?>
		<?=$user_time_zone = $this->input->get('time_zone');?>
	</p>
</div>
<script type="text/javascript">
	var userId = "<?php print_r($this->session->userdata('userId'));?>";
	var userRemindChanges = "<?php echo $this->session->userdata('user_remind_changes'); ?>";
</script>