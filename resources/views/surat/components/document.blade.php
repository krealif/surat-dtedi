<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('css/surat/style.css') }}">
</head>
<body class="doc-root">
  <x-surat::kop/>
  <div class="doc-body">
    {{ $slot }}
  </div>
</body>
</html>