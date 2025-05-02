<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Product | e-Commerce Laravel</title>
  <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
  <!-- https://fonts.google.com/specimen/Open+Sans -->
  <link rel="stylesheet" href="{{url('./assets/css/fontawesome.min.css')}}">
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="{{url('./assets/jquery-ui-datepicker/jquery-ui.min.css')}}" type="text/css" />
  <!-- http://api.jqueryui.com/datepicker/ -->
  <link rel="stylesheet" href="{{url('./assets/css/bootstrap.min.css')}}">
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="{{url('./assets/css/tooplate.css')}}">
</head>

<body class="bg02">
  <div class="container">
    @include('includes.header')
    <!-- row -->
    <div class="row tm-mt-big">
      <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
        <div class="bg-white tm-block">
          <div class="row">
            <div class="col-12">
              <h2 class="tm-block-title d-inline-block">Edit Product</h2>
            </div>
          </div>
          <div class="row mt-4 tm-edit-product-row">
            <div class="col-xl-7 col-lg-7 col-md-12">
              <form action="{{ route('products.add') }}" method="POST" enctype="multipart/form-data" class="tm-edit-product-form">
                @csrf
                <div class="input-group mb-3">
                  <label for="productName" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Product Name</label>
                  <input id="productName" name="productName" type="text"
                    class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7 align-self-center" required>
                </div>
                <div class="input-group mb-3">
                  <label for="productDescription" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                  <textarea class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                    name="productDescription" rows="3" required></textarea>
                </div>
                <div class="input-group mb-3">
                  <label for="productPrice" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Price</label>
                  <input id="productPrice" name="productPrice" type="number" step="0.01"
                    class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7 align-self-center" required>
                </div>
                <div class="input-group mb-3">
                  <label for="category_id" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Category</label>
                  <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="category_id" name="category_id" required>
                    <option value="">Select one</option>
                    @foreach($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->categoryName }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                    <button type="submit" class="btn btn-primary">Update
                    </button>
                  </div>
                </div>
              </form>
              @if(session('success'))
              <div class="alert alert-success mt-3">
                {{ session('success') }}
              </div>
              @endif

              @if($errors->any())
              <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
              <img src="img/product-image.jpg" alt="Profile Image" class="img-fluid mx-auto d-block">
              <div class="custom-file mt-3 mb-3">
                <input id="fileInput" type="file" name="productImage" style="display:none;" accept="image/*" />
                <input type="button" class="btn btn-primary d-block mx-auto" value="Upload ..."
                  onclick="document.getElementById('fileInput').click();" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('includes.footer')
  </div>

  <script src="{{url('./assets/js/jquery-3.3.1.min.js')}}"></script>
  <!-- https://jquery.com/download/ -->
  <script src="{{url('./assets/jquery-ui-datepicker/jquery-ui.min.js')}}"></script>
  <!-- https://jqueryui.com/download/ -->
  <script src="{{url('./assets/js/bootstrap.min.js')}}"></script>
  <!-- https://getbootstrap.com/ -->
  <script>
    $(function() {
      $('#expire_date').datepicker();
    });
  </script>
</body>

</html>