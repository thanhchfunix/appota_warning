<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Warning[]|\Cake\Collection\CollectionInterface $warnings
 */
?>

<!-- filter name -->
<?= $this->Form->create(null, ['type'=>'get']) ?>
<?= $this->Form->control('key',['label'=>'Search', 'value'=>$this->request->getQuery('key')]) ?>
<?= $this->Form->submit() ?>
<?= $this->Form->end() ?>

<!-- filter date - time -->
<?= $this->Form->create(null, ['type'=>'get']) ?>
<?= $this->Form->control('start_date', ['class'=>'datepicker','value'=>$this->request->getQuery('start_date')]) ?>
<?= $this->Form->control('end_date', ['class'=>'datepicker','value'=>$this->request->getQuery('end_date')]) ?>
<?= $this->Form->submit() ?>
<?= $this->Form->end() ?>

<div class="warnings index content">
    <?= $this->Html->link(__('New Warning'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Warnings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('source') ?></th>
                    <th><?= $this->Paginator->sort('telegram') ?></th>
                    <th><?= $this->Paginator->sort('email_list') ?></th>
                    <th><?= $this->Paginator->sort('time') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($warnings as $warning): ?>
                <tr>
                    <td><?= $this->Number->format($warning->id) ?></td>
                    <td><?= h($warning->name) ?></td>
                    <td><?= h($warning->description) ?></td>
                    <td><?= h($warning->source) ?></td>
                    <td><?= h($warning->telegram) ?></td>
                    <td><?= h($warning->email_list) ?></td>
                    <td><?= h($warning->time) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $warning->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $warning->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $warning->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warning->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
