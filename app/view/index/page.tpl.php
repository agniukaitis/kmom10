
<aside>
  <br>
  <div class="navbar">
    <ul>
      <li><a href="<?=$this->url->create('question/add') ?>">Ställ en fråga</a></li>
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
