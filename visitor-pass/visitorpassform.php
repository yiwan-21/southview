<?php
include '../checkLogin.php';
include '../connect.php';

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Visitor Pass</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="visitorpass.js"></script>
    <form class="box3" method="post" action="vform.php">
</head>

<body>
    <fieldset>
        <script src="/navigation/navigation.js"></script>

        <div class="wrapper">
            <div class="container-fluid px-1 py-5 mx-auto">
                <h2>Visitor Pass</h2>
                <div class="card mx-3 mb-3">
                    <div class="row">
                        <div class="col table-style mx-5 my-5 ">
                            <div class="row">
                                <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                </div>
                                <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                    <strong>VISITOR NAME</strong>
                                </div>
                                <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                    <strong>:</strong>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                    <input type="text" class="form-control" id="vname" name="vname" placeholder="Enter visitor name" onblur="validate(1)" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                </div>
                                <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                    <strong>NRIC</strong>
                                </div>
                                <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                    <strong>:</strong>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                    <input type="text" class="form-control" id="nric" name="nric" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" placeholder="000000-00-0000" onblur="validate(2)" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                </div>
                                <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                    <strong>VEHICLE NO</strong>
                                </div>
                                <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                    <strong>:</strong>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                    <input type="text" class="form-control" id="vehicle" name="vehicle" placeholder="AAA8888">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                </div>
                                <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                    <strong>PHONE NO</strong>
                                </div>
                                <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                    <strong>:</strong>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                    <input type="tel" class="form-control" id="mob" name="mob" pattern="[0-9]{3}-[0-9]{7}" placeholder="012-3456789" onblur="validate(4)" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                </div>
                                <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                    <strong>DATE</strong>
                                </div>
                                <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                    <strong>:</strong>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                    <input type="date" class="form-control" id="date" name="date" placeholder="" onblur="validate(5)" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                </div>
                                <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                    <strong>TIME START AT</strong>
                                </div>
                                <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                    <strong>:</strong>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                    <input type="time" class="form-control" id="stime" name="stime" placeholder="" onblur="validate(6)" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                </div>
                                <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                    <strong>TIME END AT</strong>
                                </div>
                                <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                    <strong>:</strong>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                    <input type="time" class="form-control" id="etime" name="etime" placeholder="" onblur="validate(7)" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-1 col-sm-2 col-md-3 col-lg-8 "></div>
                                <div class="col-7 col-sm-8 col-md-6 col-lg-2"><input type="submit" class="btn btn-primary">
                                </div>
                                <div class="col-4 col-sm-2 col-md-3 col-lg-2"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </fieldset>
</body>

</html>