<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | BOBLO'S Admin Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-light flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-brand tracking-tight">BOBLO'S</h1>
            <p class="text-sm text-gray-500 mt-2">Admin Backend Portal</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 text-red-700 p-4 rounded-xl mb-6 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-semibold text-body-dark mb-2">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-body-dark mb-2">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-brand focus:ring-brand mr-2">
                    Remember me
                </label>
            </div>

            <button type="submit"
                class="w-full bg-brand text-white font-bold py-3.5 px-4 rounded-xl hover:bg-opacity-95 transition-all text-sm shadow-md shadow-brand/10">
                Log In
            </button>
        </form>
    </div>
</body>
</html>
