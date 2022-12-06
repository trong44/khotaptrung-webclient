@if(isset($result->number_item))

<div class="existing-items">
    <span class="t-body-1">Bạn đang có:</span>
    <div class="number_item">{{ $result->number_item }} {{ $result->name_item->image }}</div>
</div>
@else
    @if(App\Library\AuthCustom::check())
        <div class="existing-items">
            <span class="t-body-1">Bạn đang có:</span>
            <div class="number_item">0 {{ $result->name_item->image }}</div>
        </div>
    @endif
@endif
