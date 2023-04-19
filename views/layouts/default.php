<!DOCTYPE html>

<html lang="fr" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device_width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous" defer></script>
</head>

<body class="d-flex flex-column h-100">



<div class="bg- light py-4 footer mt-auto">
    <style>
        .title{
            text-align: center;
            font-size: 28px;
            color: #EC6A20;
            margin-top: -10px;
            font-weight: bold;
        }
    </style>
<h2 class="title" style="font-family: Calibri,serif, style="text">FORMATION IMPLUSION ADREC</h2>

<a href="https://www.adrec-formation.fr/" class="navbar-brand custom-logo-link" rel="home" aria-current="page">
    <style>
        .img-fluid{
            margin-top: -21px;
            margin-left: 58px;
        }
    </style>
<img width="280" height="213" src="https://www.adrec-formation.fr/wp-content/uploads/2018/07/logo_adrec_coul_cmjn.png" class="img-fluid" alt="LOGO-ADREC" srcset="https://www.adrec-formation.fr/wp-content/uploads/2018/07/logo_adrec_coul_cmjn.png 852w, https://www.adrec-formation.fr/wp-content/uploads/2018/07/logo_adrec_coul_cmjn-300x75.png 300w, https://www.adrec-formation.fr/wp-content/uploads/2018/07/logo_adrec_coul_cmjn-768x192.png 768w" sizes="(max-width: 852px) 100vw, 852px">
</a>

    <ul class="nav justify-content-center">
        <style>
            .nav-link {
                font-size: 24px;
                margin-top: -39px;
                margin-bottom: 20px;
                color:black;
                font-family: Calibri;
                font-weight: bold;
            }
        </style>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost:8000/">Actualité</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost:8000/blog/category/eaque-quia-iusto-vel-2">Catégories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Agenda Evénement</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">CVthèque</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost:8000/login">Connection Administrateur</a>
        </li>
    </ul>



</div>

    <div class ="container mt-4">

        <?= $content ?>
    </div>
</body>
<footer style="background-color:rgb(220, 220, 220); " class="bg- light py-4 footer mt-auto">


    <div style="text-align:right">

        <style>
            .small-title{
                margin-right: 96px;
                font-size: 23px;
                font-weight: bold;

            }
        </style>
        <h5 class="small-title" style="font-family: Calibri,serif, style=" text">RÉSEAUX SOCIAUX </H5>

        <style>
            .svg-class { background-color:#AFAFAF; color: white; width:45px; height:45px; border-radius: 50px; margin-left: -116px; margin-right: 115px; padding-top: 8px; padding-bottom: 9px; padding-left: 8px; padding-right: 8px;   }
            .svg-class:hover {color:#EC6A20;}



        </style>

        <a class="adrec-social-icon-link" href="https://www.youtube.com/channel/UCOEK0w4-aKxEpsgb5990Hiw?sub_confirmation=1"><svg class="svg-class" aria-hidden="true" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg></a>
        <a class="adrec-social-icon-link" href="https://www.facebook.com/adrecformation/"><svg class="svg-class" aria-hidden="true" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" data-fa-i2svg=""><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229 " class="fa-font-awesome-logo-full"></path></svg></a>
        <a class="adrec-social-icon-link" href="https://www.instagram.com/adrec.formation/"><svg class="svg-class" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg></a>
        <a class="adrec-social-icon-link" href="https://www.linkedin.com/company/adrec-auvergne"><svg class="svg-class" aria-hidden="true" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M100.3 480H7.4V180.9h92.9V480zM53.8 140.1C24.1 140.1 0 115.5 0 85.8 0 56.1 24.1 32 53.8 32c29.7 0 53.8 24.1 53.8 53.8 0 29.7-24.1 54.3-53.8 54.3zM448 480h-92.7V334.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V480h-92.8V180.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V480z"></path></svg></a>

    </div>



    <div  style="text-align:center">
        <style>
            a{
                font-size: 20px;
                color:#EC6A20;
                font-family: "Calibri Light", serif;
                font-weight: bold;
            }
        </style>
        <a href ="https://www.adrec-formation.fr/" >
            © Adrec 2023</a>
    </div>

</footer>
</html>