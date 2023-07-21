<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dense Rank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-5 mx-auto">
            <h1 class="text-center my-4">Dense Rank</h1>
            <form action="" class="my-3" method="post">
                <div class="mb-3">
                    <label for="total_players" class="form-label">Total Player</label>
                    <input type="number" name="total_players" class="form-control" id="total_players" aria-describedby="Total Players">
                </div>

                <div class="mb-3">
                    <label for="scores" class="form-label">Scores</label>
                    <input type="text" name="scores" class="form-control" id="scores" aria-describedby="scoresHelp">
                    <div class="form-text">(separated by spaces)</div>
                </div>

                <div class="mb-3">
                    <label for="games" class="form-label">Number of Games:</label>
                    <input type="number" class="form-control" name="games" id="games" required>
                </div>
                <div class="mb-3">
                    <label for="gits_scores" class="form-label">Next Score</label>
                    <input type="text" class="form-control" name="gits_scores" id="gits_scores" required>
                    <div class="form-text">(separated by spaces)</div>
                </div>

                <input type="submit" class="btn btn-primary w-100" value="Calculate Ranking">
            </form>

            <?php
            function denseRanking($n, $scores, $m, $gits_scores)
            {
                $dense_ranking = array();
                $rank = 1;
                $prev_score = $scores[0];

                for ($i = 0; $i < $n; $i++) {
                    if ($scores[$i] != $prev_score) {
                        $rank++;
                    }
                    $dense_ranking[$scores[$i]] = $rank;
                    $prev_score = $scores[$i];
                }

                $gits_rankings = array();
                foreach ($gits_scores as $score) {
                    if (isset($dense_ranking[$score])) {
                        $gits_rankings[] = $dense_ranking[$score];
                    } else {
                        $gits_rankings[] = $rank + 1;
                    }
                }

                return $gits_rankings;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["total_players"]) && isset($_POST["scores"]) && isset($_POST["games"]) && isset($_POST["gits_scores"])) {
                    $total_players = (int)$_POST["total_players"];
                    $scores = array_map('intval', explode(" ", $_POST["scores"]));
                    $games = (int)$_POST["games"];
                    $gits_scores = array_map('intval', explode(" ", $_POST["gits_scores"]));

                    $gits_rankings = denseRanking($total_players, $scores, $games, $gits_scores);

                    echo "<div class='alert alert-info' role='alert'>";
                    echo "Ranking: ";
                    echo implode(" ", $gits_rankings);
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>