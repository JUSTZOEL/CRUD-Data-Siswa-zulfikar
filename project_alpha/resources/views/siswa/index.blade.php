@extends('layout.template')
   <!-- START DATA -->
@section('crud')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{url ('siswa') }}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
      <a href='{{url('siswa/create')}}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-1">NIS</th>
                <th class="col-md-1">NAMA</th>
                <th class="col-md-1">TEMPAT LAHIR</th>
                <th class="col-md-2">TANGGAL LAHIR</th>
                <th class="col-md-1">NOMOR HANDPHONE</th>
                <th class="col-md-1">JENIS KELAMIN</th>
                <th class="col-md-2">ALAMAT</th>
                <th class="col-md-3"></th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1?>
            @foreach ($data as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->nis}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->tmpt_lahir}}</td>
                <td>{{$item->tgl_lhr}}</td>
                <td>{{$item->no_hp}}</td>
                <td>{{$item->jns_klmn}}</td>
                <td>{{$item->alamat}}</td>
                <td>
                    <a href='{{url('siswa/'.$item->nis.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{url('siswa/' .$item->nis)}}" method="post"> 
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">DELETE</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
       
        </tbody>
    </table>
   
</div>
<!-- AKHIR DATA -->
    
@endsection
        
