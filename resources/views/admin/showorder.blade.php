
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
  <!-- partial -->

      @include('admin.siide')

      @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">

        <table>

        <tr style="background-color: grey;">
            <td style="padding:20px;">Customer name</td>
            <td style="padding:20px;">Product</td>
            <td style="padding:20px;">Price</td>
            <td style="padding:20px;">Quantity</td>
            <td style="padding:20px;">Status</td>
            <td style="padding:20px;">Action</td>
            <td style="padding:20px;">Print PDF</td>
        </tr>

        <tr align="center" style="background-color:black">
            @foreach($order as $orders)
            <td style="padding:20px;">{{$orders->name}}</td>
            <td style="padding:20px;">{{$orders->product_name}}</td>
            <td style="padding:20px;">{{$orders->price}}</td>
            <td style="padding:20px;">{{$orders->quantity}}</td>
            <td style="padding:20px;">{{$orders->status}}</td>
            <td style="padding:20px;">
            <a class="btn btn-success" href="{{url('updatestatus',$orders->id)}}">
                Deliver
            </a>
        </td>
        <td>
            <a href="{{url('print_pdf',$orders->id)}}" class="btn btn-secondary">Print PDF</a>
        </td>
        </tr>
        @endforeach
        </table>

    </div>
    </div>


          <!-- partial -->
       @include('admin.script')
  </body>
</html>