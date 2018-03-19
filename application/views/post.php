<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Post</title>
    <link href="<?php echo base_url(); ?>assets/style.css" rel="stylesheet" type="text/css">
    <style>
        input[type=text] {
            width: 50%;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 50px;
            font-size: 20px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 8px 50px 100px 40px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: auto;
            margin-top: 12%;
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
    </style>
</head>
<body>
<center>
    <form action="<?php echo site_url('Message/doPost'); ?>" method="post">
        <input required type="text" name="text" placeholder="Please write a new post here..."><br>
        <button class="button" type="submit"><span>Submit.. </span></button>
    </form>
</center>
</body>
</html>