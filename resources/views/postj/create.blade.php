<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: lightgray;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('postj.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold" for="gaji_pokok">Gaji Pokok</label>
                                <input type="text" id="gaji_pokok" class="form-control @error('gaji_pokok') is-invalid @enderror" name="gaji_pokok" value="{{ old('gaji_pokok') }}" placeholder="Masukkan gaji pokok">
                                @error('gaji_pokok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="tunjangan_kesehatan">Tunjangan Kesehatan</label>
                                <input type="text" id="tunjangan_kesehatan" class="form-control @error('tunjangan_kesehatan') is-invalid @enderror" name="tunjangan_kesehatan" value="{{ old('tunjangan_kesehatan') }}" placeholder="Masukkan tunjangan kesehatan">
                                @error('tunjangan_kesehatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="tunjangan_transportasi">Tunjangan Transportasi</label>
                                <input type="text" id="tunjangan_transportasi" class="form-control @error('tunjangan_transportasi') is-invalid @enderror" name="tunjangan_transportasi" value="{{ old('tunjangan_transportasi') }}" placeholder="Masukkan tunjangan transportasi">
                                @error('tunjangan_transportasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
