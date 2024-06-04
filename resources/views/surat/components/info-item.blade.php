@props(['label' => 'Label'])
<tr>
  <td>{{ $label }}</td>
  <td style="width: 12px">:</td>
  <td>{{ $slot }}</td>
</tr>