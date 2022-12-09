<div class="col-3 item_buy_form_search">
    <div class="input-group">
        <span class="input-group-addon">Mã số</span>
        <input name="id" type="text" class="form-control id" placeholder="Mã số">
    </div>
</div>

<div class="col-3 item_buy_form_search">
    <div class="input-group">
        <span class="input-group-addon">Giá tiền</span>

        <select type="text" name="price" class="form-control price select-2-custom">
            <option value="">Chọn giá tiền</option>
            <option value="0-50000">Dưới 50K</option>
            <option value="50000-200000">Từ 50K - 200K</option>
            <option value="200000-500000">Từ 200K - 500K</option>
            <option value="500000-1000000">Từ 500K - 1 Triệu</option>
            <option value="1000000-5000000">Trên 1 Triệu</option>
            <option value="5000000-10000000">Trên 5 Triệu</option>
            <option value="10000000">Trên 10 Triệu</option>
        </select>
    </div>
</div>

@if(isset($auto_properties))
    @if(isset($slug))
        @if($slug == 'nick-lien-minh')
            @foreach($auto_properties as $auto_propertie)
                @if($auto_propertie->key == 'champions')
                    <div class="col-3 item_buy_form_search">
                        <div class="input-group">
                            <span class="input-group-addon">{{ $auto_propertie->name }}</span>
                            <select type="text" class="form-control champions select-2-custom" name="champions">
                                <option value="">--Không chọn--</option>
                                @if(isset($auto_propertie->childs))
                                    @foreach($auto_propertie->childs as $child)
                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-3 item_buy_form_search">
                        <div class="input-group">
                            <span class="input-group-addon">Trang phục</span>
                            <select type="text" class="form-control skill select-2-custom" name="skill">
                                <option value="">--Không chọn--</option>
                                @if(isset($auto_propertie->childs) && count($auto_propertie->childs))
                                    @foreach($auto_propertie->childs as $child)

                                        @if(isset($child->childs) && count($child->childs))
                                            @foreach($child->childs as $c_child)
                                                <option value="{{ $c_child->id }}">{{ $c_child->name }}</option>
                                            @endforeach
                                        @endif

                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                @elseif($auto_propertie->key == 'tftcompanions')
                    <div class="col-3 item_buy_form_search">
                        <div class="input-group">
                            <span class="input-group-addon">{{ $auto_propertie->name }}</span>
                            <select type="text" class="form-control tftcompanions select-2-custom" name="tftcompanions">
                                <option value="">--Không chọn--</option>
                                @if($auto_propertie->childs)
                                    @foreach($auto_propertie->childs as $child)
                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                @elseif($auto_propertie->key == 'tftmapskins')
                    <div class="col-3 item_buy_form_search">
                        <div class="input-group">
                            <span class="input-group-addon">{{ $auto_propertie->name }}</span>
                            <select type="text" class="form-control tftmapskins select-2-custom" name="tftmapskins">
                                <option value="">--Không chọn--</option>
                                @if($auto_propertie->childs)
                                    @foreach($auto_propertie->childs as $child)
                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                @elseif($auto_propertie->key == 'tftdamageskins')
                    <div class="col-3 item_buy_form_search">
                        <div class="input-group">
                            <span class="input-group-addon">{{ $auto_propertie->name }}</span>
                            <select type="text" class="form-control tftdamageskins select-2-custom" name="tftdamageskins">
                                <option value="">--Không chọn--</option>
                                @if($auto_propertie->childs)
                                    @foreach($auto_propertie->childs as $child)
                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
        @elseif($slug == 'nick-ninja-school')
            @foreach($auto_properties as $auto_propertie)
                @if($auto_propertie->key == 'CAPTURES')

                @elseif($auto_propertie->key == 'SERVER')
                    <div class="col-3 item_buy_form_search">
                        <div class="input-group">
                            <span class="input-group-addon">{{ $auto_propertie->key }}</span>
                            <select type="text" class="form-control tftcompanions select-2-custom" name="tftcompanions">
                                <option value="">--Không chọn--</option>
                                @if(isset($auto_propertie->childs))
                                    @foreach($auto_propertie->childs as $child)
                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                @else
                    @foreach($auto_propertie->childs as $childs)
                        @if($childs->key == 'CHAR_LEVEL')
                            <div class="col-3 item_buy_form_search">
                                <div class="input-group">
                                    <span class="input-group-addon">LEVEL</span>
                                    <select type="text" class="form-control tftdamageskins select-2-custom" name="tftdamageskins">
                                        <option value="">--Không chọn--</option>
                                        <option value="{{ $childs->id }}-1-39">1 - 39</option>
                                        <option value="{{ $childs->id }}-40-49">40 - 49</option>
                                        <option value="{{ $childs->id }}-50-59">50 - 59</option>
                                        <option value="{{ $childs->id }}-60-69">60 - 69</option>
                                        <option value="{{ $childs->id }}-70-79">70 - 79</option>
                                        <option value="{{ $childs->id }}-80-89">80 - 89</option>
                                        <option value="{{ $childs->id }}-90-99">90 - 99</option>
                                        <option value="{{ $childs->id }}-100-109">100 - 109</option>
                                        <option value="{{ $childs->id }}-110-119">110 - 119</option>
                                        <option value="{{ $childs->id }}-120-129">120 - 129</option>
                                        <option value="{{ $childs->id }}-130">130</option>
                                    </select>
                                </div>
                            </div>
                        @elseif($childs->key == 'CHAR_CLASS')
                            <div class="col-3 item_buy_form_search">
                                <div class="input-group">
                                    <span class="input-group-addon">CLASS</span>
                                    <select type="text" class="form-control champions select-2-custom" name="champions">
                                        <option value="">--Không chọn--</option>
                                        @foreach($childs->childs as $child)
                                            <option value="{{ $child->id }}">{{ $child->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endforeach

                @endif
            @endforeach
        @endif
    @endif
@else
    @if(isset($dataAttribute) && count($dataAttribute) > 0)
        @foreach($dataAttribute as $val)
            {{--        @dd($val)--}}
            @if($val->position == 'select')
                <div class="col-3 item_buy_form_search">
                    <div class="input-group">
                        <span class="input-group-addon">{{ $val->title }}</span>
                        <select type="text" class="form-control select select-2-custom" name="attribute_id_{{ $val->id }}">
                            <option value="">--Không chọn--</option>
                            @foreach($val->childs as $child)
                                <option value="{{ $child->id }}">{{ $child->title }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            @endif
        @endforeach
    @endif
@endif



<div class="col-12 item_buy_form_search pt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <button type="submit" class="btn btn_timkiem" style="position: relative">
                    <span class="btn_timkiem_text">Tìm kiếm</span>
                    <div class="row justify-content-center loading-data__timkiem">

                    </div>
                </button>
                <a href="javascript:void(0)" class="btn btn-danger btn-all" style="position: relative">
                    <span class="btn-all_text">Tất cả</span>
                    <div class="row justify-content-center loading-data__all">

                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <div class="input-group">
                        <span class="input-group-addon">Sắp xếp theo</span>
                        <select type="text" name="sort_by" class="form-control sort_by select-2-custom">
                            <option value="">Chọn cách sắp xếp</option>
                            <option value="random">Ngẫu nhiên</option>
                            <option value="price_start">Giá tiền từ cao đến thấp</option>
                            <option value="price_end">Giá tiền từ thấp đến cao</option>
                            <option value="created_at_start">Mới nhất</option>
                            <option value="created_at_end">Cũ nhất</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


