
<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">
   @include('admin.css')
   <style type="text/css">
    .title 
    {
      color:white; 
      padding-top: 25px;
     font-size:25px;
    }

    label
    {
      display:inline-block;
      width:200px;
    }
    </style>
  </head>
  <body>
  <!-- partial -->

      @include('admin.siide')

      @include('admin.navbar')

      <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">

        
        <!-- partial -->
      <h1 class="title">Add Product</h1>






      @if(session()->has('message'))
      <div class="alert alert-success">

      <button type="button" class="close" data-dismiss="alert">x</button>

      {{session()->get('message')}}
      </div>
      @endif


      

      <form action="{{url('updateproduct',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
    <div style="padding:15px;">
      <label for="">Product title</label>
      <input style="color:black;" type="text" name="title" value="{{$data->title}}" 
      require="">
    </div>


    <div style="padding:15px;">
      <label for="">Price</label>
      <input style="color:black;" type="number" name="price" value="{{$data->price}}"
      require="">
    </div>



    <div style="padding:15px;">
      <label for="">Description</label>
      <input style="color:black;" type="text" name="description" value="{{$data->description}}"
      require="">
    </div>



    <div style="padding:15px;">
      <label for="">Quantite</label>
      <input style="color:black;" type="text" name="quantity" value="{{$data->quantity}}"
      require="">
    </div>


    <div style="padding:15px;">
      <label for="">Old Image</label>
       <img height="100" width="100" src="/productimage/{{$data->image}}" alt="">
    </div>

    <div style="padding:15px;">

    <label for="">Change the image</label>
    <input type="file" name="file">
    </div>

    <div style="padding:15px;">
    <input class="btn btn-success" type="submit">
    </div>
    </form>
      </div>
      </div>


          <!-- partial -->
       @include('admin.script')
  </body>
</html>