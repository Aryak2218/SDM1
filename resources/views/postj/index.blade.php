<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pt Yamaha Indonesia - Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('style/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('style/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: lightgray;
        }
    </style>
</head>
<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pt Yamaha Indonesia</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>Karyawan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>Pendidikan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>Tunjangan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>Gaji</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>Pengajuan izin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>Izin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>Absensi</span>
                </a>
            </li>
        </ul>

        <!-- Content -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center my-4">Gaji</h3>
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <a href="{{ route('postj.create') }}" class="btn btn-md btn-success mb-3">Tambah Data</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">gaji_pokok</th>
                                        <th scope="col">tunjangan_kesehatan</th>
                                        <th scope="col">tunjangan_transportasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($postj as $postu)
                                        <tr>
                                            <td>{{ $postu->gaji_pokok }}</td>
                                            <td>{!! $postu->tunjangan_kesehatan !!}</td>
                                            <td>{!! $postu->tunjangan_transportasi !!}</td>

                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('postj.destroy', $postu->id) }}" method="POST">
                                                    <a href="{{ route('postj.edit', $postu->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Data belum Tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $postj->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

</body>
</html>
