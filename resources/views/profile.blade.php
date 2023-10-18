<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile Page</title>
    <!-- Add your custom CSS styles here -->
    <style>
        /* Customize your styles here */
        /* Example: */
        .profile-container {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-success mt-5" href="/dashboard">Retoure</a>
            </div>
            <div class="col-md-8">
                <!-- User information and bio -->
                <div class="profile-container">
                    <h1>{{$user->name}}</h1>
                    <p>Email: {{$user->email}}</p>
                    <p>Registre Social : {{$user->rs}}</p>
                    <p>Registre Commerce: {{$user->rc}}</p>
                    <p>ICE: {{$user->ice}}</p>
                </div>
                <table class="table table-bordered">
                    <h4 class="text-center my-2">Liste des opérations : </h3>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom Marché</th>
                            <th>Num Marché</th>
                            <th>Imprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($operations as $operation)
                        <tr>
                            <td>{{ $operation->id }}</td>
                            <td>{{ $operation->nomMarche }}</td>
                            <td>{{ $operation->numMarche }}</td>
                            <td class="text-center">
                                <button class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Imprimer" onclick="window.location='{{ route("imprimer", ["id" => $operation->id]) }}'">Imprimer</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <!-- Bootstrap and jQuery scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
