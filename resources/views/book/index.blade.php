<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
</head>
<body>
    <h1>List</h1>

    @if (session('success'))
        <div role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div role="alert">
            <ul>
                @foreach ( $errors->all() as $item )
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data Buku 1 -->
            @foreach ( $book as $item )
            <tr>
                <td>{{ $loop -> iteration }}</td>
                <td>{{ $item -> title }}</td>
                <td>{{ $item -> author }}</td>
                <td>{{ $item -> published_year }}</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Add</h3>
    <form action="{{ route('book.store') }}" method="post">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author" required><br><br>

        <label for="published_year">Published Year:</label><br>
        <input type="number" id="published_year" name="published_year" min="1900" max="2099" required><br><br>

        <input type="submit" value="Add Book">
    </form>
</body>
</html>
