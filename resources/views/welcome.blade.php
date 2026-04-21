<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminProductsApp - Learning Middleware</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; }
            .glass {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
        </style>
    </head>
    <body class="antialiased bg-slate-50 text-slate-900 min-h-screen flex flex-col">
        <div class="relative flex-1 flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            
            <!-- Navbar -->
            <nav class="absolute top-0 w-full flex justify-between p-8 items-center max-w-7xl">
                <div class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    AdminProductsApp
                </div>
                <div class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2 rounded-full font-medium transition-all hover:bg-slate-200">Dashboard</a>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.products') }}" class="px-5 py-2 bg-indigo-600 text-white rounded-full font-medium shadow-lg hover:bg-indigo-700 transition-all">Admin Panel</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2 rounded-full font-medium transition-all hover:bg-slate-200">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2 bg-slate-900 text-white rounded-full font-medium shadow-lg hover:bg-slate-800 transition-all">Register</a>
                        @endif
                    @endauth
                </div>
            </nav>

            <!-- Error Message -->
            @if(session('error'))
                <div class="mb-8 w-full max-w-md bg-red-50 border-l-4 border-red-500 p-4 rounded shadow-sm animate-bounce">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.292-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 font-medium">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="text-center max-w-3xl glass p-12 rounded-3xl shadow-2xl">
                <h1 class="text-5xl md:text-7xl font-bold tracking-tight text-slate-900 mb-6">
                    Master <span class="text-indigo-600">Laravel</span> <br>Middleware & Seeders
                </h1>
                <p class="text-xl text-slate-600 mb-10 leading-relaxed">
                    A test project to explore role-based authentication, fake data generation (Factories), and database seeding. Perfect for beginners and advanced testing.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('admin.products') }}" class="group relative px-8 py-4 bg-slate-900 text-white rounded-2xl font-bold text-lg shadow-xl hover:bg-slate-800 transition-all flex items-center justify-center">
                        Try Admin Access
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <div class="flex flex-col text-left text-sm text-slate-500 px-4 py-2 bg-slate-100 rounded-2xl">
                        <span class="font-bold text-slate-700">Quick Test Accounts:</span>
                        <span>Admin: admin@admin.com / password</span>
                        <span>User: user@user.com / password</span>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="p-8 text-center text-slate-400 text-sm border-t border-slate-200">
            Created for learning & testing purposes. Built with Laravel 11.
        </footer>
    </body>
</html>
