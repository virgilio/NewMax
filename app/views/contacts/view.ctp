<div class="contacts view_">
    <h2><?php  __('Contact');?></h2>
    <dl><?php $i = 0;
$class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $contact['Contact']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Client'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($contact['Client']['name'], array('controller' => 'clients', 'action' => 'view', $contact['Client']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($contact['User']['id'], array('controller' => 'users', 'action' => 'view', $contact['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Frequency'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $contact['Contact']['frequency']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Funcao'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $contact['Contact']['funcao']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $contact['Contact']['name']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $contact['Contact']['phone']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $contact['Contact']['email']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ativo'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $client['Contact']['active'] == '1' ? 'Sim' : 'Não'; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $contact['Contact']['created']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $contact['Contact']['modified']; ?>
            &nbsp;
        </dd>
    </dl>
</div>

<?php
/*
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Contact', true), array('action' => 'edit', $contact['Contact']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Contact', true), array('action' => 'delete', $contact['Contact']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contact['Contact']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Contacts', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Contact', true), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php __('Related Visits');?></h3>
<?php if (!empty($contact['Visit'])):?>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php __('Id'); ?></th>
            <th><?php __('Contact Id'); ?></th>
            <th><?php __('Date'); ?></th>
            <th><?php __('Status'); ?></th>
            <th><?php __('Report'); ?></th>
            <th><?php __('Created'); ?></th>
            <th><?php __('Modified'); ?></th>
            <th class="actions"><?php __('Actions');?></th>
        </tr>
            <?php
            $i = 0;
            foreach ($contact['Visit'] as $visit):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
        ?>
        <tr<?php echo $class;?>>
            <td><?php echo $visit['id'];?></td>
            <td><?php echo $visit['contact_id'];?></td>
            <td><?php echo $visit['date'];?></td>
            <td><?php echo $visit['status'];?></td>
            <td><?php echo $visit['report'];?></td>
            <td><?php echo $visit['created'];?></td>
            <td><?php echo $visit['modified'];?></td>
            <td class="actions">
                        <?php echo $this->Html->link(__('View', true), array('controller' => 'visits', 'action' => 'view', $visit['id'])); ?>
                        <?php echo $this->Html->link(__('Edit', true), array('controller' => 'visits', 'action' => 'edit', $visit['id'])); ?>
        <?php echo $this->Html->link(__('Delete', true), array('controller' => 'visits', 'action' => 'delete', $visit['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $visit['id'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>*/
?>

<?php /*    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add'));?> </li>
        </ul>
    </div>
</div> */ ?>
