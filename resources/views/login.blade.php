<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box; /* better control */
    }

    body {
        font-family: Arial, sans-serif;
        background-color: rgba(173, 65, 83, 1);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url('{{ asset('./assets/buildings.jpg') }}');
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        background-size: cover; /* fill screen on mobile */
        padding: 20px;
    }

    form {
        background: palevioletred;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 500px; /* instead of fixed width */
    }

    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    h1 {
        text-align: center;
        margin-bottom: 15px;
        color: white;
        font-size: 2rem;
    }

    label {
        font-weight: bold;
        display: block;
        margin-top: 10px;
        color: white;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 4px;
        border: 1px solid #ccc;
        background-color: whitesmoke;
        font-size: 1rem;
    }

    button {
        width: 100%; /* full width on small devices */
        padding: 12px;
        margin-top: 15px;
        border: none;
        border-radius: 4px;
        background-color: pink;
        color: white;
        font-size: 1.1rem;
        cursor: pointer;
    }

    button:hover {
        background-color: rgb(230, 230, 230);
        color: black;
    }

    .link {
        margin-top: 10px;
        text-align: center;
    }

    .link a:hover {
        color: #ccc;
    }

    /* Mobile adjustments */
    @media (max-width: 600px) {
        h1 {
            font-size: 1.5rem;
        }
        form {
            padding: 20px;
        }
        button {
            font-size: 1rem;
        }
    }

    @include('includes.alertstyle')
</style>
</head>
<body>
    <div class="form-container">
    @include('includes.alert')

    <form action="{{ route('login') }}" method="post">
        @csrf
        <h1>Login</h1>

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" >

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <div class="btn">
            <button type="submit">Login</button>
        </div>
        <div class="link">
        <a href="{{route ('register')}}">creat account?Register</a>
        </div>
    </form>
    </div>
</body>
</html>
