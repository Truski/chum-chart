<?php
$questions = array();
for ($i = 0; $i < 10; $i++){
  $question = new stdclass;
  $question->question = "Who wants to be a $i comma club millionaire?";
  $question->answers = array("Me", "You", "David", "Megan");
  array_push($questions , $question);
}

?>

<?php $i = 0; foreach($questions as $question): ?>

<div <?php if($i != 0) echo 'style="display:none"';?> class="question-box" id="question<?=$i?>">
  <h3 class="question"><?=($i+1)?>. <?=$question->question?></h3>

  <?php $j = 0; foreach($question->answers as $answer):?>

  <div class="answer" data-answer-number="<?=$j?>">
    <p><?=$answer?></p>
  </div>
  <?php $j++;?>
  <?php endforeach;?>
</div>
<?php $i++;?>
<?php endforeach;?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>

var i = 0;
var answers = [];

$('.answer').click(function(e) {
  // Save answer
  answers.push($(e.currentTarget).data('answer-number'));

  $('#question'+i).hide();
  i++;
  $('#question'+i).show();
  console.log(answers);
});

</script>