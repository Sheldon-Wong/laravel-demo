<div class="action-bar-input">
	<input type="text" placeholder="输入新建的用户名，然后点击右边的加号">
	<button class="btn" data-toggle="modal" data-target="#user-new"><i class="fa fa-plus"></i></button>
</div>
<div class="modal fade" id="user-new">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="blank-form-card">
					<div class="card-content">
						<label for="user-name" class="input-label">用户昵称</label>
						<input type="text" class="input" placeholder="输入用户昵称" id="user-name" name="name" required>
						<label for="user-email" class="input-label">用户邮箱</label>
						<input type="email" class="input" placeholder="输入用户邮箱" id="user-password" name="email" autofocus required>
						<label for="user-password" class="input-label">用户密码</label>
						<input type="password" class="input" placeholder="输入用户密码" id="user-password" name="password" required>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">关闭</button>
				<button type="submit" class="btn btn-primary">保存用户</button>
			</div>
		</div>
	</div>
</div>
<ul class="card-list card-list-striped row cards-normal">
	@foreach ( $users as $user )
	<li class="col-xs-12" data-user-id="{{ $user->id }}">
		<div class="card">
			<div class="card-content">
				<div class="content-main" id="user-id-{{ $user->id }}">
					<img src="{{ $user->avatarUri }}" alt="">
					<p>{{ $user->name }}</p>
					<p>{{ $user->email }}</p>
				</div>
				<div class="content-addon">
					<a href="#" data-user-id="{{ $user->id }}" data-toggle="modal" data-target="#user-edit"><i class="fa fa-pencil"></i> 编辑</a>
					<a href="#" data-user-id="{{ $user->id }}"><i class="fa fa-trash-o"></i> 删除</a>
				</div>
			</div>
		</div>
	</li>
	@endforeach
</ul>
<div class="modal fade" id="user-edit">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div action="" class="blank-form-card">
					<div class="card-content">
						<input type="hidden" name="id">
						<label for="user-name" class="input-label">用户昵称</label>
						<input type="text" class="input" id="user-name" name="name">
						<label for="user-email" class="input-label">用户邮箱</label>
						<input type="email" class="input" id="user-email" name="email">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">关闭</button>
				<button type="submit" class="btn btn-primary">更新用户</button>
			</div>
		</div>
	</div>
</div>
