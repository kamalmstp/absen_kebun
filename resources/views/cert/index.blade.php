@extends('layouts.backend')

@section('css_before')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
  <!-- jQuery (required for DataTables plugin) -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

  <!-- Page JS Plugins -->
  <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

  <!-- Page JS Code -->
  <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
        <h3 class="block-title">QR Code Cert</h3>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add"><i class="fa fa-plus"></i> Add</button>
        </div>
        <div class="block-content block-content-full" style="overflow-x:auto;">
        <table id="sekolah" class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr align="center">
                <th class="text-center" style="width: 80px;">#</th>
                <th>No Surat</th>
                <th>Tanggal TTD</th>
                <th>Perihal</th>
                <th>Penandatangan</th>
                <th>Mengetahui</th>
                <th>QR Code</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach($cert as $row)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td align="center">{{ $row->no_surat }}</td>
                        <td align="center">{{ $row->created_at }}</td>
                        <td>{{$row->perihal}}</td>
                        <td>{{$row->penandatangan." / ".$row->jabatan}}</td>
                        <td>{{$row->mengetahui." / ".$row->jabatan_mengetahui}}</td>
                        <td align="center">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#view{{$row->id}}"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                        </td>
                        <td align="center">
                            @if(empty($row->file))
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#upload{{$row->id}}"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
                            @else
                            <i><strong>Uploaded</strong></i><br>
                            <a href="javascript:;" onclick="confirmRemove('administration/cert/remove', '{{ $row->id }}')"><i class='fa fa-trash'><u>Remove</u></i></a>
                            @endif
                        </td>
                        <td align="center">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$row->id}}"><i class="fa fa-pencil-alt"></i></button>
                            @if(empty($row->file))
                            <button type='button' class='btn btn-danger btn-sm'
                            onclick="confirmDelete('administration/cert', '{{ $row->id }}')">
                                <i class='fa fa-fw fa-trash'></i>
                            </button>
                            @else
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-md" role="document">
      <div class="modal-content">
        <form action="{{route('cert.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="block block-rounded block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Add New QR Code</h3>
                <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="mb-4">
                            <label class="form-label" for="no_surat">Nomor Surat/Cert</label>
                            <input type="hidden" id="kode" name="kode" class="form-control" placeholder="Kode" value="{{ Str::random(10) }}">
                            <input type="text" id="no_surat" name="no_surat" class="form-control" placeholder="Nomor Surat" required="required">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="perihal">Perihal</label>
                            <textarea name="perihal" class="form-control" id="perihal" cols="10" rows="3"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="penandatangan">Penandatangan</label>
                            <input type="text" id="penandatangan" name="penandatangan" class="form-control" placeholder="Penandatangan" value="Wiyana" required="required">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="jabatan">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan" class="form-control" placeholder="Jabatan" value="KUP Sungai Putting" required="required">
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="mengetahui">Mengetahui</label>
                            <input type="text" id="mengetahui" name="mengetahui" class="form-control" placeholder="Mengetahui" value="Wiyana">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="jabatan_mengetahui">Jabatan</label>
                            <input type="text" id="jabatan_mengetahui" name="jabatan_mengetahui" class="form-control" placeholder="Jabatan" value="KUP Sungai Putting">
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full text-end bg-body">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Save</button>
            </div>
            </div>
        </form>
      </div>
    </div>
</div>

@foreach($cert as $rom)
<div class="modal fade" id="view{{$rom->id}}" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-md" role="document">
      <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">QR Code</h3>
                <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="text-center">
                        <img src="{{asset('images/qr/'.$rom->qrcode)}}" width="50%" alt=""> <br> <br>
                        <a trpe="button" class="btn btn-sm btn-alt-success" href="{{route('qr.download', $rom->qrcode)}}"> <i class="fa fa-download"></i> Download</a> 
                        <br>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full text-end bg-body">
                <button type="button" class="btn btn-sm btn-alt-primary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
      </div>
    </div>
</div>

<div class="modal fade" id="upload{{$rom->id}}" tabindex="-1" role="dialog" aria-labelledby="upload" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-md" role="document">
      <div class="modal-content">
        <form action="{{route('cert.upload')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="block block-rounded block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">QR Code</h3>
                <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="mb-4">
                            <label class="form-label" for="file">Upload Berkas Valid + QR Code</label>
                            <input type="text" name="id" class="form-control" placeholder="Kode" value="{{ $rom->id }}">
                            <input type="text" name="kode" class="form-control" placeholder="Kode" value="{{ $rom->kode }}">
                            <input type="file" id="file" name="file" class="form-control" required="required">
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full text-end bg-body">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Upload</button>
            </div>
            </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="edit{{$rom->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-md" role="document">
      <div class="modal-content">
        <form action="{{route('cert.update', $rom->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="block block-rounded block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Edit Data</h3>
                <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="mb-4">
                            <label class="form-label" for="no_surat">Nomor Surat/Cert</label>
                            <input type="hidden" id="kode" name="kode" class="form-control" placeholder="Kode" value="{{ $rom->kode }}">
                            <input type="text" id="no_surat" name="no_surat" value="{{ $rom->no_surat }}" class="form-control" placeholder="Nomor Surat" required="required">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="perihal">Perihal</label>
                            <textarea name="perihal" class="form-control" id="perihal" cols="10" rows="3">{{$rom->perihal}}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="penandatangan">Penandatangan</label>
                            <input type="text" id="penandatangan" name="penandatangan" value="{{ $rom->penandatangan }}" class="form-control" placeholder="Penandatangan" value="Dewi Windasari" required="required">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="jabatan">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan" value="{{ $rom->jabatan }}" class="form-control" placeholder="Jabatan" value="Pj. Kabid Laboratorium" required="required">
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="mengetahui">Mengetahui</label>
                            <input type="text" id="mengetahui" name="mengetahui" value="{{ $rom->mengetahui }}" class="form-control" placeholder="Mengetahui" value="Wiyana">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="jabatan_mengetahui">Jabatan</label>
                            <input type="text" id="jabatan_mengetahui" name="jabatan_mengetahui" value="{{ $rom->jabatan_mengetahui }}" class="form-control" placeholder="Jabatan" value="KUP Sungai Putting">
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full text-end bg-body">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Update</button>
            </div>
            </div>
        </form>
      </div>
    </div>
</div>
@endforeach
@endsection