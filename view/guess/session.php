<form method="POST">
  Guess a number:
  <input type="hidden" name="tries" value="<?= $_SESSION["tries"]; ?>">
  <input type="hidden" name="number" value="<?= $_SESSION["number"]; ?>">
  <input type="text" value="" autofocus="" name="guess">
  <input type="submit" value="Guess" name="doGuess">
  <input type="submit" value="Reset" name="doReset">
  <input type="submit" value="Cheat" name="cheat">
</form>
<p><?=$_SESSION["result"]?></p>
