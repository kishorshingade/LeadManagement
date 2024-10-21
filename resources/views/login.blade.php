<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">

    <!-- font awesom link -->

    <script src="https://kit.fontawesome.com/f83037413b.js" crossorigin="anonymous"></script>

    <!-- bootstrap cdn -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <title></title>
    <link rel="stylesheet" href="{{ asset('assets/css/signin.css') }}">
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: "Comic Sans MS", cursive;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #fafafa;
            /* Warna latar belakang abu-abu muda */
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        .card {
            /* border: 2px solid black; */
            width: 100%;
            background-color: #f8f8f8;
            /* Warna card */
            padding: 50px;
            border-radius: 6px;
            /* Border radius card */
            box-shadow: rgba(10, 0, 0, 0.55) 0px 5px 15px;
            background: linear-gradient(90deg, rgb(123, 116, 245), rgb(144, 85, 236), rgb(158, 65, 232));
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            color: white !important;
            width: 100%;
            border: none;
            border-bottom: 1px solid white;
            font-weight: 700;
            font-size: 18px;
            padding: 10px;
            margin-bottom: 12px;
            /* border: 2px solid #ddd;  */
            /* border-radius: 8px;  */
            transition: border-color 0.3s ease-in-out;
            outline: none;
            color: #333;
            background: none;
            /* background-color: #f4f4f4;  */
            /* box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; */

        }

        input:focus {
            border-color: #ff9900;
            /* Warna input saat focus */
        }

        input::placeholder {
            color: white;
            font-size: 17px;
        }

        button {
            width: 50%;
            background: white;
            /* background: linear-gradient(90deg, rgb(21, 114, 232), rgb(72, 171, 247), rgb(200, 207, 255)); */
            /* background: linear-gradient(to right, rgb(112, 149, 234), rgb(104, 97, 206)); */
            /* background-color: #ff9900; Warna button */
            color: black;
            padding: 10px;
            border: none;
            border-radius: 3px;
            /* Border radius button */
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: rgb(222, 237, 255);
            /* background-color: #ff6600; */
            /* Warna button saat hover */
        }

        .form-group {
            position: relative;
        }

        .icon-style {
            position: absolute;
            top: 17px;
            font-size: 18px;
            color: #fff;
        }

        .link-style {
            color: rgb(222, 237, 255);
            transition: all ease-in 300ms;
        }

        .link-style:hover {
            color: white !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container">
            <div class="card">
                <h2 class="fw-bold text-white">Login</h2>
                <div id="message"></div>
                <form id="login_form">
                    <div class="form-group">
                        <i class="fa-regular fa-envelope icon-style"></i>
                        <input class="px-4" type="text" id="email" name="email" placeholder="Email"
                            style="padding-left:10px">
                    </div>
                    <div id="email_error" class="text-danger" style="color: red;"></div><br>


                    <div class="form-group">
                        <i class="fa-solid fa-lock icon-style"></i>
                        <input class="px-4" type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <div id="password_error" class="text-danger" style="color: red;"></div><br>


                    <div class="text-center">
                        <button type="submit" id="login_btn" style="font-weight: 700; font-size:20px">Login</button>
                    </div>
                </form>


            </div>
        </div>

    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/login.js') }}"></script>

</body>

</html>
