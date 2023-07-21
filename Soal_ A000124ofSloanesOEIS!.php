<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rumus A000124</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-5 mx-auto">
            <h1 class="text-center my-4">Rumus A000124 of Sloane’s OEIS</h1>
            <form method="post" class="my-3">
                <div class="input-group mb-3">
                    <input type="number" name="inputNumber" id="inputNumber" required class="form-control" placeholder="Input a number" aria-label="Input a number">
                </div>
                <input type="submit" value="Generate" class="btn btn-primary w-100">

            </form>
            <?php
            function a000124($n)
            {
                $sequence = [];
                $currentValue = 1;

                for ($i = 1; $i <= $n; $i++) {
                    $sequence[] = $currentValue;
                    $currentValue += $i;
                }

                return implode('-', $sequence);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $inputNumber = $_POST["inputNumber"];
                $output = a000124($inputNumber);
                echo "<div class='alert alert-info' role='alert'>";
                echo $output;
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>