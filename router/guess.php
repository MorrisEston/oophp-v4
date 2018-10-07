<?php


/**
 * Guess my number with GET.
 */
$app->router->get("guess/get", function () use ($app) {
    $data = [
        "title" => "Guess by GET"
    ];

    $number = $_GET["number"] ?? -1;
    $tries = $_GET["tries"] ?? 6;
    $guess = $_GET["guess"] ?? null;
    $result = "Try your luck!";


    $game = new Morris\Guess\Guess($number, $tries);

    $data["game"] = $game;

    if (isset($_GET["doReset"])) {
        $game->random();
    }

    if (isset($_GET["doGuess"])) {
        try {
            $result = $game->makeGuess((int)$guess);
        } catch (IsOutOfRange $e) {
            $result = $e->getMessage();
        }
    }

    $data["result"] = $result;

    if (isset($_GET["cheat"])) {
        echo $game->number();
    }

    $app->page->add("guess/get", $data);

    return $app->page->render($data);
});

/**
 * Guess my number with POST.
 */
$app->router->any(["GET", "POST"], "guess/post", function () use ($app) {
    $data = [
        "title" => "Guess the number (POST)",
    ];

    $number = $_POST["number"] ?? -1;
    $tries = $_POST["tries"] ?? 6;
    $guess = $_POST["guess"] ?? null;
    $result = "Try your luck!";

    $game = new Morris\Guess\Guess($number, $tries);

    $data["game"] = $game;

    if (isset($_POST["doReset"])) {
        $game->random();
    }

    if (isset($_POST["doGuess"])) {
        try {
            $result = $game->makeGuess((int)$guess);
        } catch (IsOutOfRange $e) {
            $result = $e->getMessage();
        }
    }

    $data["result"] = $result;

    if (isset($_POST["cheat"])) {
        echo $game->number();
    }

    $app->page->add("guess/post", $data);

    return $app->page->render($data);
});

/**
 * Guess my number with SESSION.
 */
$app->router->any(["GET", "POST"], "guess/session", function () use ($app) {
    $data = [
        "title" => "Guess the number (session)",
    ];

    $_SESSION["number"] = $_POST["number"] ?? -1;
    $_SESSION["tries"] = $_POST["tries"] ?? 6;
    $_SESSION["guess"] = $_POST["guess"] ?? null;
    $result = $_SESSION["result"] = "Try your luck!";


    $game = new Morris\Guess\Guess($_SESSION["number"], $_SESSION["tries"]);

    $data["game"] = $game;

    if (isset($_POST["doReset"])) {
        $_SESSION["tries"] = 6;
        $game->random();
    }

    if (isset($_POST["doGuess"])) {
        echo $_SESSION["tries"];
        if ($_SESSION["tries"] > 0) {
            try {
                $_SESSION["result"] = $game->makeGuess((int)$_SESSION["guess"]);
                $_SESSION["tries"] --;
            } catch (IsOutOfRange $e) {
                $_SESSION["result"] = $e->getMessage();
            }
        } elseif ($_SESSION["tries"] <=0) {
            $_SESSION["result"] = "out of guesses";
        }
    }

    if (isset($_POST["cheat"])) {
        echo $game->number();
    }

    $data["result"] = $result;

    $app->page->add("guess/session", $data);

    return $app->page->render($data);
});
