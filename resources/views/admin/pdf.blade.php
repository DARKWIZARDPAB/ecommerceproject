<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order PDF</title>

    <style>
      

     
      .center{
        margin:auto;
        width: 50%;
        text-align:center;
        margin-top: 40px;
        border:3px solid white;
      }

     

      .th_des{
        padding:30px;
      }
    </style>
</head>
<body>
<table class="center">
            <tr class="th_color">
            <th class="th_des"> Name</th>
            <th class="th_des"> Email</th>
            <th class="th_des"> Phone</th>
            <th class="th_des"> Address</th>
            <th class="th_des"> Product Title</th>
            <!-- <th class="th_des"> Quantity</th>
            <th class="th_des"> Price</th>
            <th class="th_des"> Image</th>
            <th class="th_des"> Payment Status</th>
            <th class="th_des"> Delivery Status</th> -->
            <!-- <th class="th_des"> Delete</th> -->

            </tr>
          
            <tr>
            <td>{{$order->name}} </td>
            <td>{{$order->email}} </td>
            <td>{{$order->phone}} </td>
            <td>{{$order->address}} </td>
            <td>{{$order->product_title}} </td>
            <!-- <td>{{$order->quantity}} </td>
            <td>{{$order->price}} </td>
            <td>{{$order->payment_status}} </td>
            <td>{{$order->delivery_status}} </td> -->
            </tr>
               
          </table>
</body>
</html>