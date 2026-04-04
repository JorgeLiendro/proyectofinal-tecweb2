<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #1f1f1f, #5c0a0a);
            height: 100vh;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
            text-align: center;
        }

        .login-card h2 {
            margin-bottom: 20px;
            color: #b30000;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-weight: 600;
            color: #444;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            margin-top: 5px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #cc0000;
            box-shadow: 0 0 5px rgba(204, 0, 0, 0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            background: #cc0000;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        button:hover {
            background: #990000;
        }
        .flash-container {
    position: absolute;
    top: 20px;
    width: 100%;
    display: flex;
    justify-content: center;
}

.flash-container .message {
    background: #ffdddd;
    color: #b30000;
    padding: 12px 20px;
    border-radius: 8px;
    border-left: 5px solid #b30000;
    font-weight: 500;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
}
    </style>
</head>

<body>
    <div class="flash-container">
        <?= $this->Flash->render() ?>
    </div>
    <?= $this->fetch('content') ?>
</body>
</html>