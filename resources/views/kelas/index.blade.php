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
                        <h5 class="card-title">Data Kelas</h5>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <!-- Tombol Tambah Data -->
                        <a href="{{route('kelas.tambah')}}" class="btn btn-success" title="Tambah Data Hasil Karya">
                            <i class="bi bi-plus-circle me-2"></i> Tambah Data
                        </a>
                    </div>
                </div>
      
                
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Kelas</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($kelas as $key=> $row)
                    <tr>
                        <td scope="row">{{ $key + 1 }}</td>
                        <td>{{ $row->nama_kelas }}</td>
                        <td>
                            <a href="{{ route('kelas.edit', $row->id) }}" class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('kelas.hapus', $row->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                            
                        </tr>
                        @endforeach
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
</x-layout>