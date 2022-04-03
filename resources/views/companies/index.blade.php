<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LaravelCRUD - Company</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <style>
        .heading {
            text-align: center;
        }
        .pull-right {
            text-align: end;
        }
    </style>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <br>
                    <br>
                    <h2 class = "heading">Laravel CRUD</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-warning" href="{{ route('companies.create') }}"> Create Data</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>Num</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->address }}</td>
                    <td>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $companies->links() !!}
</body>

</html>
