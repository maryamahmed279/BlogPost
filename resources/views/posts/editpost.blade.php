<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a8415bff;
            display: flex;
            justify-content: center;
            padding: 30px;
            background-image: url('{{ asset('./assets/cherry.jpg') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover; /* ensures it fills screen on mobile */
            padding: 20px; /* keeps form away from edges */
        }
        form {
            background:palevioletred;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            width: 500px;
            color: white;

        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            height: 120px;
            resize: vertical;
        }
        button {
            background-color: #445fb9ff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4b4bc8ff;
        }
        .error {
            color: red;
            font-size: 0.9rem;
        }
        .c{
            background-color: #cd1a50ff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .c:hover{
             background-color: #c9697dff;
        }
    </style>
</head>
<body>

<form action="{{ route('update.post',$post->id)}}" method="post">
    @csrf
    @method('PUT')
    <label for="title">Title *</label>
    <input type="text" id="title" name="title" value="{{ old('title', $post->title)}}">
    @error('title')
        <div class="error">{{ $message }}</div>
    @enderror
    <label for="content">Content *</label>
    <textarea id="content" name="content">{{old('content', $post->content) }} </textarea>
    @error('content')
        <div class="error">{{ $message }}</div>
    @enderror
    <button type="submit">Update Post</button>
    <a class="c" type="submit" href="{{ route('posts') }}">Cancle</a>
</form>

</body>
</html>
