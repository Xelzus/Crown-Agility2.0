<br>
<!--test-->
<div class="row">
	<div class="col-lg-12 ">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan=2>Forum</th>
					<th>Topics</th>
					<th>Posts</th>
					<th>Activity</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($forums as $forum): ?>
				<tr>
					<td>&nbsp;</td>
					<td>
						<?php
						echo $this->Html->link('<h4>'.$forum['name'].'</h4>',
												array('controller'=>'topics','action'=>'index',$forum['id']),
												array('escape'=>false));
						?>
					</td>
					<td><?php echo count($forum['topics']);?></td>
					<td><?php echo count($forum['posts']);?></td>
					<td>
					   <?php
					   if(count($forum['posts'])>0) {
						$post = $forum['posts'][0];
						echo $this->Html->link($post['topic']['name'],array('controller'=>'topics',
																					'action'=>'view',
																					$post['topic']['id']));
						echo '&nbsp;';
						echo $this->Time->timeAgoInWords($post['created']);
						echo '&nbsp;<small>ago by</small>&nbsp;';
						echo '&nbsp;';
						echo $this->Html->link($post['user']['username'],array('controller'=>'profiles',
																						'action'=>'index',
																						$post['user']['id']));
					   }
					   ?>

					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		<div class="pull-right">
			<?php
				echo $this->element('paginator');
			?>
		 </div>
	</div>
</div>
