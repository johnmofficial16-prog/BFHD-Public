<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BFHD Admin - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-emerald-400">BFHD Admin</h1>
            <p class="text-gray-400 mt-2">Sign in to access your dashboard</p>
        </div>

        @if($errors->any())
            <div class="bg-red-900/50 border border-red-500 text-red-300 px-4 py-3 rounded-lg mb-6">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Username</label>
                <input type="text" name="username" required
                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
            </div>
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-emerald-500 transition">
            </div>
            <button type="submit" 
                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 rounded-lg transition">
                Sign In
            </button>
        </form>

        <p class="text-center text-gray-500 text-sm mt-6">
            <a href="{{ url('/') }}" class="hover:text-gray-300">&larr; Back to website</a>
        </p>
    </div>
</body>
</html>
