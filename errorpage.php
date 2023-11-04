<!DOCTYPE html>
<html>
<head>
    <title>Login Error</title>
    <style>
       body, html, p {
            height: 100%;
            margin: 0;
            font-family: 'Times New Roman', Times, serif;
            background: linear-gradient(to bottom, #ffeecc, #f2bc4e);
            font-size: 20px;
        }

        h1 {
            color: white;
            background-color: #333;
            padding: 20px;
        }

        p {
            color: #333;
            font-size: 18px;
            padding: 20px;
        }

        a {
            color: #f2bc4e;
            background-color: #333; 
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <center><h1>Login Error</h1></center>
    <?php
    if (isset($_SESSION['login_error'])) {
        echo '<p>' . $_SESSION['login_error'] . '</p>';
        unset($_SESSION['login_error']); 
    }
    ?>
    <center><a href="index.html">Back to Login</a></center>
</body>
</html>
