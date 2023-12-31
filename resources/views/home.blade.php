<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Plus Jakarta Sans' rel='stylesheet'>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            background: linear-gradient(
            to bottom,
            white 0%,
            white 7%,                                                                 
            #216995 7%,
            #216995 100%
        );
        padding: 50px;
        text-align: center;
        color: black;
        font-size: 1.5rem;
        min-height: 100vh;
    }
    p{
        color: #ffffff;
        font-size: 180%;
        font-family: 'Plus Jakarta Sans';
    }
    .btn{
        font-family: 'Plus Jakarta Sans';
        font-size:20px;
        border-radius: 0%;
        width: 170px;
        height: 60px;
        background-color:#0CBBC7;
        margin: auto;
        line-height: 3.5rem;   
        padding: 0px;
   }


    </style>
</head>
<body>
<img src="{{ asset('images/logo1.png') }}", style="position: relative;">
<br>
<p> <b>Platform informasi lowongan<br>pekerjaan, magang, dan kursus</b></p>
<br>
<a href="{{ route('Daftarkerja.index') }}" type="button" class="btn btn-primary">Get Started ></a>
<br>
<br>
<img src="{{ asset('images/homep.png') }}", style="position: relative;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>