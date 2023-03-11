@extends('layout.index')
@section('container')
<h3>Tambah Data</h3>
<br>
<form action="/update" method="post">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="col-12 mb-3">
        <label style="font-size: 17px;" for="name" class="form-label">name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" id="name" style="border-color: #ced4da;" placeholder="name">
        @error('name')
        <div style="font-size: 16px; color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-12 mb-3">
        <label style="font-size: 17px;" for="description" class="form-label">Keterangan</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="description" value="{{ $data->description }}" id="description" style="border-color: #ced4da;" placeholder="description">
        @error('description')
        <div style="font-size: 16px; color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="row col-12 mb-3">
        <div class="col">
            <label style="font-size: 17px;" for="location" class="form-label">Lokasi</label>
            <div class="form-group">
                <select class="form-control @error('location') is-invalid @enderror location" name="location" data-placeholder="Pilih..">
                    @if(old('location') == 'Tanjung' || $data->location == 'Tanjung')
                    <option value="Tanjung" selected>Tanjung</option>
                    <option value="Angsana">Angsana</option>
                    @else
                    <option value="Angsana" selected>Angsana</option>
                    <option value="Tanjung">Tanjung</option>
                    @endif
                </select>
            </div>
            @error('location')
            <div style="font-size: 16px; color:red;">
                {{ $message }}
            </div>
            @enderror

        </div>
        <div class="col">
            <label style="font-size: 17px;" for="unit" class="form-label">Unit</label>
            <div class="form-group">
                <select class="form-control @error('unit') is-invalid @enderror unit" name="unit" data-placeholder="Pilih..">
                    @if(old('location') == 'SKT' || $data->location == 'SKT')
                    <option value="SKT">SKT</option>
                    <option value="Zoomlion">Zoomlion</option>
                    @else
                    <option value="Zoomlion">Zoomlion</option>
                    <option value="SKT">SKT</option>
                    @endif
                </select>
            </div>
            @error('unit')
            <div style="font-size: 16px; color:red;">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="rcol-12 mb-3 ml-3">
        <button type="submit" class="btn btn-success border-0" style="padding: 9px 22px 8px 22px;">
            <div class="col" style="padding: 0px 3px">
                <div>Simpan</div>
            </div>
        </button>
    </div>
</form>

@endsection