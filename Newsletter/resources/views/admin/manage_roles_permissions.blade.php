<x-admin-layout>

    <main class="container mx-auto px-4 py-8 text-white">
        <h1 class="text-center text-3xl font-semibold mb-8">Gestion des rôles</h1>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <h2 class="text-center text-xl font-semibold mb-4">Assigner un rôle à un utilisateur</h2>
                <form action="{{ route('assign.role') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Utilisateur :</label>
                        <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-indigo-500" name="user_id" id="user_id">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rôle :</label>
                        <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-indigo-500" name="role" id="role">
                            @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Assigner</button>
                </form>
            </div>
            <div class="col-span-2">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <h2 class="text-center text-xl font-semibold mb-4">Users with role "Membre"</h2>
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($usersWithMembreRole as $user)
                            <li class="py-2 text-lg font-semibold bg-gray-200 dark:bg-gray-700 rounded-md text-center">{{ $user->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <h2 class="text-center text-xl font-semibold mb-4">Users with role "Administrateur"</h2>
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($usersWithAdminRole as $user)
                            <li class="py-2 text-lg font-semibold bg-gray-200 dark:bg-gray-700 rounded-md text-center">{{ $user->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <h2 class="text-center text-xl font-semibold mb-4">Users with role "Rédacteur"</h2>
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($usersWithRedirecteurRole as $user)
                            <li class="py-2 text-lg font-semibold bg-gray-200 dark:bg-gray-700 rounded-md text-center">{{ $user->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
