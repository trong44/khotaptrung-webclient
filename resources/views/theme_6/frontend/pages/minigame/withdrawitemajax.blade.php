
<div class="account_sidebar_content_title">
	<p>RÚT VẬT PHẨM GAME {{config('constants.game_type.'.$game_type)}}</p>
	<div class="account_sidebar_content_line"></div>
</div>
<div class="form-group row">
	<label class="col-md-3 control-label">
		Chọn loại vật phẩm khác:
	</label>
	<div class="col-md-6">
		<div class="input-group" style="width: 100%">
			<select name="game_type" id="game_type" class="form-control">
				@if(count($result->listgametype)>0)
				@foreach($result->listgametype as $item)
				<option value="{{route('getWithdrawItem',[$item->parent_id])}}" {{$item->parent_id==$game_type?'selected':''}}>{{$item->title}}</option>
				@endforeach
				@endif
			</select>
		</div>
	</div>
	<script type="text/javascript">
		$("#game_type").change(function(){
			window.location.href = $( "select#game_type" ).val();
		});
	</script>
</div>
<div class="text-center" style="color: #eb5d68;font-size: 18px;    margin: -14px auto 12px auto;    font-weight: 600;">Số {{isset($result->gametype->image)?$result->gametype->image:'vật phẩm'}} hiện có: {{number_format($result->number_item)}}</div>
<form class="form-horizontal" method="POST">
	{{csrf_field()}}
	<div class="form-group row">
		<label class="col-md-3 control-label">
			Gói muốn rút:
		</label>
		<div class="col-md-6">
			<div class="input-group" style="width: 100%">
				<select name="package" id="package" class="form-control">
					@if($result->package)
					@foreach($result->package as $item)
					<option value="{{$item->id}}">{{$item->title}}</option>
					@endforeach
					@endif
				</select>
			</div>
		</div>

	</div>
	<div class="form-group row">
		<label class="col-md-3 control-label">
			{{isset($result->gametype->idkey)?$result->gametype->idkey:'ID trong game:'}}
		</label>
		<div class="col-md-6">
			<div class="input-group" style="width: 100%">
				<input name="idgame" type="text" class="form-control">
			</div>
		</div>

	</div>
	<div class="form-group row">
		<label class="col-md-3 control-label">
			{{isset($result->gametype->position)?$result->gametype->position:'Số điện thoại ( nếu có ):'}}
		</label>
		<div class="col-md-6">
			<div class="input-group" style="width: 100%">
				<input name="phone" type="text" class="form-control">
			</div>
		</div>

	</div>
	<div class="form-group row " style="margin: 20px 0">
		<div class="col-md-6" style="    margin-left: 25%;">
			<button class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">Thực hiện</button>
		</div>
	</div>
</form>


<div class="" style="margin: 35px 0px;border: 1px solid #cccccc;padding: 15px">
	{!!isset($result->gametype->description)?$result->gametype->description:''!!}
</div>



<table id="charge_recent" class="table table-striped table-custom-res">

	<tbody>
	<tr>
		<th>Thời gian</th>
		<th>ID</th>
		<th>Số kim cương</th>
		<th>Ghi chú</th>
		<th>Thông báo</th>
		<th>Trạng thái</th>
		<!-- <th>Thao tác</th> -->
	</tr>
	</tbody>
		@if($paginatedItems)
			@foreach($result->withdraw_history->data as $item)
			<tr>
				<td>{{date('d/m/Y H:i:s', strtotime($item->created_at))}}</td>
				<td>{{$item->id}}</td>
				<td>{{$item->price}}</td>
				<td>{{$item->description}}</td>
				<td>
					@if ($item->content != "")
						<button type="submit" data-msg="{{$item->content}}" class="btn btn-xs c-btn-square m-b-10 btn-success proccess_toggle" rel="{{$item->id}}" >Tiến độ</button>
					@endif
				</td>
				<td>
					@if ($item->status == 0)
						<a class="btn btn-xs c-btn-square m-b-10 btn-warning">{{config('constants.withdraw_status.0')}}</a>
					@elseif($item->status == 1 )
						<a class="btn btn-xs c-btn-square m-b-10 btn-success">{{config('constants.withdraw_status.1')}}</a>
					@elseif($item->status == 2 )
						<a class="btn btn-xs c-btn-square m-b-10 btn-danger">{{config('constants.withdraw_status.2')}}</a>
					@elseif($item->status == 3 )
						<a class="btn btn-xs c-btn-square m-b-10 btn-danger">{{config('constants.withdraw_status.3')}}</a>
					@endif
				</td>
			</tr>
			@endforeach
		@endif
	</tbody>
</table>

<div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
	{{ $paginatedItems!=null?$paginatedItems->links():'' }}
</div>
