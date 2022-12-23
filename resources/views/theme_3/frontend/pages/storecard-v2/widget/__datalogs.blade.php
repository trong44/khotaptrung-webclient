@if(empty($data->data))

<div class="col-md-12 left-right">
    <table class="table table-striped table-hover table-logs" id="table-default">
        <thead><tr><th>Thời gian</th><th>Nội dung</th><th>Nhà mạng</th><th>Mã thẻ/Serial</th><th class="text-right">Mệnh giá</th><th class="text-right">Thực nhận</th><th class="text-center">Trạng thái</th><th>Chi tiết</th></tr></thead>
        <tbody>
        @if(isset($data) && count($data) > 0)
          {{--  @php
                $prev = null;
            @endphp--}}
            @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ date('d/m/Y',strtotime($item->created_at)) }}<br>{{ date('H:i:s',strtotime($item->created_at)) }}</td>
                        <td>{{ $item->content }}</td>
                        <td>
                            @if(isset($item->params))
                                @php
                                    $telecome =\App\Library\HelpersDecode::DecodeJson('telecom',$item->params);
                                @endphp
                                {{ $telecome }}
                            @endif
                        </td>
                        <td>
                            @if(isset($item->card))
                                @foreach($item->card as $val)
                                    <p class="text-left">MT: {{ \App\Library\Helpers::Decrypt($val->pin,config('module.charge.key_encrypt')) }}</p>
                                    <p class="text-left">SR: {{ \App\Library\Helpers::Decrypt($val->serial,config('module.charge.key_encrypt')) }}</p>
                                @endforeach
                            @endif

                        </td>

                        <td class="text-right">
                            {{ str_replace(',','.',number_format($item->price)) }} đ
                        </td>
                        <td class="text-right">
                            {{ str_replace(',','.',number_format($item->real_received_price)) }} đ
                        </td>
                        <td class="text-center">
                            @if($item->status == 1)
                                <span class="badge badge-primary">Thành công</span>
                            @elseif($item->status == 0)
                                <span class="badge badge-danger">Thất bại</span>
                            @elseif($item->status == 3)
                                <span class="badge badge-danger">Đã hủy</span>
                            @elseif($item->status == 2)
                                <span class="badge badge-warning" style="position: relative;padding-left: 24px;padding-right: 4px">
                                    <div class="c_loading">
                                        <div class="c_loading-child"></div>
                                    </div>
                                    Đang chờ xử lý</span>
                            @elseif($item->status == 4)
                                <span class="badge badge-danger">Lỗi gọi nhà cung cấp</span>
                            @elseif($item->status == 5)
                                <span class="badge badge-danger">Lỗi hệ thống</span>
                            @endif
                        </td>
                        <td>
                            <a href="/the-cao-da-mua-{{ $item->id }}" class="btn -secondary action-table show_chitiet" data-id="{{ $item->id }}">Chi tiết</a>
                        </td>
                    </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>


<div class="col-md-12 left-right justify-content-end default-paginate-addpadding default-paginate">

    @if(isset($data))
        @if($data->total()>1)

            <div class="row marinautooo justify-content-center">
                <div class="col-auto">
                    <div class="data_paginate paginate__v1 paging_bootstrap paginations_custom" style="text-align: center">
                        {{ $data->appends(request()->query())->links('pagination::bootstrap-default-4') }}
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
@endif
