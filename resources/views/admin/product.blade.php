<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    <style>
      .div_center{
        text-align:center;
        padding-top:40px;
      }

      .h1_font{

        font-size:40px;
        padding-bottom:40px;
      }

      .input_color{
        color: black;
      }

      .center{
        margin:auto;
        width: 50%;
        text-align:center;
        margin-top: 30px;
        border:3px solid white;
      }

      label {
        display: inline-block;
        width : 200px;
      }

      .div_design{
        margin-top:5px;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
       
        <div class="main-panel">
          <div class="content-wrapper">

          @if(session()->has('message'))

          <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}

          </div>

          @endif
       
                <div class="div_center">
                    <h1> Add Product </h1>
                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                    <label> Product Title </label>
                    <input type="text"  name="title" class="input_color" placeholder="write a title" required="" >
                    </div>

                    <div class="div_design">
                    <label> Product describtion </label>
                    <input type="text"  name="describtion" class="input_color" placeholder="write a describtion"  required="">
                    </div>

                    <div class="div_design" >
                    <label> Product discounted price </label>
                    <input type="number"  name="discounted_price" class="input_color" placeholder="write a discounted price"  >
                    </div>

                    

                    <div class="div_design">
                    <label> Product quantity </label>
                    <input type="text"  name="quantity" class="input_color" placeholder="write a quantity" required="" >
                    </div>

                    <div class="div_design" >
                    <label> Product price </label>
                    <input type="number"  name="price" class="input_color" placeholder="write a price" required="">

                    </div>

                    <div class="div_design">
                    <label> Product category </label>
                    <select class="input_color" name="category" required="">
                     
                        <option value="" selected> Add a Category </option>
                        @foreach($data as $data)
                        <option value="{{$data->category_name}}"> {{$data->category_name}} </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="div_design">
                    <label> Product  image </label>
                    <input type="file"  name="image" class="input_color" placeholder="write a image" required="" >
                    </div>
                    <div>
                    <input type="submit" name="submit" class="btn btn-primary" value="add product">
                    </div>
                    </form>
                </div>
          </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>