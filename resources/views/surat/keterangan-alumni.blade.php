
<x-surat::document>
  <div class="body-header">
    <h1 class="title">SURAT KETERANGAN ALUMNI</h1>
    <span class="nomor-surat">NO. 1111/UN1/SV.2-TEDI/PREVIEW/2024</span>
  </div>
  <div class="body-main">
    <p>Yang bertanda tangan dibawah ini:</p>
    <x-surat::info-list>
      <x-surat::info-item label="Nama">
        {{ config('constant.kadep.name') }}
      </x-surat::info-item>
      <x-surat::info-item label="Jabatan">
        Ketua Departemen Teknik Elektro dan Informatika, Sekolah Vokasi UGM
      </x-surat::info-item>
    </x-surat::info-list>

    <p>Menerangkan bahwa :</p>

    <x-surat::info-list>
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
    
    <p class="justify">Adalah benar-benar alumni Sekolah Vokasi Universitas Gadjah Mada tahun {{ $tahun_lulus }} dari Program Studi {{ $prodi }}</p>
    <p class="justify">Demikian surat keterangan ini dibuat untuk {{ $keterangan }}</p>
  </div>
  <x-surat::ttd />
</x-surat::document>