<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Survey[]|\Cake\Collection\CollectionInterface $surveys
 */
$title = 'Accueil';
$this->assign('title',$title);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?= __($title) ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="<?= __('Rechercher') ?>" aria-label="<?= __('Rechercher') ?>">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?= __('Rechercher') ?></button>
    </form>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build([
            'controller'=>'Surveys',
            'action'=>'add'
            ]); ?>">
            <button type="button" class="btn btn-success"><?= __('Nouveau sondage') ?></button>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
            <button type="button" class="btn btn-light"><?= __('Mes sondages') ?></button>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Username
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><?= __('Profil') ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><?= __('Se déconnecter') ?></a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="surveys index large-9 medium-8 columns content">
    <h3><?= __('Surveys') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($surveys as $survey): ?>
            <tr>
                <td><?= $this->Number->format($survey->id) ?></td>
                <td><?= $survey->has('user') ? $this->Html->link($survey->user->id, ['controller' => 'Users', 'action' => 'view', $survey->user->id]) : '' ?></td>
                <td><?= h($survey->question) ?></td>
                <td><?= h($survey->created) ?></td>
                <td><?= h($survey->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $survey->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $survey->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $survey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $survey->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
