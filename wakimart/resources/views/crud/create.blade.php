@extends('layouts.app')

@section('pageTitle', 'Wakimart')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <a class="btn btn-primary mb-3" href="{{ url('crud_biasa/form_tambah') }}" role="button">Tambah Data</a>

                <table id="tbl_siswa" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Update at</th>
                                    <th style="width: 26%;">Action</th>
                                </tr>
                            </thead>
                            <tbody id='show-detail'>
                                <?php $no=0; foreach ($data_member as $key => $value):
                                $no++; ?>
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->created_at}}</td>
                                        <td>{{$value->updated_at}}</td>
                                        <td style="width: 15%"><span>
                                                <a class="btn btn-warning" href="{{url('crud_biasa/form_edit/'.$value->id) }}">Edit Biasa</a>
                                                <a onclick="return confirm('Yakin Hapus Data ini?')" class="btn btn-danger" href="{{url('crud_biasa/delete/'.$value->id) }}">Delete</a>
                                        </span></td>
                                    </tr>
                                <?php endforeach; ?>  
                            </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js_script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



@endpush