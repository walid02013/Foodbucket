<title>Update Shops</title>

@extends('admin/layouts.adminapp')


@section('content')

<div class="row justify-content-center">
       
        <div class="col-sm-6">

        <h6 class="text-center" style="font-weight: bold;">Update Shops!</h6>

          <form class="text-left border border-dark p-2" method="POST" action="{{ route('admin.updateShopsPost') }}" enctype="multipart/form-data">         
               @csrf

               @if($shops->s_vendor == Auth::user()->email)
               <input type="text" name="s_id" class="form-control mb-4" value="{{$shops->id}}" hidden >
               <input type="text" name="is_s_vendor" class="form-control mb-4" value="0" hidden >

                   <div class="form-group">
                         <label for="Shop Category">Shop Category</label>
                              <select class="form-control" name="shop_category" required id="shop_category">       
                                 @foreach($shop_categories->reverse() as $value)
                                      <option value="{{ $value->id }}" {{$value->id == $shops->category  ? 'selected' : ''}} >{{ $value->name }}</option>
                                 @endforeach
                              </select>
                    </div>

                    <div class="form-group">
                          <label for="exampleInputEmail1">Shop Name</label>
                          <input type="text" class="form-control" name="s_name" value="{{$shops->s_name}}" aria-describedby="emailHelp" >
                    </div>

                    <div class="form-group">
                          <label for="exampleInputPassword1">Open Time</label><br>
                        HH <input type="number" min="0" max="23" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="o_hour" value="{{$shops->open_hh}}" placeholder="HH" >
                        MM <input type="number" min="0" max="59" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="o_min" value="{{$shops->open_mm}}" placeholder="MM" >                                      
                   </div> 

                    <div class="form-group">
                          <label for="exampleInputEmail1">Close Time</label><br>                          
                          HH <input type="number" min="0" max="23" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="c_hour" value="{{$shops->close_hh}}" placeholder="HH" >                          
                          MM <input type="number" min="0" max="59" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="c_min" value="{{$shops->close_mm}}" placeholder="MM" >    
                    </div> 

                    <div class="form-group">
                            <label for="exampleInputEmail1">Shop Discount</label>                 
                            <input type="number" min="0" max="50" class="form-control" name="s_discount" step="any" value="{{$shops->s_discount}}" aria-describedby="emailHelp">                       
                    </div>

                    <div class="form-group">
                          <label for="exampleInputEmail1">Shop Brance</label>
                          <select class="form-control" name="s_brance" required id="shops">                   
                                <option value="Pangsha" {{$shops->s_brance == "Pangsha"  ? 'selected' : ''}} >Pangsha</option>
                                <option value="Dhaka" {{$shops->s_brance == "Dhaka"  ? 'selected' : ''}} >Dhaka</option>
                          </select>
                    </div>        

                    <div class="form-group">
                          <label for="exampleInputEmail1">Shop</label>
                          <select class="form-control" name="shop" required id="shops">                   
                                      <option value="0" {{$shops->shop == 0  ? 'selected' : ''}} >Deactive</option>
                                      <option value="1" {{$shops->shop == 1  ? 'selected' : ''}} >Active</option>
                         </select>
                    </div>

                    <div class="form-group">
                          <label for="exampleInputEmail1">Status</label>
                          <select class="form-control" name="status" required id="shops">                   
                                      <option value="Pending" {{$shops->s_status == "Pending"  ? 'selected' : ''}} >Pending</option>
                                      <option value="Accepted" {{$shops->s_status == "Accepted"  ? 'selected' : ''}} >Accepted</option>
                                      <option value="Reject" {{$shops->s_status == "Reject"  ? 'selected' : ''}} >Reject</option>
                         </select>
                    </div>                 

                    <div class="form-group">
                         <input  type="text"  name="ss_banner" value="{{$shops->s_banner}}" hidden/>
                         <img id="previewBanner" src="{{$shops->s_banner}}" style="max-width:68px; margin-top:10px;"/><br><br>
                         <label for="exampleInputPassword1">Shop Banner</label><br>
                         <input  type="file"  name="s_banner" placeholder="Shop Banner" onchange="bannerPreview(this)"/>
                    </div>                                        

               <!-- Send button -->
               <button class="btn btn-success" type="submit">Update</button><br>     
               @endif








               @if($shops->s_vendor != Auth::user()->email)
               <input type="text" name="s_id" class="form-control mb-4" value="{{$shops->id}}" hidden >
               <input type="text" name="is_s_vendor" class="form-control mb-4" value="1" hidden >

                    <div class="form-group">
                          <label for="exampleInputEmail1">Shop Category</label>
                          @foreach($shop_categories->reverse() as $value)
                             @if($value->id == $shops->category)
                               <input type="text" class="form-control" name="shop_category" value="{{$value->name}}" readonly aria-describedby="emailHelp" >
                             @endif
                          @endforeach
                    </div>

                    <div class="form-group">
                          <label for="exampleInputEmail1">Shop Name</label>
                          <input type="text" class="form-control" name="s_name" value="{{$shops->s_name}}" readonly aria-describedby="emailHelp" >
                    </div>

                    <div class="form-group">
                          <label for="exampleInputPassword1">Open Time</label><br>
                        HH <input readonly type="number" min="0" max="23" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="o_hour" value="{{$shops->open_hh}}" placeholder="HH" >
                        MM <input readonly type="number" min="0" max="59" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="o_min" value="{{$shops->open_mm}}" placeholder="MM" >                                      
                   </div> 

                    <div class="form-group">
                          <label for="exampleInputEmail1">Close Time</label><br>                          
                          HH <input readonly type="number" min="0" max="23" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="c_hour" value="{{$shops->close_hh}}" placeholder="HH" >                          
                          MM <input readonly type="number" min="0" max="59" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="c_min" value="{{$shops->close_mm}}" placeholder="MM" >    
                    </div> 

                    <div class="form-group">
                            <label for="exampleInputEmail1">Shop Discount</label>                 
                            <input readonly type="number" min="0" max="50" class="form-control" name="s_discount" step="any" value="{{$shops->s_discount}}" aria-describedby="emailHelp">                       
                    </div>

                    <div class="form-group">
                            <label for="exampleInputEmail1">Shop Brance</label>                 
                            <input readonly type="text"  class="form-control" name="s_brance" step="any" value="{{$shops->s_brance}}" aria-describedby="emailHelp">                       
                    </div>

                    <div class="form-group">
                            <label for="exampleInputEmail1">Shop</label>                 
                            <input readonly type="text"  class="form-control" name="shop" step="any" value=" @if($shops->shop) Active @endif @if(!$shops->shop) Deactive @endif " aria-describedby="emailHelp">                       
                    </div>
      

                    <div class="form-group">
                          <label for="exampleInputEmail1">Status</label>
                          <select class="form-control" name="status" required id="shops">                   
                                      <option value="Pending" {{$shops->s_status == "Pending"  ? 'selected' : ''}} >Pending</option>
                                      <option value="Accepted" {{$shops->s_status == "Accepted"  ? 'selected' : ''}} >Accepted</option>
                                      <option value="Reject" {{$shops->s_status == "Reject"  ? 'selected' : ''}} >Reject</option>
                         </select>
                    </div>                 

                    <div class="form-group">
                         <input  type="text"  name="ss_banner" value="{{$shops->s_banner}}" hidden/>
                         <img id="previewBanner" src="{{$shops->s_banner}}" style="max-width:68px; margin-top:10px;"/><br><br>
                         <label for="exampleInputPassword1">Shop Banner</label><br>
                    </div>                                        

               <!-- Send button -->
               <button class="btn btn-success" type="submit">Update</button><br>     
               @endif





          </form> 

          </div>  





            <div class="col-sm-12">




            <!--Add popup-->
            <div class="panel-body">
                              
                  <div style="top: 50px;" class="modal fade " id="targetp" role="dialog">
                  <div class="modal-dialog">
                  <div class="modal-content">

                        <div class="modal-header">
                        <h6 style="color: black;" class=modal-title>Add New Product!</h6>
                        <button type="button" class="close" data-dismiss="modal" >&times</button>

                        </div>
                        <div class="modal-body" style="background: #6c757dab;">                          

                        <form class="border border-light p-5" method="POST" action="{{ route('admin.addProducts') }}" enctype="multipart/form-data">
                        @csrf

                              <div class="form-group">
                              <label for="Shop Category">Category</label>
                              <select class="form-control" name="p_category" required id="product_category">
                                    
                                    @foreach($product_category->reverse() as $value)
                                    <option value="{{ $value->id }}" >{{ $value->name }}</option>
                                    @endforeach

                              </select>
                              </div> 
               
                              <input type="text" class="form-control" name="p_shop"  value="{{ $shops->id }}" hidden>

                             
                              <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" class="form-control" name="p_name" aria-describedby="emailHelp" required>
                              </div>

                              <input type="text" class="form-control" name="p_vendor"  value="{{ Auth::user()->email }}" hidden>

                              <div class="form-group">
                              <label for="exampleInputEmail1">Price</label>
                              <input type="number" class="form-control" name="p_price" step="any" min="0" aria-describedby="emailHelp" required>
                              </div>

                              <div class="form-group">
                              <label for="exampleInputEmail1">Discount</label>
                              <input type="number" min="0" max="50" class="form-control" name="p_discount" step="any" min="0" aria-describedby="emailHelp" required>
                              </div>

                              <div class="form-group">
                              <label for="comment">Description:</label>
                              <textarea class="form-control" rows="5" name="p_description" required></textarea>
                              </div>

                              <div class="form-group">
                              <label for="Shop Category">Availability</label>
                              <select class="form-control" name="p_availability" required id="product_category">
                                    <option value="In Stock" >In Stock</option>
                                    <option value="Limited Stock" >Limited Stock</option>
                                    <option value="Out Of Stock" >Out Of Stock</option>
                              </select>
                              </div>

                              <div class="form-group">
                                    <label for="exampleInputPassword1">Active Time</label><br>
                              HH <input type="number" min="0" max="23" style=" max-width: 40px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="a_hh"  placeholder="HH" >
                              MM <input type="number" min="0" max="59" style=" max-width: 42px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="a_mm"  placeholder="MM" >                                      
                              </div> 

                              <div class="form-group">
                                    <label for="exampleInputEmail1">Deactive Time</label><br>                          
                                    HH <input type="number" min="0" max="23" style=" max-width: 40px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="d_hh"  placeholder="HH" >                          
                                    MM <input type="number" min="0" max="59" style=" max-width: 42px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="d_mm"  placeholder="MM" >    
                              </div>                                      

                              <div class="form-group">
                              <img id="previewProduct" src="images/blankimg.png" style="max-width:68px; margin-top:10px;"/><br><br>
                              <label for="exampleInputPassword1">Image</label><br>
                              <input required type="file" name="img_1" placeholder="Image" onchange="ProductPreview(this)"/>
                              </div> 

                              <input type="text" class="form-control" name="status" value="Pending" hidden>

                              <div class="form-group">
                              <input type="submit"  class="btn btn-success float-left" value="Add"/>
                              </div><br>                                    

                        </form>

                        </div>
                        <div class="modal-footer">
                        </div>

                  </div>
                  </div>
                  </div>
            
            </div>
            <!--Add popup end-->

            <h6 class="text-center" style="font-weight: bold;">All Products!</h6>
            @if($shops->s_vendor == Auth::user()->email)
            <a class="text-center" data-toggle="modal" data-target="#targetp" href=""><i class="fa fa-plus-square" aria-hidden="true"></i></a>
            <br><br>
            @endif
            <form class="text-center border border-dark">         
            <div class="table-responsive">
            <table class="table table-borderless">                              
            <thead style="background: linear-gradient(45deg, #62828d 0%, #5b594c 100%); color: white;">
                  <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Shop</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Availability</th>
                  <th>Active</th>
                  <th>Deactive</th>
                  <th>Image</th>
                  <th>Product</th>
                  <th>Status</th>  
                  <th>Action</th>                                                                             
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($product->reverse() as $value)
                        @if($value->shop == $shops->id )
                                    @foreach($product_category->reverse() as $p_value)
                                          @foreach($shop->reverse() as $s_value)

                                                @if ($value->category == $p_value->id && $value->shop == $s_value->id)
                                                      <tr>

                                                            <td>{{$value->id}}</td>
                                                            <td>{{$value->p_name}}</td>

                                                            <td>{{$p_value->name}}</td>

                                                            <td>{{$s_value->s_name}}</td>

                                                            <td>{{$value->p_price}}</td>
                                                            <td>{{$value->p_discount}}%</td>
                                                            <td>{{$value->p_availability}}</td>
                                                            <td>{{$value->a_hh}}-{{$value->a_mm}}</td>
                                                            <td>{{$value->d_hh}}-{{$value->d_mm}}</td>                                            
                                                            <td><img src="{{$value->p_img_1}}" style="max-width:21px; max-height:20px;"/></td>

                                                            @if ($value->product)
                                                            <td>Active</td>   
                                                            @endif

                                                            @if (!$value->product)
                                                            <td>Deactive</td>  
                                                            @endif 

                                                            <td>{{$value->p_status}}</td>
                                                            <td><a href="{{ route('admin.updateProductsGet',$value->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                
                                                            @if($shops->s_vendor == Auth::user()->email) <a href="{{ route('admin.delateProducts',$value->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a> @endif </td>                                                                       
                                                      </tr>
                                                @endif

                                                @endforeach 
                                    @endforeach 
                        @endif
                  @endforeach              
                  </tbody>
            </table>
            </div>
            </form>  

            </div>  





</div> 



<script>


function ProductPreview(input){
          var file = $("input[type=file]").get(1).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#previewProduct").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }



      function bannerPreview(input){
          var file = $("input[type=file]").get(0).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#previewBanner").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }
/*
      function profilePreview(input){
          var file = $("input[type=file]").get(1).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#previewProfile").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      } 
*/      

</script>

@endsection