<h1>Dice100. First to 100 wins.</h1>

<form method="post">
    <input type="submit" name="roll" value="Dra igång tärningarna!">
    <input type="submit" name="stop" value="Spara dina poäng">
    <input type="submit" name="reset" value="Starta om">
</form>

<div>
    <h2>Player rolls: <?php
    if (isset($_SESSION['tempPlayerFirstRoll']) && !empty($_SESSION['tempPlayerSecondRoll'])) {
        echo $_SESSION["tempPlayerFirstRoll"][0] . " and " . $_SESSION["tempPlayerSecondRoll"][0];
    }
    ?></h2>
    <h2>Computer rolls: <?php
    if (isset($_SESSION['computerRoll']) && !empty($_SESSION['computerRoll'])) {
        echo $_SESSION["computerRoll"][0] . " and " . $_SESSION["computerRoll"][1];
    }
    ?></h2>
    <h3>Player score this round: <?= $_SESSION["temp"] ?></h3>
    <h3>Player score: <?= $_SESSION["playerScore"] ?></h3>
    <h3>Computer score: <?= $_SESSION["computerScore"] ?></h3>
    <h3>Winner: <?= $_SESSION["winner"] ?></h3>
</div>
