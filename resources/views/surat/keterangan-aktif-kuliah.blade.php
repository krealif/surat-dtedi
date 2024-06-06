<x-surat::document>
  <div class="body-header">
    <h1 class="title">SURAT KETERANGAN AKTIF KULIAH</h1>
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
        {{ $prodi }}
      </x-surat::info-item>
    </x-surat::info-list>

    <p>Anak dari:</p>
    <x-surat::info-list tab=2 style="margin-left: 24px">
      <x-surat::info-item label="Nama">
        {{ $nama_ortu }}
      </x-surat::info-item>
      <x-surat::info-item label="Pekerjaan">
        {{ $pekerjaan }}
      </x-surat::info-item>
      <x-surat::info-item label="NIP">
        {{ $nip }}
      </x-surat::info-item>
      <x-surat::info-item label="Pangkat/Gol">
        {{ $pangkat }}
      </x-surat::info-item>
      <x-surat::info-item label="Instansi">
        {{ $instansi }}
      </x-surat::info-item>
    </x-surat::info-list>

    <p class="justify">Adalah benar-benar mahasiswa Sekolah Vokasi Universitas Gadjah Mada yang terdaftar aktif kuliah pada Semester {{ $semester}} Tahun Akademik {{ $thn_akademik }}.</p>
    <p class="justify">Adapun surat keterangan ini kami buat sebagai persyaratan {{ $keterangan }}.</p>
    <p class="justify">Demikian untuk dapat dipergunakan sebagaimana mestinya.</p>
  </div>
  <x-surat::ttd :atasNama=true />
</x-surat::document>