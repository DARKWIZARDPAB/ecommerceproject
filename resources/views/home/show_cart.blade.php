<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
       .center{
        margin:auto;
        width: 70%;
        text-align:center;
        margin-top: 40px;
        padding:30px;
        border:3px solid white;
      }

      table,th,td{
         border:1px solid grey;
      }

      .th_deg{
         font-size:30px;
         padding:5px;
         background:skyblue;
      }

      .img_size{
        height: 150px;
        width:150px;
      }

      .total_des{
         font-size: 20px;
         padding:40px;
      }

      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         
         @if(session()->has('message'))

<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {{session()->get('message')}}

</div>

@endif
    

      <div class="center">
      <table >
            <tr class="">
            <th class="th_deg"> Product Title</th>
            <th class="th_deg"> Product Quantity</th>
            <th class="th_deg"> Price</th>
            <th class="th_deg"> Image</th>
            <th class="th_deg"> Action</th>
           

            </tr>
            <?php $totalprice=0; ?>
            @foreach($cart as $data)
            <tr>
            <td>{{$data->product_title}}</td>
            <td>{{$data->quantity}}</td>
            <td>{{$data->price}}</td>
            <td><img class="img_size" src="/product/{{$data->image}}"></td>
            <td> <a class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this product')" href="{{url('remove_cart',$data->id)}}" >Remove Product </a></td>
            

            </tr>
            <?php $totalprice=$totalprice + $data->price; ?>
            @endforeach
            
            
                          
            
          </table>

          <div>
            <h1 class="total_des">Total Price : {{$totalprice}}</h1>
          </div>

          <div>
            <h1 style="font-size:25px ; padding-bottom:15px"> Proceed To Order </h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger"> Cash on Delivery </a>
            <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger"> Pay on Card </a>
          </div>
      </div>
         <!-- end header section -->
         <!-- slider section -->
        
         <!-- end slider section -->
      
      <!-- why section -->
      
      <!-- end why section -->
      
      <!-- arrival section -->
     
      <!-- end arrival section -->
      
      <!-- product section -->

      <div>
        
      </div>
      
      <!-- end product section -->

      <!-- subscribe section -->
     
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"home/></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>