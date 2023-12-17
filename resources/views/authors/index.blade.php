<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Author</h2>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form name="book-save-form" id="book-save-form" action="{{ url('/authors/save-authors') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="author-id">Author ID</label>
                <input type="text" class="form-control" name="author_id" id="author-id" readonly>
            </div>
            <div class="form-group">
                <label for="author-name">Author Name</label>
                <input type="text" class="form-control" name="author_name" id="author-name">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Author ID</th>
                    <th scope="col">Author Name</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @php($num = 1)
                @foreach ($data as $b)
                <tr class="row-data">
                    <td>{{ $num++ }}</td>
                    <td>{{ $b['author_id'] }}</td>
                    <td>{{ $b['author_name'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add the Bootstrap JS and Popper.js scripts (order matters) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
