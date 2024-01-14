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
        margin-top: 40px;
        border:3px solid white;
      }

      .img_size{
        height: 150px;
        width:150px;
      }

      .th_color{
        background: skyblue;
      }

      .th_des{
        padding:30px;
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

          
          <h1 class="h1_font"> Product List </h1>

          @if(session()->has('message'))

          <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}

          </div>

          @endif
          <table class="center">
            <tr class="th_color">
            <th class="th_des"> Title</th>
            <th class="th_des"> Describtion</th>
            <th class="th_des"> Category</th>
            <th class="th_des"> Quantity</th>
            <th class="th_des"> Price</th>
            <th class="th_des"> Discounted Price</th>
            <th class="th_des"> Image</th>
            <th class="th_des"> Edit</th>
            <th class="th_des"> Delete</th>

            </tr>
            @foreach($data as $data)
            <tr>
            <td>{{$data->title}} </td>
            <td>{{$data->describtion}} </td>
            <td>{{$data->category}} </td>
            <td>{{$data->quantity}} </td>
            <td>{{$data->price}} </td>
            <td>{{$data->discounted_price}} </td>
            
            
            <td>
                
            <img class="img_size" src="/product/{{$data->image}}"> 
        
        ```</td>
            <td><a class="btn btn-success" href="{{url('edit_product',$data->id)}}"> Edit</a> </td>
            <td><a  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete category')" href="{{url('delete_product',$data->id)}}"> Delete</a> </td>
              
            </tr>
            @endforeach
          </table>


          </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>