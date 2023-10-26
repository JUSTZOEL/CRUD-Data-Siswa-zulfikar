@extends('layout.template')
       <!-- START FORM -->
@section('crud')
<form action='{{url('siswa')}}' method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='nis' value="{{Session::get('nis')}}" placeholder="Masukkan NIS Siswa" id="nis">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{Session::get('nama')}}" placeholder="Masukkan Nama Siswa" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tmpt_lahir" class="col-sm-2 col-form-label">TEMPAT LAHIR</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='tmpt_lahir' value="{{Session::get('tmpt_lahir')}}" placeholder="Masukkan Tempat Lahir"  id="tmpt_lahir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tgl_lhr" class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tgl_lhr' value="{{Session::get('tgl_lhr')}}" placeholder="Masukkan Tanggal Lahir"  id="tgl_lhr">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_hp" class="col-sm-2 col-form-label">NOMOR HANDPHONE</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='no_hp' value="{{Session::get('no_hp')}}" placeholder="Masukkan Nomor Handphone"  id="no_hp">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jns_klmn" class="col-sm-2 col-form-label">JENIS KELAMIN</label>
            <div class="col-sm-10">
                <select name="jns_klmn" id="" value="{{Session::get('alamat')}}">
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' value="{{Session::get('alamat')}}" placeholder="Masukkan Alamat Siswa"  id="alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-1"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            <div class="col-sm-5"><a href="{{url('siswa')}}" class="btn btn-secondary">Kembali</a></div>
        </div>
        
    </div>
</form>
    <!-- AKHIR FORM -->
    
@endsection
