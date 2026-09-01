<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaHejo — Platform Jejak Karbon & Gaya Hidup Berkelanjutan</title>
    
    <!-- KaHejo Favicon / Web Tab Icon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    <link rel="alternate icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpg') }}">
    
    <!-- Google Fonts & Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- External Modular Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

    <!-- Ambient Dynamic Glows & Grid Background -->
    <div class="ambient-glow-1"></div>
    <div class="ambient-glow-2"></div>
    <div class="ambient-grid"></div>

    <!-- Navigation Bar & Mobile Drawer -->
    @include('partials.landing.navbar')

    <!-- Main Content Sections -->
    <main class="main-wrapper">
        @include('partials.landing.hero')
        @include('partials.landing.stats')
        @include('partials.landing.features')
        @include('partials.landing.how-it-works')
        @include('partials.landing.testimonials')
        @include('partials.landing.faq')
        @include('partials.landing.cta')
    </main>

    <!-- Modern Footer -->
    @include('partials.landing.footer')

    <!-- External Modular JavaScript -->
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>