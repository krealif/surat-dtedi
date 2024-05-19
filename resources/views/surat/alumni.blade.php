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
        <p>Menerangkan bahwa:</p>
        <br>
        <p>Nama     : {{ $nama }}</p>
        <p>NIM      : {{ $nim }}</p>
        <p>Program Studi      : {{ $jurusan }}</p>
        <br>
        <p>Adalah benar-benar alumni Sekolah Vokasi Universitas Gadjah Mada tahun {{ $tahun }} dari Program Studi {{ $jurusan }}  </p>
        <p class="justify">Demikian surat keterangan ini dibuat untuk {{ $keterangan_surat }}</p>
    <x-surat::ttd />
</x-surat::document>
