
<x-surat::document>
  <div class="body-header">
    <h1 class="title">SURAT KETERANGAN ALUMNI</h1>
    <x-surat::nomor />
  </div>
  <div class="body-main">
    <p>Yang bertanda tangan dibawah ini:</p>
    <x-surat::info-list tab=2 style="margin-left: 24px">
      <x-surat::info-item label="Nama">
        {{ config('constant.kadep.name') }}
      </x-surat::info-item>
      <x-surat::info-item label="Jabatan">
        Ketua Departemen Teknik Elektro dan Informatika
        <br>
        Sekolah Vokasi UGM
      </x-surat::info-item>
    </x-surat::info-list>

    <p>Menerangkan bahwa:</p>

    <x-surat::info-list tab=2 style="margin-left: 24px">
      <x-surat::info-item label="Nama">
        {{ $nama }}
      </x-surat::info-item>
      <x-surat::info-item label="NIM">
        {{ $nim }}
      </x-surat::info-item>
      <x-surat::info-item label="Program Studi">
        {{ $prodi }} <br> Sekolah Vokasi Universitas Gadjah Mada
      </x-surat::info-item>
    </x-surat::info-list>
    
    <p class="justify">Adalah benar-benar alumni Sekolah Vokasi Universitas Gadjah Mada tahun {{ $thn_lulus }} dari Program Studi {{ $prodi }}</p>
    <p class="justify">Demikian surat keterangan ini dibuat {{ $keterangan }}.</p>
  </div>
  <x-surat::ttd :atasNama=true />
</x-surat::document>