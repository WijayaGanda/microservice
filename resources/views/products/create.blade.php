<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-body-secondary">

    <div class="card position-absolute top-50 start-50 translate-middle rounded-4 shadow-lg p-4 mb-5 bg-body-tertiary rounded" style="width: 30rem;">
        <i class="fa-solid fa-box-open fa-3x" style="color: #249763; text-align: center;"></i>
        <div class="card-body">
            <h2 class="text-center mb-4">New Product</h2>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="nama" name="name" placeholder="Input Product Name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="phone" name="price" placeholder="Input Product Price" min=1>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Input Product Price" min=1>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end"><button type="submit"
                        class="btn btn-success text-end">Submit</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>
