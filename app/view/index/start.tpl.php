<aside>
  <br>
  <div class="navbar">
    <ul>
      <li><a href="<?=$this->url->create('users/add') ?>">Skapa profil</a></li><br>
      <li><a href="<?=$this->url->create('users/login') ?>">Logga in</a></li><br>
    </ul>
  </div>
</aside>

<!-- <h1>Välkommen till forumet Games</h1> -->
<!-- <div class="latestQuestions"> -->
<h5>Senaste frågorna</h5>
<?php foreach($questions as $question): ?>
  <?php
  $date1 = $question->timestamp;
  $date2 = date('Y-m-d H:i:s');
  $ts1 = strtotime($date1);
  $ts2 = strtotime($date2);
  $seconds_diff = $ts2 - $ts1;
  if ($seconds_diff < 86400) {
    $date = ' idag';
  } else {
    $date = $seconds_diff / 86400;
    $date = round($date, 1);
    $date .= " dagar sedan";
  }
  ?>


  <?php $gravatar = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($question->mail))) . '.jpg?s=17'; ?>
  <div class="firstPageQuestions">
      <p><img class="gravatar" src=<?=$gravatar ?>>
      <a href="<?=$this->url->create('question/id/' . $question->id) ?>"><?=$question->title?></a>
       <span class="timestamp">- <?=$date ?></span></p>
  </div>
<?php endforeach; ?>
<!-- </div> -->

<div class="mostUsedTags">
<h2>Mest använda taggar</h2>
<?php foreach($mostUsedTags as $tag): ?>
  <div class="tag">
    <a href="<?=$this->url->create('question/tagId/' . $tag->tag) ?>"><?=$tag->tag ?></a>

  </div>
<?php endforeach; ?>
</div>
