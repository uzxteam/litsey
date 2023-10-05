@php
$brandElements = getContent('brand.element',false);
@endphp
<!--========================== Coverage Section Start ==========================-->
<div class="client pb-60 ">
    <div class="container">
        <div class="client-logos client-slider">
            @foreach($brandElements as $item)
           <a href="{{__($item->data_values->url)}}">
            <img src="{{getImage(getFilePath('brand').'/'.$item->data_values->brand_image)}}" alt="brand-image">
           </a>
           @endforeach
        </div>
    </div>
</div>
<!--========================== Coverage Section End ==========================-->
