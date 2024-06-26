@php
  $start = Carbon\Carbon::parse($tgl_mulai);
  $end = Carbon\Carbon::parse($tgl_selesai);
  $totalMonth = $start->diffInMonths($end, true);
@endphp

<x-surat::document>
  <div class="body-header">
    <h1 class="title">SURAT TUGAS</h1>
    <span class="nomor-surat">NO. 1111/UN1/SV.2-TEDI/PREVIEW/2024</span>
  </div>
  <div class="body-main">
    <p>Yang bertanda tangan dibawah ini:</p>
    <x-surat::info-list>
      <x-surat::info-item label="Nama">
        {{ config('constant.kadep.name') }}
      </x-surat::info-item>
      <x-surat::info-item label="NIKA">
        {{ config('constant.kadep.nika') }}
      </x-surat::info-item>
      <x-surat::info-item label="Jabatan">
        Ketua Departemen Teknik Elektro dan Informatika, Sekolah Vokasi UGM
      </x-surat::info-item>
    </x-surat::info-list>
    <p>Dengan ini menugaskan bahwa mahasiswa yang tersebut di bawah ini,</p>

    @if (isset($kelompok[1]))
    <table class="table">
      <tr>
        <th style="width: 16px">No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Prodi</th>
      </tr>
      @foreach (array_values($kelompok) as $anggota)
        <tr>
          <td style="text-align: center">{{ $loop->iteration . '.' }}</td>
          <td>{{ $anggota['nama'] }}</td>
          <td>{{ $anggota['nim'] }}</td>
          <td>{{ $prodi }}</td>
        </tr>
      @endforeach
    </table>
    @else
    <x-surat::info-list tab=2 style="margin-left: 24px">
      <x-surat::info-item label="Nama">
        {{ $kelompok[0]['nama'] }}
      </x-surat::info-item>
      <x-surat::info-item label="NIM">
        {{ $kelompok[0]['nim'] }}
      </x-surat::info-item>
      <x-surat::info-item label="Prodi">
        {{ $prodi }}
      </x-surat::info-item>
    </x-surat::info-list>
    @endif

    <p class="justify">Untuk melakukan kegiatan Praktik Industri di {{ $perusahaan }} selama {{ floor($totalMonth) }} bulan dari tanggal {{ $start->translatedFormat('j F Y') }} s.d. {{ $end->translatedFormat('j F Y') }}, dengan dosen pembimbing : {{ $dospem }}</p>
    <p class="justify">Demikian surat tugas ini dibuat, untuk dapat dipergunakan sebagaimana mestinya.</p>
  </div>
  <x-surat::ttd />
</x-surat::document>