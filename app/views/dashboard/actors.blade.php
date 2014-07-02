<!-- 创建演员 -->
<div class="action-bar-input">
	<input type="text" placeholder="输入新建的演员姓名，然后点击右边的加号">
	<button class="btn" data-toggle="modal" data-target="#actor-new"><i class="fa fa-plus"></i></button>
</div><!-- // 创建演员 -->
<!-- 创建对话框 -->
<div class="modal fade" id="actor-new">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="blank-form-card">
					{{ Form::open(array('url'=>'/actor', 'files'=>true, 'class'=>'card-content')); }}
						<label for="actor-name" class="input-label">演员姓名</label>
						<input type="text" class="input" placeholder="输入演员的姓名" id="actor-name" name="name">
						<label for="actor-description" class="input-label">演员生平</label>
						<textarea name="description" id="actor-description" cols="30" rows="5" class="input" placeholder="输入演员的生平" autofocus></textarea>
						<label for="actor-avatar" class="input-label">演员头像</label>
						<input type="file" id="actor-avatar" name="avatar">
					{{ Form::close(); }}
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">关闭</button>
				<button type="submit" class="btn btn-primary">保存演员</button>
			</div>
		</div>
	</div>
</div><!-- // 创建对话框 -->
<!-- 演员列表 -->
<ul class="card-list row cards-picture">
	@foreach ( $actors as $actor )
	<li class="col-sm-12 col-md-6" data-actor-id="{{ $actor->id }}">
		<div class="card has-actions">
			<div class="card-content">
				<div class="content-picture">
					<a href="#"><img src="{{ $actor->avatarUri }}" alt="{{ $actor->name }}"></a>
				</div>
				<div class="content-main" id="actor-id-{{ $actor->id }}">
					<h3><a href="#">{{ $actor->name }}</a></h3>
					<p>{{ $actor->introduce }}</p>
				</div>
			</div>
			<ul class="card-action">
				<li>
					<a href="#" data-actor-id="{{ $actor->id }}" data-toggle="modal" data-target="#actor-edit"><i class="fa fa-pencil"></i> 编辑</a>
				</li>
				<li>
					<a href="#" data-actor-id="{{ $actor->id }}"><i class="fa fa-trash-o"></i> 删除</a>
				</li>
			</ul>
		</div>
	</li>
	@endforeach
</ul><!-- // 演员列表 -->
<div class="modal fade" id="actor-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="" class="blank-form-card">
					<div class="card-content">
						<input type="hidden" name="id">
						<label for="actor-name" class="input-label">演员名称</label>
						<input type="text" class="input" id="actor-name" name="name">
						<label for="actor-description" class="input-label">演员生平</label>
						<textarea name="description" id="actor-description" id="" cols="30" rows="5" class="input"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">关闭</button>
				<button type="submit" class="btn btn-primary">更新类型</button>
			</div>
		</div>
	</div>
</div>
