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
                    <button>
                        <a href="{{ route('book.edit',['id'=>$item->id]) }}">Edit</a>
                    </button>
                    <form action="{{ route('book.delete',['id'=>$item->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>{{ isset($bookDetail)?'Edit':'Add'}}</h3>
    <form action="{{ isset($bookDetail)?route('book.update',['id'=>$bookDetail->id]):route('book.store') }}" method="post">
        @csrf
        @if (isset($bookDetail))
            @method('PUT')
        @endif
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ old('title',$bookDetail->title??'') }}" required><br><br>

        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author" value="{{ old('author',$bookDetail->author??'') }}" required><br><br>

        <label for="published_year">Published Year:</label><br>
        <input type="number" id="published_year" name="published_year" min="1900" max="2099" value="{{ old('published_year',$bookDetail->published_year??'') }}" required><br><br>

        <input type="submit" value="Add Book">
    </form>
</body>
</html>
