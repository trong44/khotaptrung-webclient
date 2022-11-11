<div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
    <div class="input-group m-b-10">
        <div class="input-group">
            <span class="input-group-btn">
            <p class="input-group-btn-p">Mã số</p>
            </span>
            <input type="text" class="form-control id" name="id" placeholder="Mã số" autocomplete="off" value="" style="height: 40px">
        </div>
    </div>
</div>


<div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
    <div class="input-group m-b-10">
        <div class="input-group">
            <span class="input-group-btn">
            <p class="input-group-btn-p">Giá tiền</p>
            </span>
            <select type="text" name="price" class="form-control price" style="height: 40px">
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

</div>

<div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
    <div class="input-group">
        <span class="input-group-btn">
        <p class="input-group-btn-p">Trạng thái</p>
        </span>
        <select class="form-control status" name="status" style="height: 40px">
            <option value="">Chọn trạng thái</option>
            <option value="1">Chưa bán</option>
            <option value="0">Đã bán</option>
        </select>
    </div>
</div>

@if(isset($auto_properties))
    @if(isset($slug))
        @if($slug == 'nick-lien-minh')
            @foreach($auto_properties as $auto_propertie)
                @if($auto_propertie->key == 'champions')

                    <div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <p class="input-group-btn-p">{{ $auto_propertie->name }}</p>
                            </span>
                            <select class="form-control champions" name="champions" style="height: 40px">
                                <option value="">--Không chọn--</option>
                                @if(isset($auto_propertie->childs))
                                    @foreach($auto_propertie->childs as $child)
                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </div>

                    <div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <p class="input-group-btn-p">Trang phục</p>
                            </span>
                            <select class="form-control skill" name="skill" style="height: 40px">
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
                    <div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <p class="input-group-btn-p">{{ $auto_propertie->name }}</p>
                            </span>
                            <select class="form-control tftcompanions" name="tftcompanions" style="height: 40px">
                                <option value="">--Không chọn--</option>
                                @if(isset($auto_propertie->childs))
                                    @foreach($auto_propertie->childs as $child)
                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </div>

                @elseif($auto_propertie->key == 'tftmapskins')

                    <div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <p class="input-group-btn-p">{{ $auto_propertie->name }}</p>
                            </span>
                            <select class="form-control tftmapskins" name="tftmapskins" style="height: 40px">
                                <option value="">--Không chọn--</option>
                                @if(isset($auto_propertie->childs))
                                    @foreach($auto_propertie->childs as $child)
                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </div>

                @elseif($auto_propertie->key == 'tftdamageskins')

                    <div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <p class="input-group-btn-p">{{ $auto_propertie->name }}</p>
                            </span>
                            <select class="form-control tftdamageskins" name="tftdamageskins" style="height: 40px">
                                <option value="">--Không chọn--</option>
                                @if(isset($auto_propertie->childs))
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

                    <div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <p class="input-group-btn-p">SERVER</p>
                            </span>
                            <select class="form-control tftcompanions" name="tftcompanions" style="height: 40px">
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

                            <div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
                                <div class="input-group">
                            <span class="input-group-btn">
                            <p class="input-group-btn-p">LEVEL</p>
                            </span>
                                    <select class="form-control tftdamageskins" name="tftdamageskins" style="height: 40px">
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

                            <div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
                                <div class="input-group">
                            <span class="input-group-btn">
                            <p class="input-group-btn-p">CLASS</p>
                            </span>
                                    <select class="form-control champions" name="champions" style="height: 40px">
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
                <div class="col-12 col-lg-3" style="padding-top: 8px;padding-right: 8px;padding-left: 8px;padding-bottom: 8px">
                    <div class="input-group">
                    <span class="input-group-btn">
                    <p class="input-group-btn-p">{{ $val->title }}</p>
                    </span>
                        <select class="form-control select" name="attribute_id_{{ $val->id }}" style="height: 40px">
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