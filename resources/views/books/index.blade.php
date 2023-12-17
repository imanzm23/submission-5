<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2>Data Buku</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form name="book-save-form" id="book-save-form" action="{{ url('/books/save-book') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" name="id" id="id" readonly>
        </div>
        <div class="form-group">
            <label for="book-name">Book Name</label>
            <input type="text" class="form-control" name="book_name" id="book-name">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <select class="form-control" name="author_id" id="author">
                <option value="">-- Pilih Author --</option>
                @foreach ($dataAuthor as $a)
                    <option value="{{ $a['author_id'] }}">{{ $a['author_name'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" id="button-reset">Reset</button>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">ID</th>
                <th scope="col">Book Name</th>
                <th scope="col">Author</th>
                <th scope="col">Published Date</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @php($num = 1)
            @foreach ($data as $b)
                <tr class="row-data">
                    <td>{{ $num++ }}</td>
                    <td>{{ $b['id'] }}</td>
                    <td>{{ $b['book_name'] }}</td>
                    <td>{{ $b['author_name'] }}</td>
                    <td>{{ $b['published_at'] }}</td>
                    <td>
                        <button class="btn btn-info button-edit"
                                data-id="{{ $b['id'] }}"
                                data-name="{{ $b['book_name'] }}"
                                data-author="{{ $b['author_id'] }}">Edit</button>
                    </td>
                    <td>
                        <form action="{{ url('/books/delete-book?id=') . $b['id'] }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var button = $('.button-edit')

        $(document).ready(function () {
            clearForm()
        });

        button.each(function (index) {
            $(this).on('click', function () {
                var id = $(this).data('id')
                var name = $(this).data('name')
                var author = $(this).data('author')

                $('#id').val(id)
                $('#book-name').val(name)
                $('#author').val(author)
            });
        });

        $('#button-reset').on('click', function () {
            clearForm()
        })

        function clearForm() {
            $('#id').val('')
            $('#book-name').val('')
            $('#author').val('')
        }
    </script>
</body>
</html>
