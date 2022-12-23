<?php $att_values = $data->groups ?>

@foreach($dataAttribute as $key => $value)
    <?php $all_values = $value->childs ?>
    @foreach($att_values as $att_value)
        @foreach($all_values as $all_value)
            @if($att_value->id == $all_value -> id)
                <div class="col-6 col-sm-6 col-md-4 col-lg-4 shop_product_info_variant">
                    <p>{{ $value->title }}: <span>{{ $all_value->title }}</span></p>
                </div>
            @endif
        @endforeach
    @endforeach
@endforeach





