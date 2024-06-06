<x-surat::document>
  <div class="body-header">
    <h1 class="title">SURAT REKOMENDASI BEASISWA</h1>
    <x-surat::nomor />
  </div>
  <div class="body-main">
    <p>Ketua Departemen Teknik Elektro dan Informatika Sekolah Vokasi dengan ini menyetujui saudara:</p>
    <x-surat::info-list style="margin-left: 24px">
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
    <p class="justify">Untuk diusulkan sebagai calon penerima Beasiswa {{ $beasiswa }}.</p>
    <p class="justify">Menurut pengamatan kami yang bersangkutan berkelakuan baik dan pantas diberikan beasiswa.</p>
    </div>
  <x-surat::ttd />
</x-surat::document>
