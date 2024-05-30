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

    <div style="margin-left: 30px;">
      <x-surat::info-list>
        <x-surat::info-item label="Nama">
          {{ $nama }}
        </x-surat::info-item>
        <x-surat::info-item label="NIM">
          {{ $nim }}
        </x-surat::info-item>
        <x-surat::info-item label="Prodi">
          Sarjana Terapan {{ $prodi }} 
        </x-surat::info-item>
        <x-surat::info-item label="Dosen Pembimbing">
          {{ $dospem }}
        </x-surat::info-item>
      </x-surat::info-list>
    </div>
    
    <p class="justify">Untuk mengikuti kegiatan Magang MBKM yang diselenggarakan oleh {{ $penyelenggara }} tahun {{ $tahun_kegiatan }} selama {{ floor($totalMonth) }} bulan, dimulai tanggal {{ $start->translatedFormat('j F Y'); }} s.d. {{ $end->translatedFormat('j F Y'); }}. <u>Program ini untuk dapat dilaksanakan sesuai dengan Kurikulum Kampus Merdeka.</u> </p>
    <p class="justify">Demikian surat ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
  </div>
  <x-surat::ttd />
</x-surat::document>