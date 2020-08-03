<div class="form-group">
  <label for="judul">Judul</label>
  <input type="text" class="form-control" name="judul" value="{{ old('judul') ?? $item->judul }}">
</div>
<div class="form-group">
  <label for="links">Link Embed Google Maps</label>
  <p><i><b>*</b>Link didapat dengan fitur sematkan Peta dari Google Maps<br> Silahkan cari tutornya di Google yaa kalau belum tau.</i></p>
  <a class="btn btn-sm btn-outline-success mb-2 pull-right" href="http://shorturl.at/yFHO1" target="_blank" rel="noopener noreferrer">Ke Gmaps</a>
  <input type="text" class="form-control" name="links" placeholder="Sematkan peta dalam ukuran Kecil" value="{{ old('links') ?? $item->links }}">
  <div class="mt-2">
    {!! $item->links !!}
  </div>
</div>
<div class="form-group">
  <label for="rating">Rating</label>
  <input type="number" class="form-control" max="5" min="1" name="rating" value="{{ old('rating') ?? $item->rating }}">
</div>
<div class="form-group">
  <label for="jml_rating">Jumlah Rating</label>
  <input type="number" class="form-control" name="jml_rating" value="{{ old('jml_rating') ?? $item->jml_rating }}">
</div>
<div class="form-group">
  <label for="keterangan">Keterangan</label>
  <textarea id="konten" class="form-control" name="keterangan" rows="10" cols="50">{{ old('keterangan') ?? $item->keterangan }}</textarea>
</div>
<div class="form-group row">
  <div class="col-sm-3">Cover</div>
  <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-4 mb-4">
          <img src="{{ Storage::url($item->cover) }}" class="img-thumbnail">
        </div>
          <div class="col-sm-8">
            <div class="input-images-all mb-4">
              <div class="input-field">
                  <div class="input-images-1" style="padding-top: .2rem;"></div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
<div class="form-group row">
  <div class="col-sm-3">Gambar Info</div>
      <div class="col-sm-12">
        <div class="input-images mb-4">
          <div class="input-field">
              <div class="input-images-1" style="padding-top: .5rem;"></div>
          </div>
        </div>
      </div>
</div>
</div>
<div class="card-body col-md-3">
<table class="table table-responsive table-hover">
  <thead class="thead-light">
    <tr>
      <th>No</th>
      <th>Gambar Info</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($foto_image as $item)
      @php
        $imagesImploded = $item->nama_foto;
        $imagesExploded = explode('|', $imagesImploded);
      @endphp
      @php
         $i = 1;
      @endphp 
      @foreach(array_slice($imagesExploded, 0,4) as $image)
      <tr>
        <td>{{ $i++ }}</td>
        <td><img src="{{ Storage::url(trim($image)) }}" class="img-thumbnail" width="150px;"></td>
      </tr>
      @endforeach
    @endforeach
  </tbody>
</table>
</div>
<div class="card-body col-md-3">
<table class="table table-responsive table-hover">
  <thead class="thead-light">
    <tr>
      <th>No</th>
      <th>Gambar Info</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($foto_image as $item)
      @php
        $imagesImploded = $item->nama_foto;
        $imagesExploded = explode('|', $imagesImploded);
      @endphp
      @php
         $i = 5;
      @endphp 
      @foreach(array_slice($imagesExploded, 4,10) as $image)
      <tr>
        <td>{{ $i++ }}</td>
        <td><img src="{{ Storage::url(trim($image)) }}" class="img-thumbnail" width="150px;"></td>
      </tr>
      @endforeach
    @endforeach
  </tbody>
</table>
</div>
</div>
<div class="row align-items-center justify-content-center">
<div class="col-sm-3 my-2">
<a href="{{ url('admin/'.$link) }}" class="btn btn-secondary mx-4">Kembali</a>
<button type="submit" class="btn btn-primary">Edit</button>
</div>
</div>