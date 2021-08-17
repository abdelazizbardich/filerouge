<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data->subject }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins',sans-serif;
        }
        html,body{
        height: 100vh;
        width: 100%;
        background: #000000;
        }
        .wrapper{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50% , -50%);
        background: #fff;
        max-width: 400px;
        width: 90%;
        margin: auto;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
        }
        .wrapper .top{
        display: flex;
        justify-content: center;
        align-items: center;
        background: #000000;
        height: 140px;
        position: relative;
        border-radius: 12px 12px 0 0;
        }
        .wrapper .top::before{
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        background: #eeff00;
        bottom: -10px;
        transform: rotate(45deg);
        }
        .wrapper .top i{
        font-size: 70px;
        color: #ccc;
        }
        .wrapper .bottom{
        padding: 30px;
        word-spacing: -1px;
        }
        .wrapper .bottom .info{
        font-size: 20px;
        font-weight: 500;
        }
        .wrapper .bottom .input-box{
        height: 45px;
        margin: 15px 0 10px 0;
        }
        .wrapper form .input-box input{
        height: 100%;
        width: 100%;
        padding-left: 14px;
        outline: none;
        font-size: 18px;
        border-radius: 25px;
        transition: all 0.4s ease;

        }
        .wrapper .bottom input[type="text"]{
        border: 2px solid #ccc;
        }
        .wrapper .bottom input[type="text"]:focus,
        .wrapper .bottom input[type="text"]:valid{
        border-color: #6665ee;
        }
        .wrapper .bottom input[type="submit"]{
        border: none;
        cursor: pointer;
        background: #6665ee;
        color: #fff;
        letter-spacing: 1px;
        }
        .wrapper .bottom input[type="submit"]:hover{
        background: #1414b8;
        }
        .wrapper .bottom .footer{
        font-size: 16px;
        margin-top: 12px;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <div class="top">
          <img src="{{ asset('img/logo.png') }}" alt="">
        </div>
        <div class="bottom">
          <div class="info">
            Contact message from <br><strong>{{ $data->name }}</strong> <br>
            {{ $data->email }}
          </div>

          <div>
              <strong>Subject:</strong> {{ $data->subject }}
          </div>
          <div>
              <strong>Message:</strong> <br>{{ $data->message }}
          </div>

        </div>
      </div>
</body>
</html>
