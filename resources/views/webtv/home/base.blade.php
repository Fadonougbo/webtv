@use(App\Models\Category)

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ajoute le meta description -->
    <meta name="description" content="">
    <title>@yield('title')</title>
     @viteReactRefresh
    @vite(['./resources/css/app.css','./resources/js/app.js','resources/webtv_frontend/home/index.ts','./resources/css/message_slider.css'])
   
    @yield('specifique_resources')
</head>
<body class="flex flex-col min-h-screen bg-gray-200" >
    <main class="drawer grow">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col ">
            @php
                $categories=(new Category())->limit(8)->get();
            @endphp
            <!-- Navbar -->
            @include('webtv.shared.nav')
            <!-- Page content here -->
            @yield('content')
        </div>
        @include('webtv.shared.aside')
    </main>

    @include('webtv.shared.footer')
</body>
</html>