@if(isset($datacategory) && count($datacategory) > 0)

    <div class="row marginauto modal-nick-padding">
        <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
            <span>Game</span>
        </div>
        <div class="col-12 left-right background-nick-col-bottom-ct game-finter-nick">
            <select class="wide game" name="game">
                <option>Chọn</option>
                @foreach($datacategory as $val)
                <option value="{{ $val->slug }}">{{ $val->title }}</option>
                @endforeach
            </select>
        </div>
    </div>

@endif

