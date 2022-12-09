@if(isset($data_bot))

    <div class="row">
        <div class="col-lg-12 column">
            <div class="job-details">
                <h2 style="margin-bottom: 23px;font-size: 20px;font-weight: bold;text-transform: uppercase;float: left">Vị trí <span style="font-size:14px;margin-top: 8px;margin-left:5px;font-weight:bold;">(MẶC ĐỊNH Ở VÁCH NÚI KAKAROT)</span></h2>
                <div class="table-bot m_datatable m-datatable m-datatable--default m-datatable--loaded">
                    <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                        <thead class="m-datatable__head">
                        <tr class="m-datatable__row">
                            <th style="" class="m-datatable__cell">
                                Server
                            </th>
                            <th class="m-datatable__cell">
                                Nhân vật
                            </th>
                            <th style="" class="m-datatable__cell">
                                Khu vực
                            </th>
                            <th style="" class="m-datatable__cell">
                                Trạng thái
                            </th>
                        </tr>
                        </thead>
                        @php
                        $index = 0;
                        @endphp
                        <tbody class="m-datatable__body-bot">
                        @foreach($data_bot as $key=> $bot)
                            @if($bot->active == "on")
                                @php
                                    $index = $index + 1;
                                @endphp
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $bot->uname }}</td>

                                <td>{{ $bot->zone }}</td>
                                <td>
                                    @if($bot->active == 'on')
                                        <span style="color:#2fa70f;font-weight: bold">[ONLINE]</span>
                                    @else
                                        <span style="color:#DA4343;font-weight: bold">[OFFLINE]</span>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif
