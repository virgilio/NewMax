<div class="visits view_">
<h2><?php  __('Visita');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($visit['Contact']['name'], array('controller' => 'users', 'action' => 'view', $visit['Contact']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $visit['Visit']['date']; ?>
			&nbsp;
		</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data da Visita'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $visit['Visit']['real_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $visit['Visit']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Observações'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $visit['Visit']['report']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<?php /*
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Visit', true), array('action' => 'edit', $visit['Visit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Visit', true), array('action' => 'delete', $visit['Visit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $visit['Visit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/ ?>