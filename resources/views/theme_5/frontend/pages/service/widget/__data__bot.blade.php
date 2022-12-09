@if(isset($data_bot))
{{--    <div class="description">--}}
{{--        <h2 style="margin-bottom: 23px;font-size: 20px;text-transform: uppercase;" class="c-mb-lg-2 fz-lg-16">--}}
{{--            Vị trí (MẶC ĐỊNH Ở VÁCH NÚI KAKAROT)</h2>--}}
{{--    </div>--}}
{{--    <div class="card c-mb-lg-16">--}}
{{--    <div class="row marginauto c-pt-lg-6">--}}
{{--        <div class="col-md-12 left-right data-bot" style="padding-left: 24px;padding-right: 24px">--}}
{{--            <div class="table-bot m_datatable m-datatable m-datatable--default m-datatable--loaded">--}}
{{--                <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">--}}
{{--                    <thead class="m-datatable__head">--}}
{{--                    <tr class="m-datatable__row">--}}
{{--                        <th style="" class="m-datatable__cell">--}}
{{--                            Server--}}
{{--                        </th>--}}
{{--                        <th class="m-datatable__cell">--}}
{{--                            Nhân vật--}}
{{--                        </th>--}}
{{--                        <th style="" class="m-datatable__cell">--}}
{{--                            Khu vực--}}
{{--                        </th>--}}
{{--                        <th style="" class="m-datatable__cell">--}}
{{--                            Trạng thái--}}
{{--                        </th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody class="m-datatable__body-bot">--}}

{{--                    @foreach($data_bot as $key=> $bot)--}}
{{--                        @if($bot->active == "on")--}}
{{--                            @php--}}
{{--                                $index = $key + 1;--}}
{{--                            @endphp--}}
{{--                            <tr>--}}
{{--                                <td>{{ $index }}</td>--}}
{{--                                <td>{{ $bot->uname }}</td>--}}

{{--                                <td>{{ $bot->zone }}</td>--}}
{{--                                <td>--}}
{{--                                    @if($bot->active == 'on')--}}
{{--                                        <span style="color:#2fa70f;font-weight: bold">[ONLINE]</span>--}}
{{--                                    @else--}}
{{--                                        <span style="color:#DA4343;font-weight: bold">[OFFLINE]</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}

{{--                    </tbody>--}}
{{--                </table>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </div>--}}

<h2 class="text-title-bold d-block d-lg-none c-mb-8">Vị trí (Mặc định ở vách núi KAKAROT)</h2>
<div class="card c-mb-lg-16">
    <div class="card-body">
        <h2 class="text-title-bold d-none d-lg-block c-mb-16">Vị trí (Mặc định ở vách núi KAKAROT)</h2>

        <table class="table-data-bot">
            <tr>
                <th>Server</th>
                <th>Nhân vật</th>
                <th>Khu vực</th>
                <th>Trạng thái</th>
            </tr>
            @forelse($data_bot as $key => $bot)
                @if($bot->active == 'on')
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $bot->uname }}</td>
                        <td>{{ $bot->zone }}</td>
                        <td>
                            <div class="status success">Online</div>
                        </td>
                    </tr>
                @else
                @endif

            @empty
            @endforelse
        </table>
    </div>
</div>
@endif
