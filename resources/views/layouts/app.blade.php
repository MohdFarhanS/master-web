<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BRIDA Riau')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      .text-blue { color: #0d6efd; }
      #mainNavbar {
        z-index: 1055;
        position: sticky;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
      }
      body {
        min-height: 100vh;
        background: #f5f6fa;
      }
      main#mainContent {
        padding-top: 90px !important;
      }
      @media (max-width: 991.98px) {
        main#mainContent {
          padding-top: 120px !important;
        }
      }
    </style>
    @stack('styles')
</head>
<body style="background:#f5f6fa;">
    @include('partials.navbar')
    <main id="mainContent">@yield('content')</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tidak perlu JS padding, sudah di-handle CSS sticky dan padding-top -->
    @stack('scripts')
</body>
</html>