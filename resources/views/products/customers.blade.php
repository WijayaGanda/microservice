<!DOCTYPE html>
<html>

<head>
    <title>Data Produk</title>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg mb-3" style="background-color: #338a69;">
        <div class="container-fluid">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-0 text-white" style="margin-right: 20px; font-weight:bold">Daftar Produk</h5>
                <a class="nav-link text-white me-3" href="http://localhost:8000/customers/">Home</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="http://localhost:8001/products/">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="http://localhost:8002/orders/">List of Order</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('products.create') }}" class="btn btn-sm"
                        style="background-color: #4040407f; color:#ffffff">Create New Product</a>
                </div>
            </div>
        </div>
    </nav>
    <h2>Pelanggan yang membeli Produk: {{ $product->name }}</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Phone</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $index => $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer['nama'] }}</td>
                    <td>{{ $customer['phone'] }}</td>
                    <td>{{ $customer['address'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
