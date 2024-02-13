<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des rôles</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center">Gestion des rôles</h1>

    <div class="row">
        <div class="col-md-6">
            <h2>Assigner un rôle à un utilisateur</h2>
            <form action="{{ route('assign.role') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id">Utilisateur :</label>
                    <select class="form-control" name="user_id" id="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="role">Rôle :</label>
                    <select class="form-control" name="role" id="role">
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Assigner</button>
            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <h2 class="text-center">Users with role "Membre"</h2>
            <ul class="list-group">
                @foreach($usersWithMembreRole as $user)
                    <li class="list-group-item">{{ $user->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-4">
            <h2 class="text-center">Users with role "Administrateur"</h2>
            <ul class="list-group">
                @foreach($usersWithAdminRole as $user)
                    <li class="list-group-item">{{ $user->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-4">
            <h2 class="text-center">Users with role "Rédacteur"</h2>
            <ul class="list-group">
                @foreach($usersWithRedirecteurRole as $user)
                    <li class="list-group-item">{{ $user->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
