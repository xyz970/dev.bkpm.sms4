<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <title>Formulir</title>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('proses_upload') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group pb2"><label for="" class="control-label">file</label>
                        <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}"
                            name="file" placeholder="file" value="{{ old('file') }}">
                        @if ($errors->has('file'))
                            <span class="text-danger small">
                                <p>{{ $errors->first('file') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group pb-2"><label for="" class="control-label">Keterangan</label>
                        <textarea type="text" class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}"
                            name="keterangan" placeholder="keterangan" value="{{ old('keterangan') }}"></textarea>
                        @if ($errors->has('keterangan'))
                            <span class="text-danger small">
                                <p>{{ $errors->first('keterangan') }}</p>
                            </span>
                        @endif
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Usahakan memakai button type submit untuk mengirim data  --}}

</body>
<script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</html>
