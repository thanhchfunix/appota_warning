<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Warning $warning
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Warning'), ['action' => 'edit', $warning->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Warning'), ['action' => 'delete', $warning->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warning->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Warnings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Warning'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="warnings view content">
            <h3><?= h($warning->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($warning->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($warning->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Source') ?></th>
                    <td><?= h($warning->source) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email List') ?></th>
                    <td><?= h($warning->email_list) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($warning->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time') ?></th>
                    <td><?= h($warning->time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telegram') ?></th>
                    <td><?= $warning->telegram ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
