<?php
$qax = array(
  "You see a bus headed for a homeless man, how do you react?",
"You risk your own safety by jumping in the street to pull the man out of the way.",
"You wave down the bus driver urging him to stop.",
"You turn away and walk the other direction.",
"You stay and witness the tragedy.",
"Walking down the street, the man in front of you drops his wallet what do you do?",
"You catch up to him and return his wallet.",
"You call for his attention.",
"You pick up the wallet and examine the content.",
"You take the wallet and walk the opposite direction.",
"You walk in on your 15 year old son doing heroin in the bathroom.  How do you react?",
"You miss out on opportunities in order to finance and take him to rehabilitation.",
"You punish him for not telling you about it.",
"You simply let him continue.",
"You disown him for making such a life ruining decision.",
"You are in Elliot Hall taking a Calculus final and notice a student sitting near you is copying your answers.. Do you",
"Raise your hand and report the incident to a proctor.",
"Decide to bring up the incident to your TA in your next class",
"Ignore it and focus on your own exam.",
"Purposefully circle the wrong answers on the exam.",
"You are studying in the library and notice someone is going around using people’s unattended, unlocked laptops. Do you...",
"Report the individual to a staff member",
"Inform the laptop’s owner",
"Do nothing and assume the individual knows the laptop’s owner",
"Also take advantage of the unlocked laptops",
"Your 9 year old daughter approaches you and asks where Daddy is.  Your husband left you a few days ago.  Do you tell her",
"the truth, that she no longer has married parents.",
"that you and Dad are taking a break.",
"that you aren’t sure where he’s been.",
"he has just been on a business trip for a few days.",
"You wake up hungover on a couch you’ve never felt before, in a house you’ve never been in before, and with a woman you’ve never met before.  You are extremely upset about the situation.  You’ll never let it happen again.  What do you tell your wife?",
"You admit the full truth about what happened.",
"You tell her how bad you feel, sparing the details.",
"You tell her it was a mistake and to just move on.",
"You never say a word, because it could only hurt you.",
"Your fourteen year old neighbor asks you to purchase alcohol for him. How do you respond?",
"You reject his request and inform his parents regarding the matter.",
"You walk away and pretend as if you didn’t hear anything.",
"You take his money and buy the alcohol for yourself.",
"You agree to purchase the alcohol as long as he does not inform his parents.",
"You find a squirrel in your backyard.  What do you do with it?",
"You watch it from a distance and gaze at its movements.",
"You creep towards it to try and get a real close look.",
"You take a stick and try and poke it.",
"You run after it, insistent on catching the critter.",
"You find yourself in an estate sale after an old woman died in the house just a few days earlier.  How do you behave around the house?",
"With utmost respect, you watch every step as to not disturb the home.",
"You act polite to those around you.",
"You walk around the home as you would any other retail store.",
"You dash around without much care, the house is foreclosed after all. "
);
?>

<?php for($i = 0; $i < 10; $i += 5): ?>

<div <?php if($i != 0) echo 'style="display:none"';?> class="question-box" id="question<?=$i/5+1?>">
  <h3 class="question"><?=($i/5+1)?>. <?=$question[i]?></h3>

  <div class="answer" data-answer-number="<?=$j?>">
    <p><?=$qax[i+1]?></p>

  <div class="answer" data-answer-number="<?=$j?>">
    <p><?=$qax[i+2]?></p>

  <div class="answer" data-answer-number="<?=$j?>">
    <p><?=$qax[i+3]?></p>

  <div class="answer" data-answer-number="<?=$j?>">
    <p><?=$qax[i+4]?></p>
  </div>
</div>
<?php endfor;?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>

var i = 1;
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