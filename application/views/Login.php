<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="<?php echo base_url(); ?>assets/style.css" rel="stylesheet" type="text/css">
    <style>
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;

        }

        input[type=password], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #af620c;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #a08608;
        }

        div {

            margin: auto;
            max-width: 500px;
            max-height: 200px;
            width: 20%;
            border-radius: 50px;
            background-color: #cbcbcb;
            padding: 25px;

        }

        hr {
            width: 23%;

        }

        h2 {
            font-family: Courier New;
            font-size: 60px;
            text-align: center;

        }

    </style>
</head>

<body>
<h2>Please Login..</h2>
<hr>
<div>
    <?php
    if (isset($error)) {
        echo $error;
    }

    ?>
    <form action="<?php echo site_url('User/dologin'); ?>" method="post">
        <label for="username">Username</label>
        <input required type="text" id="username" name="username" placeholder="Username">

        <label for="password">Password</label>
        <input required type="password" id="password" name="password" placeholder="Password">
        <input required type="submit" value="Submit">
    </form>
</div>
</body>
</html>
