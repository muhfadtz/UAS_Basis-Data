<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* POPPINS FONT */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans serif;
        }

        body {
            background-image: url(img/background.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }

        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        .container {
            width: 350px;
            display: flex;
            flex-direction: column;
            padding: 0 15px 0 15px;
        }

        header {
            color: #fff;
            font-size: 30px;
            display: flex;
            justify-content: center;
            padding: 10px 0 10px 0;
        }

        .input-field {
            display: flex;
            flex-direction: column;
            padding-top: 16px;
        }

        .input-field .input {
            height: 45px;
            width: 87%;
            border: none;
            outline: none;
            border-radius: 30px;
            color: #fff;
            padding: 0 0 0 42px;
            background: rgba(255, 255, 255, 0.1);
        }

        i {
            position: absolute;
            margin-top: 14px;
            margin-left: 16px;
            color: #fff;
        }

        ::-webkit-input-placeholder {
            color: #fff;
        }

        .submit {
            border: none;
            border-radius: 30px;
            font-size: 15px;
            height: 45px;
            outline: none;
            width: 100%;
            background: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: .3s;
        }

        .submit:hover {
            box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
        }

        .bottom {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-size: small;
            color: #fff;
            margin-top: 10px;
        }

        .left {
            display: flex;
        }

        label a {
            color: #fff;
            text-decoration: none;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="box">
        <div class="container">
            <div class="top-header">

                <header>Login</header>
            </div>
            <form action="aksi.php" method="post">
                <div class="input-field">
                    <input type="text" class="input" placeholder="Username" name="username" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="input" placeholder="Password" name="password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" value="Login">
                </div>

                <div class="bottom">
                    <div class="left">
                        <input type="checkbox" id="check">
                        <label for="check"> Remember Me</label>
                    </div>
                    <div class="right">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>