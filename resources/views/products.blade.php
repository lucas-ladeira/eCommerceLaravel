<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Products Page | e-Commerce Laravel</title>
  <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
  <!-- https://fonts.google.com/specimen/Open+Sans -->
  <link rel="stylesheet" href="{{url('./assets/css/fontawesome.min.css')}}">
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="{{url('./assets/css/bootstrap.min.css')}}">
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="{{url('./assets/css/tooplate.css')}}">
</head>

<body id="reportsPage" class="bg02">
  <div class="" id="home">
    <div class="container">
      @include('includes.header')
      <!-- row -->
      <div class="row tm-content-row tm-mt-big">
        <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
          <div class="bg-white tm-block h-100">
            <div class="row">
              <div class="col-md-8 col-sm-12">
                <h2 class="tm-block-title d-inline-block">Products</h2>

              </div>
              <div class="col-md-4 col-sm-12 text-right">
                <a href="{{url('/addProduct')}}" class="btn btn-small btn-primary">Add New Product</a>
              </div>
            </div>
            <form action="{{ route('products.deleteSelected') }}" method="POST">
              @csrf
              <div class="table-responsive">
                <table class="table table-hover table-striped tm-table-striped-even mt-3">
                  <thead>
                    <tr class="tm-bg-gray">
                      <th scope="col">&nbsp;</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr>
                      <th scope="row">
                        <input type="checkbox" name="product_ids[]" value="{{ $product->id }}" aria-label="Checkbox">
                      </th>
                      <td class="tm-product-name">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-dark">
                          {{ $product->productName }}
                        </a>
                      </td>
                      <td class="tm-product-price">{{ number_format($product->productPrice, 2, '.', ' ') }} $</td>
                      <td>
                        <form action="{{ route('products.delete', $product->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-link p-0">
                            <i class="fas fa-trash-alt tm-trash-icon"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="tm-table-mt tm-table-actions-row">
                <div class="tm-table-actions-col-left">
                  <button type="submit" class="btn btn-danger">Delete Selected Items</button>
                </div>
                <div class="tm-table-actions-col-right">
                  @if($products->count() > 0)
                  <span class="tm-pagination-label">Page</span>
                  <nav aria-label="Page navigation" class="d-inline-block">
                    {{ $products->links('pagination::bootstrap-4') }}
                  </nav>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
          <div class="bg-white tm-block h-100">
            <h2 class="tm-block-title d-inline-block">Product Categories</h2>
            <table class="table table-hover table-striped mt-3">
              <tbody>
                @foreach ($categories as $c)
                <tr>
                  <td>{{$c->categoryName}}</td>
                  <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <a href="{{ url('/addCategory') }}" class="btn btn-primary tm-table-mt">Add New Category</a>
          </div>
        </div>
      </div>
      @include('includes.footer')
    </div>
  </div>
  <script src="{{url('./assets/js/jquery-3.3.1.min.js')}}"></script>
  <!-- https://jquery.com/download/ -->
  <script src="{{url('./assets/js/bootstrap.min.js')}}"></script>
  <!-- https://getbootstrap.com/ -->

</body>

</html>