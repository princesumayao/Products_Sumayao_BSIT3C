<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product Information</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Product Information</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('product.updateList', $index) }}" class="row g-3">
              @csrf
              <div class="col-md-6">
                <label class="form-label">Product ID</label>
                <input type="text" name="product_id" class="form-control" value="{{ $product['product_id'] }}">
                <small class="text-muted">Product ID cannot be changed</small>
              </div>
              <div class="col-md-6">
                <label class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" value="{{ $product['product_name'] }}">
              </div>
              <div class="col-md-6">
                <label class="form-label">Product Category</label>
                <input type="text" name="product_category" class="form-control" value="{{ $product['product_category'] }}">
              </div>
              <div class="col-md-3">
                <label class="form-label">Product Quantity</label>
                <input type="number" name="product_quantity" class="form-control" value="{{ $product['product_quantity'] }}">
              </div>
              <div class="col-md-3">
                <label class="form-label">Product Price</label>
                <input type="number" step="0.01" name="product_price" class="form-control" value="{{ $product['product_price'] }}">
              </div>
              <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('product.list') }}" type="button" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-success">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>