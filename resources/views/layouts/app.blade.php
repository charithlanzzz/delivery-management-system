<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home Page')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body>
    <header class="bg-success text-white p-3">
        <div class="container">
            <h1>Delivery Management System</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link text-white"
                            href="{{ route('delivery.requests.index') }}">Delivery Requests</a></li>
                    <li class="nav-item"><a class="nav-link text-white"
                            href="{{ route('delivery.requests.create') }}">Create Delivery Requests</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container my-4">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Delivery Management System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    @yield('scripts')
    
</body>

</html>
