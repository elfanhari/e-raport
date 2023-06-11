<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label for="abc" class="col-sm-4 col-form-label">Nama</label>
      <div class="col-sm-8">
        <input type="text" value="{{ old('name', $walisiswa->name) }}" class="form-control @error('name') is-invalid @enderror " name="name" id="name" placeholder="Masukkan nama lengkap">
        @error('name')
        <span class="invalid-feedback mt-1">
          {{ $message }}
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="abc" class="col-sm-4 col-form-label">Jenis Kelamin</label>
      <div class="col-sm-8">
        <select class="form-select @error('jk') is-invalid @enderror" name="jk" id="">
          <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
          <option value="L" {{ 'L' == old('jk', $walisiswa->jk) ? 'selected' : '' }}>Laki-laki</option>
          <option value="P" {{ 'P' == old('jk', $walisiswa->jk) ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jk')
        <span class="invalid-feedback mt-1">
          {{ $message }}
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="abc" class="col-sm-4 col-form-label">Wali Siswa Dari</label>
      <div class="col-sm-8">
        <select class="form-select @error('siswa_id') is-invalid @enderror" name="siswa_id" id="exampleSelectBorder">
          <option value="" disabled selected>-- Pilih Siswa --</option>
          @foreach ($siswa as $item)
            <option value="{{ $item->id }}" {{ $item->id == old('siswa_id', $walisiswa->siswa_id) ? 'selected' : ''}}>{{ $item->name }} - {{ $item->kelas->name }}</option>
          @endforeach
        </select>
        @error('siswa_id')
        <span class="invalid-feedback mt-1">
          {{ $message }}
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="inputName" class="col-sm-4 col-form-label">Sebagai</label>
      <div class="col-sm-8">
          <select class="form-select @error('sebagai') is-invalid @enderror" name="sebagai" id="exampleSelectBorder">
            <option value="" disabled selected>-- Pilih Peran --</option>
            <option value="1" {{ 1 == old('sebagai', $walisiswa->sebagai) ? 'selected' : '' }}>Ayah</option>
            <option value="2" {{ 2 == old('sebagai', $walisiswa->sebagai) ? 'selected' : '' }}>Ibu</option>
            <option value="3" {{ 3 == old('sebagai', $walisiswa->sebagai) ? 'selected' : '' }}>Wali</option>
          </select>
          @error('sebagai')
          <span class="invalid-feedback mt-1">{{ $message }}</span>
          @enderror
      </div>
    </div>
    <div class="offset-sm-4 col-sm-8 mt-4">
      <div class="checkbox">
        <label>
          <input type="checkbox" required> Saya yakin akan mengubah data tersebut
        </label>
      </div>
    </div>
    <div class="offset-sm-4 col-sm-8 mt-2">
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</div>
