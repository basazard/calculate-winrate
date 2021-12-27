<!DOCTYPE html>
<?php 
    if(isset($_POST["submit"])){
        $match = $_POST["match"];
        $winrate = $_POST["winrate"];
        $expectWinrate = $_POST["expectWinrate"];

        $_POST["win"] = " ";
        $_POST["text"] = " ";
        if($match == 0 || $winrate == 0 || $expectWinrate == 0 ){
            $_POST["text"] = "Diisi dulu sayang jangan kosong";
        }
        else if($expectWinrate == 100){
            $_POST["text"] = "Gamungkin sayang";
        }
        else if($expectWinrate > 100 || $winrate > 100){
            $_POST["text"] = "WR tidak boleh lebih dari 100%";
        }
        else{
            $_POST["lose"] = ($match - ($match * ($winrate / 100)));
            $_POST["win"] = $match - $_POST["lose"];
            $_POST["sisawr"] = 100 - $expectWinrate;
            $_POST["wrResult"] = 100 / $_POST["sisawr"];
            $_POST["seratusPersen"] = $_POST["lose"] * $_POST["wrResult"];
            $_POST["final"] = $_POST["seratusPersen"] - $match;
            $_POST["text"] = "You have won " .  $_POST["win"] . " matches and lose " . $_POST["lose"] . " matches <br>" 
                              . "You need " . ceil($_POST["final"]) . " matches to get " . $expectWinrate . "%" ;
        }
        
    }
    else{
        $error = true;
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Winrate Hero Mobile Legends using PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <h2 class="row justify-content-center mb-5 mt-5">Calculate Winrate Hero Mobile Legends using PHP</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="" method="post">
                    <label for="match" class="form-label">Your Total Matches</label>
                    <input class="form-control" type="number" name="match" placeholder="Cth 298">
                    <br>
                    <label for="winrate" class="form-label">Your Winrate</label>
                    <input class="form-control" type="number" name="winrate" placeholder="Cth 65.9" step="any" autocomplete="off">
                    <br>
                    <label for="expectWinrate" class="form-label">Expect Winrate</label>
                    <input class="form-control" type="number" name="expectWinrate" placeholder="Cth 70" step="any" autocomplete="off">
                    <br>
                    <button class="btn btn-primary" type="submit" name="submit">Result</button>
                </form>
            </div>
        </div>
    </div>
   
    <?php if(!isset($error)) : ?>
    <p class="row justify-content-center mt-5 mx-auto text-center">
        <?=  $_POST["text"]; ?>
    </p>
    <?php endif; ?>
    
</body>
</html>