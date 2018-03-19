<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Post</title>
    <link href="<?php echo base_url(); ?>assets/style.css" rel="stylesheet" type="text/css">
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #797675;
            font-family: "Arial Black";
            border-top-right-radius: 20px;
            border-bottom-right-radius: 6px;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 6px;
        }

        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li:last-child {
            border-right: none;
        }

        li a {
            display: ruby;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #ff0003;

        }

        h2 {
            font-family: Courier New;
            font-size: 35px;

        }
    </style>

</head>
<body>
<center><h2>Welcome Everyone</h2>

    <?php
    if (isset($username)) {
        ?>

        <ul>
            <li><a href="<?php echo site_url('User/view/'. $username); ?>">My messages</a></li>
            <li><a href="<?php echo site_url('Message'); ?>">Post a message</a></li>
            <li><a href="<?php echo site_url('search'); ?>">Search</a></li>
            <li><a href="<?php echo site_url('User/feed/' . $username); ?>">Followed Messages</a></li>
            <li style="float:right"><a class="active" href="<?php echo site_url('User/logout'); ?>">Logout</a></li>
            <li style="float:right"><a>You are logged in as: <?php echo $username ?></a></li>
        </ul>

        <?php
    }
    else {
    ?>

    <ul>
        <li style="float:right"><a href="<?php echo site_url('User/login'); ?>">Login</a></li>
        <li style="float:right"><a href="<?php echo site_url('search'); ?>">Search</a></li>

        <?php
        }
        ?>
    </ul>
    <br><br><br>


    <table class="table">
        <tr>
            <td class="frow" colspan="3">Username, posts and the time for when the posts were made..</td>
        </tr>

        <?php
        foreach ($Messages as $row) {
            $user = $row['user_username'];
            ?>

            <tr>
                <td class="tdata" width="25%"><a
                            href="<?php echo site_url('User/view/' . $row['user_username']); ?>"><?php echo $row['user_username']; ?></a>
                </td>
                <td class="tdata" width="60%"><?php echo $row['text']; ?></td>
                <td class="tdata" width="15%"><?php echo $row['posted_at']; ?></td>
            </tr>

            <?php
        }

        ?>
        <?php

        if (isset($follow)) {
            if ($follow == false) {
                ?>

                <p>To follow ----> <?php echo $row['user_username']; ?> <a
                            href="<?php echo site_url('User/follow/' . $user); ?>">Click here</a></p>

                <?php
            }
        }
        ?>

    </table>
</center>
</body>
</html>