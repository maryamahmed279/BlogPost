<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box; /* prevents overflow */
    }

    body {
        font-family: Arial, sans-serif;
        background-color: rgba(173, 65, 83, 1);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url('{{ asset('./assets/buildings2.jpg') }}');
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        background-size: cover; /* ensures it fills screen on mobile */
        padding: 20px; /* keeps form away from edges */
    }

    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    form {
        background: palevioletred;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 500px; /* instead of fixed width */
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

    .error {
        color: yellow;
        font-size: 0.85rem;
        margin-top: 3px;
    }

    button {
        width: 100%;
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

    /* Mobile-specific adjustments */
    @media (max-width: 600px) {
        h1 {
            font-size: 1.6rem;
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
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <h1>Register</h1>

        <label for="first_name">First Name *</label>
        <input type="text" id="first_name" name="first_name" value="{{old('first_name')}}" >
        @error('first_name')
            <div class="error">{{ $message }}</div>
        @enderror
        <label for="last_name">Last Name *</label>
        <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}"  >
        @error('last_name')
            <div class="error">{{ $message }}</div>
        @enderror
        <label for="email">Email Address *</label>
        <input type="email" id="email" name="email" value="{{old('email')}}"  >
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
        <label for="password">Password *</label>
        <input type="password" id="password" name="password" >
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
        <label for="password_confirmation">Confirm Password *</label>
        <input type="password" id="password_confirmation" name="password_confirmation" >
         @error('password_confirmation')
            <div class="error">{{ $message }}</div>
        @enderror
        <div class="btn">
            <button type="submit">Register</button>
        </div>
        <div class="link">
        <a href="{{route ('login')}}">Do you have an account?login</a>
        </div>
    </form>
    </div>
</body>
</html>
