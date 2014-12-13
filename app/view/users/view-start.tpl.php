
<aside>
  <br>
  <div class="navbar">
    <ul>
      <!-- <li><a href="<?=$this->url->create('question/add') ?>">Ställ en fråga</a></li> -->
      <li><a href="<?=$this->url->create('users/login') ?>">Logga in</a></li><br>
      <li><a href="<?=$this->url->create('users/logout') ?>">Logga ut</a></li><br>
      <li><a href="<?=$this->url->create('users/list') ?>">Alla anv.</a></li><br>
      <li><a href="<?=$this->url->create('users/add') ?>">Skapa profil</a></li><br>
      <li><a href="<?=$this->url->create('users/setup') ?>">Återställ</a></li>
    </ul>
  </div>
</aside>
<article class="article1">

  <?=$content?>

  <?php if(isset($byline)) : ?>
    <footer class="byline">
      <?=$byline?>

    </footer>
  <?php endif; ?>

</article>
