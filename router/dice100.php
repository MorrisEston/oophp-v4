<?php

/**
 * Guess my number with GET.
 */
$app->router->any(["GET", "POST"], "dice100", function () use ($app) {

    $data = [
        "Title" => "Dice 100 Game!"
    ];

    $_SESSION["tempPlayerFirstRoll"] = [];
    $_SESSION["tempPlayerSecondRoll"] = [];
    $_SESSION["playerFirstRoll"] = [];
    $_SESSION["playerSecondRoll"] = [];
    $_SESSION["computerRoll"] = [];

    $_SESSION["temp"] = $_SESSION["temp"] ?? 0;
    $_SESSION["playerScore"] = $_SESSION["playerScore"] ?? 0;
    $_SESSION["computerScore"] = $_SESSION["computerScore"] ?? 0;
    $_SESSION["count"] = $_SESSION["count"] ?? 0;
    $_SESSION["winner"] = $_SESSION["winner"] ?? "";

    $dice = new \Morris\Dice\Dice();

    $dice->setIf($_SESSION["count"]);

    if (isset($_POST["roll"])) {
        array_push($_SESSION["playerFirstRoll"], rand(1, 6));
        array_push($_SESSION["playerSecondRoll"], rand(1, 6));

        if ($dice->getIf() == 0) {
            if (in_array(1, $_SESSION["playerFirstRoll"])) {
                $_SESSION["tempPlayerFirstRoll"] = $_SESSION["playerFirstRoll"];
                $_SESSION["tempPlayerSecondRoll"] = $_SESSION["playerSecondRoll"];
                array_pop($_SESSION["playerFirstRoll"]);
                $dice->setTempVar(array_sum($_SESSION["playerFirstRoll"]) + array_sum($_SESSION["playerSecondRoll"]));
                $_SESSION["temp"] += $dice->getTempVar();
                $_SESSION["count"] = 1;
                $dice->setIf(1);
            } elseif (in_array(1, $_SESSION["playerSecondRoll"])) {
                $_SESSION["tempPlayerSecondRoll"] = $_SESSION["tempPlayerSecondRoll"];
                $_SESSION["tempPlayerFirstRoll"] = $_SESSION["playerFirstRoll"];
                array_pop($_SESSION["playerSecondRoll"]);
                $dice->setTempVar(array_sum($_SESSION["playerFirstRoll"]) + array_sum($_SESSION["playerSecondRoll"]));
                $_SESSION["temp"] += $dice->getTempVar();
                $_SESSION["count"] = 1;
                $dice->setIf(1);
            } else {
                $_SESSION["tempPlayerFirstRoll"] = $_SESSION["playerFirstRoll"];
                $_SESSION["tempPlayerSecondRoll"] = $_SESSION["playerSecondRoll"];
                $dice->setTempVar(array_sum($_SESSION["playerFirstRoll"]) + array_sum($_SESSION["playerSecondRoll"]));
                $_SESSION["temp"] += $dice->getTempVar();
                $_SESSION["count"] = 1;
                $dice->setIf(1);
            }
        } elseif ($dice->getIf() == 1) {
            if (in_array(1, $_SESSION["playerFirstRoll"]) || in_array(1, $_SESSION["playerSecondRoll"])) {
                $_SESSION["tempPlayerFirstRoll"] = $_SESSION["playerFirstRoll"];
                $_SESSION["tempPlayerSecondRoll"] = $_SESSION["playerSecondRoll"];
                $dice->setTempVarToZero();
                $_SESSION["temp"] = $dice->getTempVar();

                for ($i=0; $i < 2; $i++) {
                    array_push($_SESSION["computerRoll"], rand(1, 6));
                }


                if (in_array(1, $_SESSION["computerRoll"])) {
                    $_SESSION["count"] = 0;
                    $dice->setIf(0);
                } else {
                    $dice->setTempVar(array_sum($_SESSION["computerRoll"]));
                    $_SESSION["tempcomp"] = $dice->getTempVar();
                    $_SESSION["computerScore"] += $_SESSION["tempcomp"];
                    $_SESSION["count"] = 0;
                    $dice->setIf(0);
                }
            } else {
                $_SESSION["tempPlayerFirstRoll"] = $_SESSION["playerFirstRoll"];
                $_SESSION["tempPlayerSecondRoll"] = $_SESSION["playerSecondRoll"];
                $dice->setTempVar(array_sum($_SESSION["playerFirstRoll"]) + array_sum($_SESSION["playerSecondRoll"]));
                $_SESSION["temp"] += $dice->getTempVar();
                $_SESSION["count"] = 1;
                $dice->setIf(1);
            }
        }
    }

    if (isset($_POST["stop"])) {
        $_SESSION["playerScore"] += $_SESSION["temp"];

        for ($i=0; $i < 2; $i++) {
            array_push($_SESSION["computerRoll"], rand(1, 6));
        }

        if (in_array(1, $_SESSION["computerRoll"])) {
            $_SESSION["count"] = 0;
            $dice->setIf(0);
        } else {
            $dice->setTempVar(array_sum($_SESSION["computerRoll"]));
            $_SESSION["tempcomp"] = $dice->getTempVar();
            $_SESSION["computerScore"] += $_SESSION["tempcomp"];
            $_SESSION["temp"] = 0;
            $_SESSION["count"] = 0;
            $dice->setIf(0);
        }
    }

    if (isset($_POST["reset"])) {
        $_SESSION["playerScore"] = 0;
        $_SESSION["computerScore"] = 0;
        $_SESSION["count"] = 1;
        $dice->setIf(0);
        $_SESSION["temp"] = 0;
        $_SESSION["winner"] = "";
    }

    if ($_SESSION["playerScore"] >= 100) {
        $_SESSION["winner"] = '<div style="color: green;">You won vs computer!</div>';
    } elseif ($_SESSION["computerScore"] >= 100) {
        $_SESSION["winner"] = '<div style="color: red;">Computer won vs you!</div>';
    }

    $_SESSSION["count"] = $dice->getIf();

    $app->view->add("dice/dice100", $data);
    return $app->page->render($data);
});
