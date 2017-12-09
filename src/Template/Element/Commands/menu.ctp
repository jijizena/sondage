<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?= $this->Html->image('logo-sondage.png',['height'=>'80']); ?>
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
      <?php if(empty($user)): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build([
            'controller'=>'Users',
            'action'=>'login'
        ]) ?>">
            <button type="button" class="btn btn-primary"><?= __('Se connecter') ?></button>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build([
            'controller'=>'Users',
            'action'=>'signin'
        ]) ?>">
            <button type="button" class="btn btn-primary"><?= __('S\'inscrire') ?></button>
        </a>
      </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build([
            'controller'=>'Surveys',
            'action'=>'add'
            ]); ?>">
            <button type="button" class="btn btn-success"><?= __('Nouveau sondage') ?></button>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build([
            'controller'=>'Surveys',
            'action'=>'getSurveysByUserId',
            $user['id']
        ]) ?>">
            <button type="button" class="btn btn-light"><?= __('Mes sondages') ?></button>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $user['nickname'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><?= __('Profil') ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= $this->Url->build([
            'controller'=>'Users',
            'action'=>'logout'
        ]) ?>"><?= __('Se déconnecter') ?></a>
        </div>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
