<x-layout>
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">
@if (Auth::check())
    <h1>Selamat Datang {{ Auth::user()->username }}</h1>
@endif
        </div>
      </section>
</x-layout>