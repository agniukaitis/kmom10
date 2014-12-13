<aside>
  <br>
  <div class="navbar">
    <ul>
      <li><a href="<?=$this->url->create('users/list') ?>">Lista</a></li><br>
      <li><a href="<?=$this->url->create('users/add') ?>">Skapa profil</a></li><br>
      <li><a href="<?=$this->url->create('users/logout') ?>">Logga ut</a></li><br>
      <li><a href="<?=$this->url->create('users/setup') ?>">Återställ</a></li>
    </ul>
  </div>
</aside>

<h1><?=$title?></h1>

<div class="userList">
  <?php foreach ($users as $user) : ?>
    <div class="user">
      <?php $gravatar = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '.jpg?s=50'; ?>
      <a href="<?=$this->url->create('users/id/' . $user->id) ?>"><?=$user->acronym?></a>

      <img class="gravatar right" src=<?=$gravatar?>>
      <p><?=$user->name?>
      <?=$user->email?></p>



      <!-- <a href="<?=$this->url->create('users/soft-delete/' . $user->id) ?>">[trash]</a>
      <a href="<?=$this->url->create('users/soft-undelete/' . $user->id) ?>">[untrash]</a>
      <a href="<?=$this->url->create('users/delete/' . $user->id) ?>">[remove]</a>
      <a href="<?=$this->url->create('users/deactivate/' . $user->id) ?>">[deactivate]</a>
      <a href="<?=$this->url->create('users/activate/' . $user->id) ?>">[activate]</a>
      <a href="<?=$this->url->create('users/update/' . $user->id) ?>">[update]</a> -->

  </div>
  <?php endforeach; ?>
</div>
<!-- <p><a href='<?=$this->url->create('users/list')?>'>Full list...</a></p> -->
