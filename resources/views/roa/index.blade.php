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
                <th>File</th>
            </tr>
            </thead>
            <tbody>
                @foreach($cert as $row)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td align="center">{{ $row->no_surat }}</td>
                        <td align="center">{{ $row->created_at }}</td>
                        <td>{{$row->perihal}}</td>
                        <td>
                            Penandatangan : {{$row->penandatangan." / ".$row->jabatan}} <br>
                            Mengetahui : {{$row->mengetahui." / ".$row->jabatan_mengetahui}}
                        </td>
                        <td align="center">
                            <a trpe="button" class="btn btn-sm btn-alt-success" href="{{route('file.download', $row->qrcode)}}"> <i class="fa fa-download"></i> File</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
