@extends('user.master')
@section('content')
<style>
  #categorygrid img{
    width: 100%;
    height: 100%;
  }
</style>
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Product</li>
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->  
      
         <!--  Best Seller -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Best Seller</span></h2>
            <ul class="bestseller">
            @foreach($product_seller as $item_seller)
              <li>
                <img width="50" height="50" src="{{ url('resources/upload/'.$item_seller->image) }}" alt="product" title="product">
                <a class="productname" href="product.html"> {{ $item_seller->name }}</a>
                
                <span class="price">${{ $item_seller->price }}</span>
              </li>
             @endforeach 
            </ul>
          </div>
          <!-- Latest Product -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Latest Products</span></h2>
            <ul class="bestseller">
            @foreach($product_latest as $item_product_latest)
              <li>
                <img width="50" height="50" src="{{ url('resources/upload/'.$item_product_latest->image) }}" alt="product" title="product">
                <a class="productname" href="product.html"> {{ $item_product_latest->name }}</a>
                
                <span class="price">${{ $item_product_latest->price }}</span>
              </li>
            @endforeach  
            </ul>
          </div>
          <!--  Must have -->  
          <div class="sidewidt">
          <h2 class="heading2"><span>Must have</span></h2>
          <div class="flexslider" id="mainslider">
            <ul class="slides">
            @foreach($product_seller as $item_slide)
              <li>
                <img src="{{ url('resources/upload/'.$item_slide->image) }}" alt="" />
              </li>
             @endforeach 
            </ul>
          </div>
          </div>
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">          
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                  @foreach($product as $item)
                    <li class="span3">
                      <a class="prdocutname" href="{{ url('product',[$item->id,$item->name]) }}">{{ $item->name }}</a>
                      <div class="thumbnail">
                        <span class="sale tooltip-test">Sale</span>
                        <a href="{{ url('product',[$item->id,$item->name]) }}"><img alt="" src="{{ url('resources/upload/'.$item->image) }}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                          <div class="price">
                            <div class="pricenew">${{ $item->price }}</div>
                            
                          </div>
                        </div>
                      </div>
                    </li>
                   @endforeach 
                  </ul>
                  <div class="pagination pull-right">
                    <ul>
                    @if(($product->currentPage()) != 1)
                      <li><a href="{{ str_replace('/?','?',$product->url($product->currentPage() - 1)) }}">Prev</a>
                      </li>
                     @endif 
                      @for($i = 1 ; $i <= $product->lastPage() ; $i++)
                      <li class="{{ ($product->currentPage() == $i) ? 'active' : '' }}">
                        <a href="{{ str_replace('/?','?',$product->url($i)) }}">{{ $i }}</a>
                      </li>
                     @endfor
                     @if(($product->currentPage()) != ($product->lastPage()))
                      <li><a href="{{ str_replace('/?','?',$product->url($product->currentPage() + 1)) }}">Next</a>
                      </li>
                      @endif
                    </ul>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection