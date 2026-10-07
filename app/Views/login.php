<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - POS System</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #f4f6f9;
        }

        .login-container {
            width: 400px;
            max-width: 90%;

            background: white;

            padding: 35px;

            border-radius: 12px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .login-container .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            margin-bottom: 8px;

            font-weight: bold;
        }

        .form-group input {
            width: 100%;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 6px;

            font-size: 15px;
        }

        .form-group input:focus {
            outline: none;

            border-color: #007bff;
        }

        .login-button {
            width: 100%;

            padding: 12px;

            border: none;

            border-radius: 6px;

            background: #007bff;

            color: white;

            font-size: 16px;

            cursor: pointer;
        }

        .login-button:hover {
            background: #0056b3;
        }

        .error-message {
            background: #f8d7da;

            color: #842029;

            padding: 12px;

            border-radius: 6px;

            margin-bottom: 20px;
        }

        .success-message {
            background: #d1e7dd;

            color: #0f5132;

            padding: 12px;

            border-radius: 6px;

            margin-bottom: 20px;
        }

    </style>

</head>

<body>

    <div class="login-container">

        <h1>POS System</h1>

        <p class="subtitle">
            Staff Login
        </p>

        <?php if (session()->getFlashdata('error')): ?>

            <div class="error-message">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>

        <?php endif; ?>


        <?php if (session()->getFlashdata('success')): ?>

            <div class="success-message">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>

        <?php endif; ?>


        <form
            action="<?= base_url('login/authenticate') ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter username"
                    required
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >

            </div>


            <button
                type="submit"
                class="login-button"
            >
                Login
            </button>

        </form>

    </div>

</body>

</html>