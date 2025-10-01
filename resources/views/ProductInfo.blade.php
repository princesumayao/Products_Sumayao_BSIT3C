<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Information</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container my-5">
    <h1 class="text-center mb-4">Product Information</h1>

    <!-- Product Input Form -->
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <form method="POST" action="{{ Route('product.addList')}}" class="row g-3">
          @csrf
          <div class="col-md-6">
            <label class="form-label">Product ID</label>
            <input type="text" name="product_id" class="form-control" placeholder="Enter Product ID">
          </div>
          <div class="col-md-6">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
          </div>
          <div class="col-md-6">
            <label class="form-label">Product Category</label>
            <input type="text" name="product_category" class="form-control" placeholder="Enter Category">
          </div>
          <div class="col-md-3">
            <label class="form-label">Product Quantity</label>
            <input type="number" name="product_quantity" class="form-control" placeholder="Enter Quantity">
          </div>
          <div class="col-md-3">
            <label class="form-label">Product Price</label>
            <input type="number" name="product_price" step="0.01" name="product_price" class="form-control" placeholder="Enter Price">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary me-2">Add Product</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Table for Product List Information -->
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0">Product List</h5>
          <!-- Search Bar -->
          <form method="GET" action="{{ route('product.list') }}" class="d-flex" role="search">
            <input 
            class="form-control me-2" 
            id="searchBox" 
            name="search"
            type="text" 
            placeholder="Search product name..." 
            aria-label="Search" 
            value="{{ request('search') }}"
            oninput="this.form.submit()">
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>101</td>
                <td>Sample Product</td>
                <td>Category A</td>
                <td>10</td>
                <td>500.00</td>
                <td>
                  <button class="btn btn-sm btn-warning me-1">Edit</button>
                  <button class="btn btn-sm btn-danger">Delete</button>
                </td>
              </tr>
              <tr>
                <td>102</td>
                <td>Another Product</td>
                <td>Category B</td>
                <td>5</td>
                <td>250.00</td>
                <td>
                  <button class="btn btn-sm btn-warning me-1">Edit</button>
                  <button class="btn btn-sm btn-danger">Delete</button>
                </td>
              </tr>

              @foreach ($products as $index => $product)
                <tr>
                  <td>{{ $product['product_id'] }}</td>
                  <td>{{ $product['product_name'] }}</td>
                  <td>{{ $product['product_category'] }}</td>
                  <td>{{ $product['product_quantity'] }}</td>
                  <td>{{ $product['product_price'] }}</td>
                  <td>
                    <a href="{{ route('product.editList', $index) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                    <form action="{{ route('product.deleteList', $index) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const searchBox = document.getElementById("searchBox");
        searchBox.focus();
        searchBox.setSelectionRange(searchBox.value.length, searchBox.value.length);
    </script>
</body>
</html>