<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobantes</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .page-break {
            page-break-after: always;
        }

        .txt-rgt{
            text-align: right;
        }
        .txt-ctr{
            text-align: center;
        }
        .txt-lft{
            text-align: left;
        }

        .card{
            margin:2rem;
            vertical-align: center;
            border-radius: 5px;
        }

        h5{
        font-size: 1.1em;
        }

        table{
            border:2px solid gray;
            width:100%;
            border-collapse: collapse;
            border-spacing: 5px;
            text-align: center;
            font-size: small;
        }

        h1, h2, h3, h4, h5, h6 {
            margin-bottom: 0.3 rem;
            margin-top: 0.2 rem;
        }

        th{
            border:1px solid grey;
            background-color: #ddd;
        }
        td{
            border:1px solid grey;
            padding:7px;
        }

        .row, .container{
        /*display: block;*/
        width: 100%;
        }

        .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto{
            display: inline-block;
        }
        .col, .col-10{ width:100%; }
        .col-1{ width:10%; }
        .col-2{ width:20%; }
        .col-3{ width:30%; }
        .col-4{ width:40%; }
        .col-45{ width:45%; }
        .col-5{ width:50%; }
        .col-6{ width:60%; }
        .col-7{ width:70%; }
        .col-8{ width:80%; }
        .col-9{ width:90%; } 
        .bg-g9{ background-color: #666;}       
        .bg-g8{ background-color: #777;}       
        .bg-g7{ background-color: #888;}       
        .bg-g6{ background-color: #999;}       
        .bg-g5{ background-color: #aaa;}       
        .bg-g4{ background-color: #bbb;}       
        .bg-g3{ background-color: #ccc;}       
        .bg-g2{ background-color: #ddd;}       
        .bg-g1{ background-color: #eee;}       
    </style>
</head>

<body>
@yield('content')
</body>

</html>