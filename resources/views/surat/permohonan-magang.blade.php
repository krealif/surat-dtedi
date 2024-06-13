@php
  $start = Carbon\Carbon::parse($tgl_mulai);
  $end = Carbon\Carbon::parse($tgl_selesai);
@endphp

<x-surat::document>
  <span class="tgl-right">Yogyakarta, {{ \Carbon\Carbon::now()->translatedFormat('j F Y') }}</span>
  <div class="body-main">
    <x-surat::info-list style="margin-top: 24px">
      <x-surat::info-item label="Nomor">
        _____/UN1/SV2-TEDI/AKM/PJ/{{ date("Y") }}
      </x-surat::info-item>
      <x-surat::info-item label="Lampiran">
        -
      </x-surat::info-item>
      <x-surat::info-item label="Hal">
        Permohonan Magang
      </x-surat::info-item>
    </x-surat::info-list>

    <x-surat::info-list style="margin-top: 24px;margin-bottom: 24px">
      <x-surat::info-item label="Kepada">
        {!! nl2br(e($penerima)) !!}
      </x-surat::info-item>
    </x-surat::info-list>

    <p class="justify">Dengan hormat,<br>Kami mohon izin bagi mahasiswa Program Studi {{ $prodi }} Sekolah Vokasi Universitas Gadjah Mada berikut ini :</p>

    <x-surat::info-list tab=2 style="margin-left: 24px">
      <x-surat::info-item label="Nama">
        {{ $nama }}
      </x-surat::info-item>
      <x-surat::info-item label="NIM">
        {{ $nim }}
      </x-surat::info-item>
      <x-surat::info-item label="Prodi">
        {{ $prodi }}
      </x-surat::info-item>
      <x-surat::info-item label="Departemen">
        Teknik Elektro dan Informatika, Sekolah Vokasi UGM
      </x-surat::info-item>
    </x-surat::info-list>

  <p class="justify">Untuk melaksanakan Magang di {{ $tempat }} mulai tanggal {{ $start->translatedFormat('j F Y') }} s.d. {{ $end->translatedFormat('j F Y') }}. Apabila berkenan untuk konfirmasi lebih lanjut dapat menghubungi Sekretariat Departemen Teknik Elektro dan Informatika SV-UGM dengan nomor telepon 0274 561111 dan email tedi.sv@ugm.ac.id.</p>
  <p>Demikian permohonan ini, atas perhatian dan kerja samanya kami ucapkan terima kasih.</p>
  </div>

  <x-surat::ttd :atasNama=true :tanggal=false />

  <div style="clear: both; padding-top: 20px;"><u>TEBUSAN :</u> <br>
    <ol>
      <li>Ketua Prodi {{ $prodi }}</li>
      <li>Mahasiswa yang bersangkutan</li>
    </ol>
  </div>
</x-surat::document>