<x-layout>
    <div class="pagetitle">
        <h1>Kelas</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Kelas</li>
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
                        <a href="{{ route('kelas.index') }}" class="btn btn-secondary" title="Tambah Data Hasil Karya">
                          <i class="bi bi-arrow-left-circle me-2"></i>Kembali
                        </a>
                    </div>
                </div>
      
                
              <!-- General Form Elements -->
              <form action="{{ route('kelas.simpan') }}" method="POST" >
                @csrf
                <div class="row mb-3">
                  <label for="nama_kelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_kelas" class="form-control" placeholder="Masukkan nama kelas" required>
                    @if ($errors->has('nama_kelas'))
                    <div class="text-danger">
                      <p>Nama Kelas sudah ada</p>
                    </div>
                    @endif
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