<x-surat::document>
  <div class="body-header">
    <h1 class="title">SURAT REKOMENDASI BEASISWA</h1>
    <span class="nomor-surat">NO. 1111/UN1/SV.2-TEDI/PREVIEW/2024</span>
  </div>
  <div class="body-main">
    <p>Ketua Departemen Teknik Elektro dan Informatika Sekolah Vokasi dengan ini menyetujui saudara:</p>
    <div style="margin-left: 32px">
      <x-surat::info-list>
          <x-surat::info-item label="Nama">
            {{ $nama }}
          </x-surat::info-item>
          <x-surat::info-item label="NIM">
            {{ $nim }}
          </x-surat::info-item>
          <x-surat::info-item label="IPK">
            {{ $ipk }}
          </x-surat::info-item>
          <x-surat::info-item label="SKS">
            {{ $sks }}
          </x-surat::info-item>
          <x-surat::info-item label="Alamat">
            {{ $alamat }}
          </x-surat::info-item>
      </x-surat::info-list>
    </div>
    <p class="justify">Untuk diusulkan sebagai calon penerima Beasiswa {{ $beasiswa }}. Menurut pengamatan kami yang bersangkutan berkelakuan baik dan pantas diberikan beasiswa.</p>
    </div>
  <x-surat::ttd />
</x-surat::document>
