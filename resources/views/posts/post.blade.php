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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('{{ asset('./assets/floral.jpg') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover; /* ensures it fills screen on mobile */
            padding: 20px; /* keeps form away from edges */
        }

        .container {
            max-width: 800px;
            width: 100%;
            padding: 1rem;
        }

        .post {
            background-color: pink;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .post-actions {
            display: flex;
            gap: 0.5rem;
            position: absolute;
            top: 2px;
            right: 10px;
        }

        .btn {
            border: none;
            padding: 0.4rem 0.7rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            color: white;
        }

        .btn-edit {
            background-color: #3498db;
            text-decoration: none;
        }
        .btn-edit:hover {
            background-color: #217dbb;
        }

        .btn-delete {
            background-color: #e74c3c;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }

        .btn-cancel {
            background-color: #7f8c8d;
            margin-top: 1rem;
            display: block;
            width: 5rem;
            text-decoration: none;
            text-align: center;
        }
        .btn-cancel:hover {
            background-color: #5f6d6d;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="post">
            <!-- Top Buttons -->
            <div class="post-actions">
                @can('update', $post)
                <a href="{{ route('edit', $post->id) }}" class="btn btn-edit">Edit</a>
                @endcan
                @can('update', $post)
                <form action="{{ route('delete.post', $post->id) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">Delete</button>
                </form>
                @endcan
            </div>

            <h3>{{ $post->title }}</h3>
            <p>{{ $post->content }}</p>

            <!-- Cancel Button -->
            <a href="{{ route('posts') }}" class="btn btn-cancel">Cancel</a>
        </div>
    </div>
</body>
</html>
