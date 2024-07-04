<!DOCTYPE html>
<html>
<head>
    <title>Trivia Game</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Trivia Game</h1>
    <div id="questionContainer">
        <div id="currentQuestion"></div>
        <div id="options"></div>
        <div id="timer"></div>
        <button id="submit">Submit Answer</button>
    </div>
    <script>
        var countdownInterval;
        var questionTimestamp;
        var email = getParameterByName('email');

        $(document).ready(function() {
            $("#submit").click(function() {
                var selectedOption = $("input[name='option']:checked").val();
                var currentTime = Math.floor(Date.now() / 1000);
                var timeTaken = currentTime - questionTimestamp;
                var score = 0; // Implement scoring logic here if needed
                $.ajax({
                    url: "submit_answer.php",
                    type: "POST",
                    data: { email: email, score: score, timeTaken: timeTaken },
                    success: function(response) {
                        console.log(response);
                    }
                });
            });

            function getQuestion() {
                $.ajax({
                    url: "get_question.php",
                    type: "GET",
                    success: function(response) {
                        var question = JSON.parse(response);
                        $("#currentQuestion").text("Question: " + question.question);
                        $("#options").empty();
                        for (var i = 0; i < question.options.length; i++) {
                            $("#options").append("<input type='radio' name='option' value='" + i + "'>" + question.options[i] + "<br>");
                        }

                        questionTimestamp = question.timestamp;
                        var currentTime = Math.floor(Date.now() / 1000);
                        var timeElapsed = currentTime - questionTimestamp;
                        var timeLeft = 40 - timeElapsed;
                        if (timeLeft <= 0) {
                            $("#timer").text("Time's up!");
                            $("#submit").click(); // Auto-submit when time's up
                        } else {
                            $("#timer").text("Time left: " + timeLeft + " seconds");
                            startCountdown(timeLeft);
                        }
                    }
                });
            }

            function startCountdown(seconds) {
                clearInterval(countdownInterval);
                var timer = seconds;
                countdownInterval = setInterval(function() {
                    $("#timer").text("Time left: " + timer + " seconds");
                    if (timer <= 0) {
                        clearInterval(countdownInterval);
                        $("#timer").text("Time's up!");
                        $("#submit").click(); // Auto-submit when time's up
                    }
                    timer--;
                }, 1000);
            }

            function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

            getQuestion(); // Get the initial question
            setInterval(getQuestion, 5000); // Poll for new questions every 5 seconds
        });
    </script>
</body>
</html>
