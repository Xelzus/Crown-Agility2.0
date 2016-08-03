<br>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb alert1 alert1-info">
		  <li>
			<?php echo $this->Html->link(__('Forum'),'/Forums')?>
		  </li>
		  <li class="active">
		   <?php echo $forum['name']?>
		  </li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-4 ">
	  <p style="font-weight:bold;">
		  <?php
              echo $this->Paginator->counter('Showing {{start}} - {{end}} of {{count}}');
          ?>
	  </p>
	</div>

	<div class="col-lg-8">
	<p class="text-right">
		<?php echo $this->Html->link(__('Create Topic'),array('action'=>'add'),array('class'=>'btn btn-primary'))?>
	</p>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 alert">
		<table class="table">
			<thead>
				<tr class = "sidetitle1">
					<th colspan=2>Topic</th>
					<th>Author</th>
					<th>Created</th>
					<th>Posts</th>
					<th>Activity</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($topics as $topic): ?>
				<tr>
					<td>&nbsp;</td>
					<td>
						<?php
						echo $this->Html->link($topic['name'],
												array('controller'=>'topics','action'=>'view',$topic['id']));
						?>
					</td>
					<td><?php
						echo $this->Html->link($topic['user']['username'],
												array('controller'=>'profiles', 'action'=>'index', $topic['user']['id']));
						?>
					</td>
					<td><?php
							echo $this->Time->timeAgoInWords($topic['created']);
						?>
					</td>
					<td>
					   <?php
						echo count($topic['posts']);
					   ?>
					</td>
					<td>
					 <?php
					   if(count($topic['posts'])>0) {
						$post = $topic['posts'][0];
						echo $this->Time->timeAgoInWords($post['created']);
						echo '&nbsp;<small>by</small>&nbsp;';
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
