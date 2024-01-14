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

          
          <h1 class="h1_font"> All Order </h1>

          @if(session()->has('message'))

          <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}

          </div>

          @endif
          <table class="center">
            <tr class="th_color">
            <th class="th_des"> Sl no.</th>
            <th class="th_des"> Name</th>
            <th class="th_des"> Email</th>
            <th class="th_des"> Phone</th>
            <th class="th_des"> Address</th>
            <th class="th_des"> Product Title</th>
            <th class="th_des"> Quantity</th>
            <th class="th_des"> Price</th>
            <th class="th_des"> Image</th>
            <th class="th_des"> Payment Status</th>
            <th class="th_des"> Delivery Status</th>
            <th class="th_des"> Delivered</th>
            <th class="th_des"> Print PDF</th>
            <!-- <th class="th_des"> Delete</th> -->

            </tr>
            @foreach($data as $key=>$data)
            <tr>
            <td>{{$key +1}} </td>
            <td>{{$data->name}} </td>
            <td>{{$data->email}} </td>
            <td>{{$data->phone}} </td>
            <td>{{$data->address}} </td>
            <td>{{$data->product_title}} </td>
            <td>{{$data->quantity}} </td>
            <td>{{$data->price}} </td>
           
            
            
            <td>
                
            <img class="img_size" src="/product/{{$data->image}}"> 
        
        ```</td>
            <td>{{$data->payment_status}} </td>
            <td>{{$data->delivery_status}} </td>
            <!-- <td><a class="btn btn-success" href="{{url('edit_product',$data->id)}}"> Edit</a> </td> -->
            @if($data->delivery_status=='Processing')
            <td><a  class="btn btn-success" onclick="return confirm('Are you sure you want to change the Status')" href="{{url('delivered',$data->id)}}"> Delivered</a> </td>
            @else
            <td><p style="color:red; font-size:20px"> Delivered </p></td>
            @endif
            <td><a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}"> Print PDF</a> </td>
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