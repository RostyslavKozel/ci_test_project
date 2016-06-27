<div>
	<?php foreach($users as $user):?>
		<p><?=$user['id'];?></p>
		<p><?=$user['name'];?></p>
		<p><?=$user['time_zone'];?></p>
		<p><a href=<?=base_url().'login/'.$user['id'];?>>Login this user</a> <a href=<?=base_url();?>>Main</a></p>
		<hr>	
	<?php endforeach;?>
</div>