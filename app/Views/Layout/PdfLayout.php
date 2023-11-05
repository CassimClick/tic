<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

   
    <style>
        * {
            padding: 0px;
            margin: 0px;
            line-height: 1.2;
            box-sizing: border-box;
        }

        body {
            font-size: 8px; 
            font-family: sans-serif !important; 
            font-family: 'Shantell Sans', cursive;
            color: #333;
           
        }

        .bold {
            font-weight: bold;
            font-family: sans-serif;
        }


        header {
            /* margin-bottom: 10px; */
            border-bottom: 1px solid #777;
            padding-bottom: 5px;

        }








        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            /* font-size: 12px; */
        }

        table,
        th,
        td {
            /* border: 1px solid #333; */
            padding: 3px;
        }

        thead th {
            background-color: #333333;
            color: #ffffff;
            font-weight: bold;
        }


        .qrImg {
            width: 90px !important;
        }



        .line {
            border: 1px solid #777;
        }

        header h6 {
            margin: 0;
            padding: 1px 0;
            font-weight: bolder;
           

        }
        .bold{
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <header class="col-md-6 col-md-offset-3 text-center">
                <img class="logo" width="50" src="<?= base_url('backend/assets/images/logo.png') ?>" alt="">
                <h6 class="bold">The United Republic of Tanzania</h6>
                <h6 class="bold">Tanzania Investment  Center</h6>
                <h6 class="bold">Golden Jubilee Tower,1st Floor, Ohio Street, </h6>
                
            </header>
        </div>
    </div>



    <div class="">

        <?= $this->renderSection('content'); ?>

    </div>


</body>

</html>