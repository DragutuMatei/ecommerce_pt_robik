<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Florarie</title>
    <link rel="stylesheet" href="./style/cos.css">
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <link rel="icon" type="image/svg+xml" href="./img/idk.svg">

    <!-- <script src="https://www.paypal.com/sdk/js?client-id"></script> -->

</head>

<script>
    // paypal.Buttons({
    //     create_order: function(data, actions) {

    //     }
    // })
</script>

<body>

    <?php
    require_once '../core/init.php';
    ?>

    <?php
    require './components/navbar.php'
    ?>

    <div class="headerFlori jmek">
        <div class="incadrare">
            <h1>coș de cumpărături</h1>
        </div>
    </div>


    <div class="items">

        <div class="left">

            <?php

            $cos = new Cos();

            // $total = 0;

            $index = 0;

            if (Cos::Exists()) {
                if (count(Cos::GetProduse())) {
                    foreach (Cos::GetProduse() as $produs) {

                        $index++;
                        $item = $cos->getItem(array("id", "=", $produs));


                        $imgs = json_decode($item->imagini, true);

                        echo '
                            <div class="prod produs-' . $index . ' ">
                                <img src="' . $imgs[0] . '" />
                                <div class="detalii">
                                    <h3>' . $item->nume . ' - ' . intval($item->pret, 10) *  intval($_SESSION["qty"][$_SESSION['user']][$item->id], 10) . ' RON </h3>
                                    <form method="POST" action="qt.php">
                                        <input type="number" min="1" class="input" onchange="showTotal()" name="qt" value=' . $_SESSION["qty"][$_SESSION['user']][$item->id] . ' />
                                        <input type="hidden" name="user" value="' . $_SESSION['user'] . '" />
                                        <input type="hidden" name="id" value="' . $item->id . '" />
                                        <button type="submit" name="submit" style="cursor:pointer;" >Change quantity </button>
                                    </form>
                                    <form method="POST" action="./deleteFromCard.php">
                                        <input type="hidden" name="id" value="' . $item->id . '" />
                                        <button  name="delete"> delete </button>
                                    </form>
                                </div>
                            </div>
                            <hr>';
                    }
                }
            }
            ?>

            <form style="width: auto; align-self: flex-end;" method='POST' action='./deleteFromCard.php'>
                <button style=" padding: 5px 9px;
          padding: 10px;
          color: white !important;
          background: #ff6c00;
          border-radius: 20px;
          font-size: 18px;
          outline: none;
          border: none;
          font-family: 'Rubik', sans-serif;
          cursor: pointer;
          margin: 5px 0;" type='submit' name='deleteAll'> delete all products </button>
            </form>
        </div>
        <div class="right">
            <div class="totalContainer">
                <h2>Total: </h2>
                <div id="total"></div>
            </div>
            <hr>
            <div class="info">
                <p>
                    * Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum sit magnam quos impedit autem neque. Unde velit sed mollitia ratione quos, est, maxime fuga illo vero ullam dicta praesentium ex?
                </p>
            </div>
            <div class="oke">
                <form action="addComanda.php" method="POST">
                    <textarea name="note" placeholder="Note*"></textarea>

                    <h2>Info paypall</h2>

                    <input type="text" name="nr_card">

                    <button type="submit" name="submit">Trimite comanda</button>
                </form>
            </div>

        </div>
    </div>

    <br><br><br>
    <br><br><br>



    <script>
        const total = document.querySelector("#total");
        const CATE_IS = <?php echo $index; ?>

        const prod = document.querySelectorAll(".input");

        var arrCuQTY = [];

        let pret = [
            <?php
            if (Cos::Exists())
                if (count(Cos::GetProduse()))
                    foreach (Cos::GetProduse() as $produs) {
                        $item = $cos->getItem(array("id", "=", $produs));

                        echo intval($item->pret, 10) . ", ";
                    }
            ?>
        ];


        let all = 0;

        function showTotal() {


            all = 0;

            arrCuQTY = [];

            for (let i = 0; i < CATE_IS; i++) {
                arrCuQTY.push(prod[i].value);
            }

            for (let i = 0; i < CATE_IS; i++) {
                all += arrCuQTY[i] * pret[i];
            }
            total.innerHTML = all + " RON";
        }

        showTotal();
    </script>

</body>

</html>