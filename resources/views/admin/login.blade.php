<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-6 text-2xl font-bold text-center text-gray-700">Login</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf 
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-600">Name:</label>
                <input type="text" name="name" id="name" 
                       class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500"
                       required>
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password:</label>
                <input type="password" name="password" id="password"
                       class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500"
                       required>
            </div>
            
        
            <div class="mb-4 mt-6">
                <button type="submit"
                    class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    Login
                </button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
</body>

</html>
