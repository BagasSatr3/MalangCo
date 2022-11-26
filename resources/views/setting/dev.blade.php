@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <!-- table slideshow -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add Information Website</h4>
          <div class="card-tools">
            <a href="{{ route('setting.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Gambar</th>
                  <th>Nama</th>
                  <th>Job</th>
                  <th>Deskripsi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($itemdev as $slide)
                <tr>
                  <td>
                  {{ ++$no }}
                  </td>
                  <td>
                    @if($slide->foto != null)
                    <img src="{{ \Storage::url($slide->foto) }}" alt="{{ $slide->caption_title }}" width='150px' class="img-thumbnail">
                    @endif
                  </td>
                  <td>
                  {{ $slide->name_dev }}
                  </td>
                  <td>
                  {{ $slide->job_dev }}
                  </td>
                  <td>
                  {{ $slide->desc }}
                  </td>
                  <td>
                    <form action="{{ route('add-dev.destroy', $slide->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Hapus
                      </button>                    
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $itemdev->links() }}
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <form action="{{ url('/admin/add-dev') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="foto">Foto</label>
                  <br />
                  <input type="file" name="image" id="image">
                </div>
                <div class="form-group">
                  <label for="name_dev">Nama</label>
                  <input type="text" name="name_dev" class="form-control">
                </div>
                <div class="form-group">
                  <label for="job_dev">Job</label>
                  <input type="text" name="job_dev" class="form-control">
                </div>
                <div class="form-group">
                  <label for="desc">Deskripsi</label>
                  <textarea name="desc" id="desc" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary">Upload</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection