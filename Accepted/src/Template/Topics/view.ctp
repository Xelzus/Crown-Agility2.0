<br>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <?php echo $this->Html->link(__('Forum'),'/Forums')?>
            </li>
            <li>
                <?php echo $this->Html->link($forum['name'],array('controller'=>'topics','action'=>'index',$forum['id']))?>
            </li>
            <li class="active">
                <?php echo $topic['name'];?>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <p class="lead">
        <?php echo $topic['content'];?>
        </p>
    </div>

    <div class="col-lg-4">
        <p class="text-right">
            <?php echo $this->Html->link(__('Create Topic'),array('action'=>'add'),
                                                            array('class'=>'btn btn-primary'))?>

            <?php echo $this->Html->link(__('Post Reply'),array('controller'=>'posts','action'=>'add',$topic['id']),
                                                            array('class'=>'btn btn-primary'))?>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <p style="font-weight: bold;">
        <?php
            echo $this->Paginator->counter('Showing {{start}} - {{end}} of {{count}}');
        ?>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered  ">
            <tbody>
                <?php
                foreach ($posts as $post) :
                ?>
                    <tr>
                        <td><small>
                            <?php
                                echo $this->Time->timeAgoInWords($post['created']);
                            ?></small>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    </tr>
                    <td width="150px">
                        <p>
                            <?php
                                echo $this->Html->link($post['user']['username'],
                                                        array('controller'=>'profiles','action'=>'index', $post['user']['id']));
                            ?>
                        </p>
                        <?php $hash = md5($post['user']['email']);?>
                        <?= $this->Html->image('crownAgilityLogo.png', ['height' => '100', 'width' => '100']) ?>
                    </td>
                    <td>
                        <p>
                            <?php echo $post['content'];?>
                        </p>
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
        <div class="clearfix"></div>
        <div class="well">
            <h5><?php echo __('Quick Reply');?></h4>
            <?php echo $this->Form->create('Post',array('url'=>array('controller'=>'posts','action'=>'add'),
                                                         'inputDefaults'=>array('label'=>false)));?>
                <div class="form-group">
                    <?php echo $this->Form->textarea('content',array('class'=>'form-control','rows'=>5));?>
                </div>
                <?php echo $this->Form->hidden('topic_id',array('value'=>$topic['id']));?>
                <?php echo $this->Form->hidden('forum_id',array('value'=>$forum['id']));?>
                <?php echo $this->Form->submit(__('Post Reply'),array('class'=>'btn btn-primary'))?>
            <?php echo $this->Form->end();?>
        </div>
    </div>
</div>
