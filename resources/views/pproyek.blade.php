@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <h4 class="mb-4">Progress Proyek</h4>
  </div>
</section>

<section class="content">
  <div class="container-fluid">

    {{-- Pesan sukses --}}
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Tambah Proyek --}}
    <div class="card mb-4">
      <div class="card-header bg-success text-white">Tambah Progress Proyek</div>
      <div class="card-body">
        <form action="{{ route('progres.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Nama Proyek</label>
            <input type="text" name="nama_proyek" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Persentase</label>
            <select name="persentase" class="form-control" required>
              <option value="">-- Pilih Persentase --</option>
              @foreach(range(5, 100, 5) as $percent)
                <option value="{{ $percent }}">{{ $percent }}%</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Foto Proyek</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
          </div>
          <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control">
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>

    {{-- Tabel Data --}}
    <div class="card">
      <div class="card-header bg-primary text-white">Daftar Progress Proyek</div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Proyek</th>
              <th>Deskripsi</th>
              <th>Persentase</th>
              <th>Foto</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($progres as $p)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_proyek }}</td>
                <td>{{ $p->deskripsi }}</td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $p->persentase }}%">
                      {{ $p->persentase }}%
                    </div>
                  </div>
                </td>
                <td>
                  @if($p->foto)
                    <img src="{{ asset('uploads/foto_proyek/' . $p->foto) }}" width="100">
                  @else
                    <span class="text-muted">Belum ada foto</span>
                  @endif
                </td>
                <td>{{ $p->tanggal_mulai }}</td>
                <td>{{ $p->tanggal_selesai ?? '-' }}</td>
                <td>
                  <form action="{{ route('progres.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center">Belum ada data proyek</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>
@endsection
