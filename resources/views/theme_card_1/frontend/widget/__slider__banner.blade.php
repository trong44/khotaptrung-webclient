@if(isset($data))
{{--    @foreach($data??[] as $item)--}}
        <picture class="banner_index">
            <img src="{{\App\Library\MediaHelpers::media($data[0]->image)}}" alt="mua-the-cao-gia-re" title="mua thẻ garena bảo mật, nhanh chóng, tiện lợi">
        </picture>
{{--    @endforeach--}}

@endif

