@if(isset($data_bot) && count($data_bot))
    <div class="col-md-12 left-right px-3 px-lg-0">
        <div class="row marginauto">
            <div class="col-md-12 col-8 body-header-col-km-left-ct">
                <small>Vị trí (Mặc định ở vách núi KAKAROT)</small>
            </div>
        </div>
    </div>
    <div class="col-md-12 left-right my-4">
        <div class="table-custom">
            <table>
                <thead>
                <tr>
                    <th>Server</th>
                    <th>Nhân vật</th>
                    <th>Khu vực</th>
                    <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data_bot as $key=> $bot)
                    @if($bot->active == 'on')
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $bot->uname }}</td>

                        <td>{{ $bot->zone }}</td>
                        <td>
                            <div class="tag__status --online">Online</div>
                        </td>
                    </tr>
                    @endif
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endif
