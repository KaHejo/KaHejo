<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin FAQ - Carbon Footprint</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #F7FAFC;
        }
        
        .header-gradient {
            background: linear-gradient(90deg, #4A5568 0%, #2F855A 100%);
        }
    </style>
</head>
<body>
    <header class="header-gradient text-white p-4 shadow-md">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-bold">Carbon Footprint - Admin Panel</h1>
                <a href="{{ route('faqs.index') }}" class="text-white hover:underline">Lihat FAQ</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-700 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Carbon Footprint - Admin Panel</p>
        </div>
    </footer>
</body>
</html>