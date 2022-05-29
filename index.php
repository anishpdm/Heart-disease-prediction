<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Heart Disease Prediction </a>
            </li>
            <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                  </li> -->
        </ul>
    </nav>

    <div class="container">
        <div class="row">

            <div class="col col-sm-2"></div>
            <div class="col col-sm-8">

                <form method="POST">


                    <table class="table">
                        <tr>
                            <td>Patient Age</td>
                            <td> <input type="text" name="age" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td> Gender</td>
                            <td>
                                <select name="sex" class="form-control">

                                    <option value="1">MALE</option>
                                    <option value="0">FEMALE</option>


                                </select>


                            </td>
                        </tr>

                        <tr>
                            <td>CP Value </td>
                            <td> <input type="text" name="cp" class="form-control" required> </td>
                        </tr>
                        <tr>
                            <td>TREST BPS Value</td>
                            <td> <input type="text" name="trestbps" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td>Cholestrol Value </td>
                            <td> <input type="text" name="chol" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td>Fasting Blood Sugar Value </td>
                            <td> <input type="text" name="fbs" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td>Rest ECG Value </td>
                            <td> <input type="text" name="restecg" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td>Thalach</td>
                            <td> <input type="thalach" name="thalach" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td>Exang</td>
                            <td> <input type="text" name="exang" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td>old peak Value</td>
                            <td> <input type="text" name="oldpeak" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td>Slope Value</td>
                            <td> <input type="text" name="slope" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td>CA Value </td>
                            <td> <input type="text" name="ca" class="form-control" required> </td>
                        </tr>

                        <tr>
                            <td> thal Value </td>
                            <td> <input type="text" name="thal" class="form-control" required> </td>
                        </tr>



                        <tr>
                            <td> </td>
                            <td> <button class="btn btn-primary" name="but"> CHECK RESULT </button> </td>
                        </tr>




                    </table>

                </form>


            </div>

            <div class="col col-sm-2"></div>


        </div>

    </div>

</body>

</html>


<?php

if (isset($_POST['but'])) {

    echo $age = $_POST['age'];
    echo "<br>";
    echo $sex = $_POST['sex'];
    echo "<br>";
    echo $cp = $_POST['cp'];
    echo "<br>";
    echo $trestbps = $_POST['trestbps'];
    echo "<br>";
    echo $chol = $_POST['chol'];
    echo "<br>";
    echo $fbs = $_POST['fbs'];
    echo "<br>";
    echo $restecg = $_POST['restecg'];
    echo "<br>";
    echo $thalach = $_POST['thalach'];
    echo "<br>";
    echo $exang = $_POST['exang'];
    echo "<br>";
    echo $oldpeak = $_POST['oldpeak'];
    echo "<br>";
    echo $slope = $_POST['slope'];
    echo "<br>";
    echo $ca = $_POST['ca'];
    echo "<br>";
    echo $thal = $_POST['thal'];
    echo "<br>";

    $url = "http://127.0.0.1:4000/api/predictcancer?age=$age&sex=$sex&cp=$cp&trestbps=$trestbps&chol=$chol&fbs=$fbs&restecg=$restecg&thalach=$thalach&exang=$exang&oldpeak=$oldpeak&slope=$slope&ca=$ca&thal=$thal";

    echo "<br>";
    echo "<br>";
    echo $url;
    $result = file_get_contents($url);
    if ($result == "true") {
        echo "<script>  alert('Alert..chance for Heart Attack. Please Visit doctor Immediately ')</script> ";
    } else {
        echo "<script>  alert('Dont worry..No chance for Heart Attack ')</script> ";
    }
}


?>