@php
  $start = Carbon\Carbon::parse($tgl_mulai);
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
        Permohonan Penelitian Proyek Akhir
      </x-surat::info-item>
    </x-surat::info-list>

    <x-surat::info-list style="margin-top: 24px;margin-bottom: 24px">
      <x-surat::info-item label="Kepada">
        {!! nl2br(e($penerima)) !!}
      </x-surat::info-item>
    </x-surat::info-list>

    <p class="justify">Dengan hormat,<br>Dengan ini kami mengajukan Penelitian Proyek Akhir di {{ $tempat }} bagi mahasiswa berikut :</p>

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

  <p class="justify">Untuk dapat melaksanakan Penelitian Proyek Akhir mulai bulan {{ $start->translatedFormat('F Y') }}. Topik "{{ $topik }}". Apabila berkenan untuk konfirmasi lebih lanjut dapat menghubungi Sekretariat Departemen Teknik Elektro dan Informatika SV-UGM dengan nomor telefon 0274 561111 dan email tedi.sv@ugm.ac.id.</p>
  <p>Demikian permohonan ini, atas perhatian dan kerja samanya kami ucapkan terima kasih.</p>
  </div>

  <x-surat::ttd :atasNama=true :tanggal=false />
</x-surat::document>