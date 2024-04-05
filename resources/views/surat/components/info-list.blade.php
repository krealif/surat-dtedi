@props(['tab' => 1])

<table class="info-list">
  <style>
    table .label {
      width: {{ $tab * 64 }}px;
    }
  </style>
  {{ $slot }}
</table>