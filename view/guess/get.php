<form method="GET">
  Guess a number:
  <input type="hidden" name="tries" value="<?=$game->tries();?>">
  <input type="hidden" name="number" value="<?=$game->number();?>">
  <input type="text" value="" autofocus="" name="guess">
  <input type="submit" value="Guess" name="doGuess">
  <input type="submit" value="Reset" name="doReset">
  <input type="submit" value="Cheat" name="cheat">
</form>
<p><?=$result?></p>
