<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Product | e-Commerce Laravel</title>
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
              <h2 class="tm-block-title d-inline-block">Add Category</h2>
            </div>
          </div>
          <div class="row mt-4 tm-edit-product-row">
            <div class="col-xl-10 col-lg-10 col-md-12">
              <form action="" class="tm-edit-product-form">
                <div class="input-group mb-3">
                  <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Category Name</label>
                  <input id="name" name="name" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7 align-self-center">
                </div>
                <div class="input-group mb-3">
                  <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                    <button type="submit" class="btn btn-primary">Add
                    </button>
                  </div>
                </div>
              </form>
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