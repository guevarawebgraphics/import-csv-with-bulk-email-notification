<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 600px;
            background-color: #ffffff;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
        }

        .header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .label, .data {
            width: 48%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Hi {{$data['first_name']}}, Please check your details below!
        </div>

        <div class="row">
            <div class="label">Company Name:</div>
            <div class="data">{{$data['company']}}</div>
        </div>

        <div class="row">
            <div class="label">First Name:</div>
            <div class="data">{{$data['first_name']}}</div>
        </div>

        <div class="row">
            <div class="label">Last Name:</div>
            <div class="data">{{$data['phone']}}</div>
        </div>

        <div class="row">
            <div class="label">Phone:</div>
            <div class="data">{{$data['phone']}}</div>
        </div>

        <div class="row">
            <div class="label">Mobile Phone:</div>
            <div class="data">{{$data['mobile_phone']}}</div>
        </div>

        <div class="row">
            <div class="label">Email:</div>
            <div class="data">{{$data['email']}}</div>
        </div>

        <div class="row">
            <div class="label">Website:</div>
            <div class="data">{{$data['website']}}</div>
        </div>

        <div class="row">
            <div class="label">Address:</div>
            <div class="data">{{$data['address']}}</div>
        </div>

        <div class="row">
            <div class="label">City:</div>
            <div class="data">{{$data['city']}}</div>
        </div>

        <div class="row">
            <div class="label">State:</div>
            <div class="data">{{$data['state']}}</div>
        </div>

        <div class="row">
            <div class="label">Zip:</div>
            <div class="data">{{$data['zip']}}</div>
        </div>

         <div class="header">
           <a style="color:#fff;" href="{{url('verify', $data['email'])}}">
               Click here to verify your information
           </a>
        </div>

    </div>
</body>
</html>
