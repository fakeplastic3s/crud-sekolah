<x-layout>
    <div class="pagetitle">
        <h1>Guru</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Guru</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <div class="row d-flex flex-row align-items-center justify-content-between">
                    <div class="col">
                        <h5 class="card-title">Form Tambah Data</h5>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <!-- Tombol Tambah Data -->
                        <a href="{{ route('guru.index') }}" class="btn btn-secondary" title="Tambah Data Hasil Karya">
                          <i class="bi bi-arrow-left-circle me-2"></i>Kembali
                        </a>
                    </div>
                </div>
      
                
              <!-- General Form Elements -->
              <form action="{{ route('guru.simpan') }}" method="POST" >
                @csrf
                <div class="row mb-3">
                  <label for="namakelas" class="col-sm-2 col-form-label">Nama guru</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama guru" required>
                    @if ($errors->has('nama'))
                    <div class="text-danger">
                      <p>Nama Guru sudah ada</p>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                  <div class="col-sm-10">
                    <input type="number" name="nip" class="form-control" placeholder="Masukkan NIP" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <select name="kelas_id" class="form-select" required>
                      <option value="">Pilih Kelas</option>
                      @foreach ($kelas as $row)
                      <option value="{{ $row->id }}">{{ $row->nama_kelas }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                  
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

              </form><!-- End General Form Elements -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
</x-layout>