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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $warning->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $warning->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Warnings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="warnings form content">
            <?= $this->Form->create($warning) ?>
            <fieldset>
                <legend><?= __('Edit Warning') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('source', [
                        'options' => ['telegram' => 'Telegram', 'email' => 'Email']]);
                    echo $this->Form->control('telegram');
                    echo $this->Form->control('email_list');
                    echo $this->Form->control('time');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
