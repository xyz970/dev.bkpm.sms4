<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <title>Formulir</title>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('dropzone.store_pdf') }}" method="post" name="file" class="dropzone"
                    id="image-upload" files="true">
                    {{ csrf_field() }}
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Usahakan memakai button type submit untuk mengirim data  --}}

</body>
<script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
<script>
    Dropzone.options.ImageUpload = {

        maxFilesize: 10,

        //acceptedFiles: ".jpeg,.jpg,.png,.gif",

acceptedFiles: "application/pdf",
acceptedMimeTypes: "application/pdf",
        addRemoveLinks: true,
        createImageThumbnails: true,

        autoProcessQueue: false,

        init: function() {

            var myDropzone = this;

            // AKSI KETIKA BUTTON UPLOAD DI KLIK 
            $("#button").click(function(e) {
                e.preventDefault();

                myDropzone.processQueue();
            });
            this.on('sending', function(file, xhr, formDato) {

                // Tambahkan semua input form ke formData Dropzone yang akan POST

                var data = $('#image-upload').serializeArray();

                $.each(data, function(key, el) {

                    formData.append(el.name, el.value);
                })
            });
        }
    }
</script>

</html>
