<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SEU Quiz 2024 - Quiz Lobby</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .header {
    height: 25vh;
    background-color: #333;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 20px;
  }


.content {
  height: 60.5vh;
  padding: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.table-container {
  width: 80%;
  margin-top: 30px;
  display: flex;
  justify-content: center;
}

table {
  width: 100%; /* Use 100% width to fill the container */
  border-collapse: collapse;
}




  .footer {
    height: 5vh;
    background-color: #333;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 10px;
  }


  table, th, td {
    border-bottom: 1px solid #ddd;
    text-align:center;
  }

  th, td {
    padding: 10px;
    
  }

  th {
    background-color: #f1f1f1;
  }

  .startButton {
    padding: 10px 20px;
    background-color: #333;
    color: white;
    border: none;
    cursor: pointer;
  }

</style>
</head>
<body>
  <div class="header">
    <h1>SEU Quiz 2024</h1>
  </div>
  <div class="content">
  <div class="table-container">
    <table>
      <tr>
        <th>Round</th>
        <th>Leaderboard</th>
      </tr>
      <tr>
        <td>Round 1</td>
        <td><span id="countdown"><?php echo $eventStatus; ?></span>
            <button class="startButton" id="startButton" onclick="window.location.href='results1.php'">Go To Round1 Results</button>
        </td>
      </tr>
      <tr>
        <td>Round 2</td>
        <td><button class="startButton" id="startButton" onclick="window.location.href='results2.php'">Go To Round2 Results</button></td>
      </tr>
      <tr>
        <td>Round 3</td>
        <td><button class="startButton" id="startButton" onclick="window.location.href='results3.php'">Go To Round3 Results</button></td>
      </tr>
      <tr>
        <td>Round 4</td>
        <td><button class="startButton" id="startButton" onclick="window.location.href='results4.php'">Go To Round4 Results</button></td>
      </tr>
      <tr>
        <td>Round 5</td>
        <td><button class="startButton" id="startButton" onclick="window.location.href='results5.php'">Go To Round5 Results</button></td>
      </tr>
    </table>
  </div>
</div>

  <div class="footer">
    <p>&copy; Made by Bhaskar Roy</p>
  </div>

</body>
</html>
