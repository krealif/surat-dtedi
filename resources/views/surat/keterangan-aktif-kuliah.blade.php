<x-surat::document>
  <div class="body-header">
    <h1 class="title">SURAT KETERANGAN AKTIF KULIAH</h1>
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
        {{ $prodi }}
      </x-surat::info-item>
    </x-surat::info-list>

    <p>Anak dari:</p>
    @foreach (array_values($orangTua) as $data)
      <x-surat::info-list>
        <x-surat::info-item label="Nama">
          {{ $data['nama_ortu'] }}
        </x-surat::info-item>
        <x-surat::info-item label="Pekerjaan">
          {{ $data['pekerjaan'] }}
        </x-surat::info-item>
        <x-surat::info-item label="NIP">
          {{ $data['nip'] }}
        </x-surat::info-item>
        <x-surat::info-item label="Pangkat/Gol">
          {{ $data['pangkat'] }}
        </x-surat::info-item>
        <x-surat::info-item label="Instansi">
          {{ $data['instansi'] }}
        </x-surat::info-item>
      </x-surat::info-list>
    @endforeach
    
    <p class="justify">adalah benar-benar mahasiswa Sekolah Vokasi Universitas Gadjah Mada yang terdaftar aktif kuliah pada Semester {{ $semester}} Tahun Akademik {{ $awal_akademik }}/{{ $akhir_akademik }}</p>
    <p class="justify">Adapun surat keterangan ini kami buat keperluan {{ $keterangan }}</p>
    <p class="justify">Demikian untuk dapat dipergunakan sebagaimana mestinya.</p>
  </div>
  <x-surat::ttd />
</x-surat::document>