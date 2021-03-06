
<?php
$thisUser = $user->getProperties();
$acronym = $thisUser['acronym'];
$id = $thisUser['id'];
$email = $thisUser['email'];
$name = $thisUser['name'];
$created = $thisUser['created'];
$active = $thisUser['active'];
$gravatar = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '.jpg?s=200';
?>

<div class="userProfile">
  <img class="gravatar right" src=<?=$gravatar ?>>
  <h1><?=$acronym ?></h1>
  <p> Email: <?=$email ?></p>
  <p> Namn: <?=$name ?></p>
  <p> Senast inloggad: <?=$active ?></p>
  <p> Medlem sedan: <?=$created ?></p>
  <?php if(isset($loggedOn) && $loggedOn == true): ?>
    <a href="<?=$this->url->create('users/update/' . $id) ?>">Redigera</a></li>
  <?php endif; ?>
</div>

<?php if(isset($questions)): ?>
<div class="askedQuestions">
  <h2><?=$acronym ?>s frågor</h2>
  <?php $questions = array_reverse($questions); ?>
    <?php foreach($questions as $question): ?>

      <?php
          $date1 = $question->timestamp;
          $date2 = date('Y-m-d H:i:s');
          $ts1 = strtotime($date1);
          $ts2 = strtotime($date2);
          $seconds_diff = $ts2 - $ts1;
          if ($seconds_diff < 43200) {
            $date = ' idag';
          } else {
            $date = $seconds_diff / 86400;
            $date = round($date, 0);
            $date .= " dagar sedan";
          }
      ?>
      <div class="firstPageQuestions">
        <?php $gravatar = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '.jpg?s=17'; ?>
        <p><img class="gravatar" src=<?=$gravatar ?>>
          <a href="<?=$this->url->create('question/id/' . $question->id) ?>"><?=$question->title?></a>
          <span class="timestamp">- <?=$date ?></span></p>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<?php if(isset($answers) && isset($answerdQuestions)): ?>
<div class="answerdQuestions">
  <h2><?=$acronym ?>s svar</h2>
  <!-- <?php $answers = array_reverse($answers); ?> -->
  <?php $answerdQuestions = array_reverse($answerdQuestions); ?>

  <?php foreach($answerdQuestions as $answer): ?>
    <div class="firstPageQuestions">
      <?php
      $realAnswer = strip_tags($answer->answer);
      ?>
      <?php $gravatar = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '.jpg?s=17'; ?>
      <p><img class="gravatar" src=<?=$gravatar ?>>
        <a href="<?=$this->url->create('question/id/' . $answer->questionID) ?>"><?=$answer->title?></a>
        <span class="timestamp">Svar: <?=$realAnswer?> </span></p>
    </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>
