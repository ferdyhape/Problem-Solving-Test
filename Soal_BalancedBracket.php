<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Balance Bracket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-5 mx-auto">
            <h1 class="text-center my-4">Check Balanced Bracket</h1>

            <div class="my-3">
                <label for="bracket_input" class="form-label">Input the Bracket Mark</label>
                <input type="text" id="bracket_input" placeholder="Example: { [ ( ) ] }" class="form-control" aria-describedby="bracketInput">
            </div>
            <button class="btn btn-primary w-100" onclick="checkBalancedBracket()">Check</button>

            <div class="my-3 alert alert-info" role="alert" id="alert-info" style="display: none;">
                <p class="my-0" id="result"></p>
            </div>

            <script>
                function checkBalancedBracket() {
                    const inputString = document.getElementById('bracket_input').value;
                    const resultElement = document.getElementById('result');
                    const isValid = isBalancedBracket(inputString);
                    const alert = document.getElementById('alert-info');
                    alert.style.display = 'block';
                    resultElement.textContent = isValid ? "YES" : "NO";
                }

                function isBalancedBracket(s) {
                    const stack = [];
                    const openingBrackets = new Set(['(', '[', '{']);
                    const closingBrackets = new Set([')', ']', '}']);
                    const bracketMap = {
                        ')': '(',
                        ']': '[',
                        '}': '{'
                    };

                    for (let char of s) {
                        if (openingBrackets.has(char)) {
                            stack.push(char);
                        } else if (closingBrackets.has(char)) {
                            if (!stack.length || stack[stack.length - 1] !== bracketMap[char]) {
                                return false;
                            }
                            stack.pop();
                        }
                    }

                    return stack.length === 0;
                }
            </script>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>