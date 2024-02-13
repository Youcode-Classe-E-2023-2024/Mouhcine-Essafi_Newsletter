<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des rôles et des permissions</title>
</head>
<body>
    <h1>Gestion des rôles et des permissions</h1>

    <h2>Assigner un rôle à un utilisateur</h2>
    <form action="{{ route('assign.role') }}" method="POST">
        @csrf
        <label for="user_id">Utilisateur :</label>
        <select name="user_id" id="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <label for="role">Rôle :</label>
        <select name="role" id="role">
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <button type="submit">Assigner</button>
    </form>

    <h2>Gérer les permissions pour chaque utilisateur</h2>
    @foreach($users as $user)
        <h3>Permissions pour {{ $user->name }}</h3>
        <form action="{{ route('manage.permissions', $user->id) }}" method="POST">
            @csrf
            <label for="permissions">Permissions :</label>
            <select name="permissions[]" id="permissions" multiple>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
            </select>

            <button type="submit">Enregistrer</button>
        </form>
    @endforeach
</body>
</html>
