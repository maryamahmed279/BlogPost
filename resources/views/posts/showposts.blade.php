<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts | Main</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f4f4f4;
            background-image: url('{{ asset('./assets/flowerRabbit.jpg') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover; /* ensures it fills screen on mobile */

        }

        /* Navigation bar */
        nav {
            width: 100%;
            background-color: #552222ff;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 1.5rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .username {
            font-weight: bold;
            font-size: 1.1rem;
        }

        form {
            margin: 0;
        }

        .logout-btn {
            background-color: #e74c3c;
            border: none;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        /* Main container */
        .container {
            max-width: 800px;
            margin: 1.5rem auto;
            padding: 0 1rem;
        }

        /* Create Post button */
        .create-btn {
            background-color: #104162ff;
            border: none;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .create-btn:hover {
            background-color: #2980b9;
        }

        /* Post styles */
        .post {
            background-color: white;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 6px;
            background-color: pink;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .post h3 {
            margin-bottom: 0.5rem;
        }

        .post p {
            color: #555;
            line-height: 1.5;
        }
        .read-more-btn {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            background-color: #9c124cff;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .read-more-btn:hover {
            background-color: #c7498aff;
        }
        .nav-actions {
            display: flex;
            gap: 0.5rem; /* space between buttons */
        }
        .nav-actions form {
            margin: 0;
        }
        @include('includes.alertstyle')
    </style>
</head>

<body>

<nav>
    <span class="username">hi,{{ auth()->user()->name }}</span>
    <div class="nav-actions">
        <form action="{{ route('creatpost') }}" method="get">
            @csrf
            <button type="submit" class="create-btn">Create Post</button>
        </form>
        <form action="{{ route('logout') }}" method="get">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</nav>
    @include('includes.alert')
    <div class="container">
        <!-- to view the posts in database -->
        @foreach($posts as $post)
        <div class="post">
            <h3>{{ $post->title}}</h3>
            <p>{{substr($post->content, 0, 150). '.....' }}</p>
            <a href="{{route('showpost',$post->id)}}" class="read-more-btn">Read More</a>
        </div>
        @endforeach

    </div>
</body>

</html>