<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-family: 'Muli', sans-serif;
            box-sizing: border-box;
            /* background-color:#212529;  */
        }

        .divider-text {
            position: relative;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .divider-text span {
            padding: 7px;
            font-size: 12px;
            position: relative;
            z-index: 2;
        }

        .input-group-prepend {
            padding: 10px;
        }

        .form-group {
            padding: 6px;
        }

        .divider-text:after {
            border-bottom: 1px solid #ddd;
            content: "";
            position: absolute;
            width: 100%;
            top: 55%;
            left: 0;
            z-index: 1;
        }

        .btn-facebook {
            background-color: #405D9D !important;
            color: #fff !important;
        }

        .btn-gmail {
            background-color: #ea4335 !important;
            color: #fff !important;
        }

        .fixingStyle {
            background: linear-gradient(rgb(21 173 219 / 76%), rgb(183 32 32 / 82%));
            border-radius: 5% 14% !important;
        }

        body {
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url("https://wallpapercave.com/wp/wp2326976.jpg") !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .bg-dark {
            --bs-bg-opacity: 0 !important;
            margin-top: 2rem !important;

        }

        .form-control {
            background: transparent !important;
            color: white !important;
        }

        .form-control::placeholder {
            color: aqua !important;
            opacity: 0.5 !important;
        }

        .input-group-text {
            background: linear-gradient(45deg, rgb(219 143 21 / 76%), rgb(255 0 0 / 78%));
        }

        .fa {
            color: white;
        }


        a {
            color: aqua !important;
            text-decoration: underline !important;
        }

        a:hover {
            color: white !important;
        }
    </style>
</head>