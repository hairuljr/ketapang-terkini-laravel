      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Judul Info" value="{{ old('judul') }}">
      </div>
      <div class="form-group">
        <label for="links">Link Embed Google Maps</label>
        <p><i><b>*</b>Link didapat dengan fitur sematkan Peta dari Google Maps<br> Silahkan cari tutornya di Google yaa kalau belum tau.</i></p>
        <a class="btn btn-sm btn-outline-success mb-2 pull-right" href="http://shorturl.at/yFHO1" target="_blank" rel="noopener noreferrer">Ke Gmaps</a>
        <input type="text" class="form-control" name="links" placeholder="Sematkan peta dalam ukuran Kecil" value="{{ old('links') }}">
      </div>
      <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" class="form-control" max="5" min="1" name="rating" placeholder="Rating" value="{{ old('rating') }}">
      </div>
      <div class="form-group">
        <label for="jml_rating">Jumlah Rating</label>
        <input type="number" class="form-control" name="jml_rating" placeholder="Jumlah Rating" value="{{ old('jml_rating') }}">
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea id="konten" class="form-control" name="keterangan" rows="10" cols="50">{{ old('keterangan') }}</textarea>
      </div>
      <div class="input-images-cover mb-4">
        <div class="input-field">
            <label class="active">Gambar Cover</label>
            <div class="input-images-1" style="padding-top: .5rem;"></div>
        </div>
      </div>
      <div class="input-images mb-4">
        <div class="input-field">
            <label class="active">Gambar Info</label>
            <div class="input-images-1" style="padding-top: .5rem;"></div>
        </div>
      </div>
    <div class="row align-items-center justify-content-center mt-4">
      <div class="col-sm-3 my-2">
        <a href="{{ url('admin/'.$link) }}" class="btn btn-secondary">Kembali</a>
      </div>
      <div class="col-sm-3 d-block">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>