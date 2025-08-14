<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Intro</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: rgb(152, 52, 69);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('{{ asset('./assets/lapsetup.jpg') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover; /* fill screen on mobile */
            padding: 20px;
        }

        .container {
            text-align: center;
        }
        .header {
            font-size: 1.5rem;
            margin-bottom: 15px;
            background-color: pink;
            text-transform: capitalize;
            padding: 40px;
            border-radius: 20px;
            color:palevioletred;
        }
        .circle-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: white;
            background-image: url('/BlogPost/app/assets/Blog.jpg');
            background-size: cover;
            background-position: center;
            margin: 20px auto;
            border: 4px solid white;
        }
        .btns {
            margin-top: 20px;
        }
        .btns a {
            background-color: pink;
            color:palevioletred;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 25px;
            font-size: 1.5rem;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
        }
        .btns a:hover {
            background-color: rgb(230, 230, 230);
        }
        img{
            width:200px;
            height: 200px;
            border-radius: 50%;
        }
        .logout-btn {
            border: none;
            margin-top: 40px;
            color:palevioletred;
            padding: 10px 20px;
            margin: 5px;
            margin-top: 15px;
            border-radius: 25px;
            font-size: 1.5rem;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Let's share your blog & ideas</h1>
            <p>see others post and collect more information from diffrent minds✨</p>
        </div>
        <div>
        <img src="{{ asset('./assets/blog.jpg') }}" alt="">
        </div>
        @guest
            <div class="btns">
                <a href="{{ route ('register')}}">Register</a>
                <a href="{{ route ('login')}}">Login</a>
            </div>
        @endguest
        @auth
        <div class="btns">
            <a href="{{ route ('posts')}}">Explore All Posts</a>
        </div>
        <div>
        <form action="{{ route('logout') }}" method="get">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        </div>
        @endauth
    </div>
</body>

</html>
