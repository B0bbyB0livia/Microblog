<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

    <title>Search</title>
    <link href="<?php echo base_url(); ?>assets/style.css" rel="stylesheet" type="text/css">
    <style>
        input[type=text] {
            width: 300px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 20px;
            background-color: white;
            background-image: url('http://www.abc.net.au/res/bundles/2.0.5/images/icon-search-grey@1x.png');
            background-position: 10px 5px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: auto;
            margin-top: 10%;
        }

        input[type=text]:focus {
            width: 50%;
        }

        .button {
            border-radius: 20px;
            background-color: #411608;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 26px;
            padding: 10px;
            width: 150px;
            transition: all 0.9s;
            cursor: progress;
            margin: 30px;

        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }

        h1 {

            text-align: center;
        }

    </style>

</head>
<body>
<h1>Search Please</h1>
<center>

    <form action="<?php echo site_url('Search/doSearch'); ?>" method="get">
        <input required type="text" name="keyword" placeholder="Search for messages here.."/><br>
        <button class="button" type="submit"><span>Submit.. </span></button>
    </form>
</center>


</body>
</html>