<aside>
  <br>
  <div class="navbar">
    <ul>
      <li><a href="<?=$this->url->create('question/add') ?>">Ställ en fråga</a></li>
    </ul>
  </div>
</aside>

<?php if (is_array($tags)) : ?>
  <h3>Alla taggar</h3>
  <div class="allTags">
  <?php foreach ($tags as $tag) : ?>
    <div class="tag">
      <a href="<?=$this->url->create('question/tagId/' . $tag) ?>"><?=$tag ?></a>

    </div>

  <?php endforeach; ?>
</div>
<?php endif; ?>
