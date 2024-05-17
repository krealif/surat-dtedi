<x-surat::document>
    <div class="body-header">
        <h1 class="title">SURAT REKOMENDASI BEASISWA</h1>
        <span class="nomor-surat">NO. 1111/UN1/SV.2-TEDI/PREVIEW/2024</span>
    </div>
    <div class="body-main">
        <p>Ketua Departemen Teknik Elektro dan Informatika Sekolah Vokasi dengan ini menyetujui saudara:</p>
        {{-- <x-surat::info-list>
            <x-surat::info-item label="Nama">
                {{ config('constant.kadep.name') }}
            </x-surat::info-item>
            <x-surat::info-item label="NIKA">
                {{ config('constant.kadep.nika') }}
            </x-surat::info-item>
            <x-surat::info-item label="Jabatan">
                Ketua Departemen Teknik Elektro dan Informatika, Sekolah Vokasi UGM
            </x-surat::info-item>
        </x-surat::info-list> --}}
        <p>Nama     : {{ $nama }}</p>
        <p>NIM      : {{ $nim }}</p>
        <p>IPK      : {{ $ipk }}</p>
        <p>SKS      : {{ $sks }}</p>
        <p>Alamat      : {{ $alamat }}</p>
        <br>
        <p>Untuk diusulkan sebagai calon penerima Beasiswa {{ $beasiswa }}</p>
        <p class="justify">Menurut pengamatan kami yang bersangkutan berkelakuan baik dan pantas        
            diberikan beasiswa.</p>
    </div>
    <x-surat::ttd />
</x-surat::document>
