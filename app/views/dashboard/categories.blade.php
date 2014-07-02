<div class="action-bar-input" action="">
	<input type="text" placeholder="输入新建的电影类型，然后点击右边的加号">
	<button class="btn" type="submit"><i class="fa fa-plus"></i></button>
</div>
<ul class="card-list cards-label row">
	@foreach ( $categories as $category )
	<li class="col-xs-6 col-sm-4 col-md-3" data-category-id="{{ $category->id }}">
		<div class="card has-actions">
			<div class="card-content">
				<h3 id="category-id-{{ $category->id }}">{{ $category->title }}</h3>
			</div>
			<ul class="card-action">
				<li>
					<a href="#" data-category-id="{{ $category->id }}" data-toggle="modal" data-target="#category-edit"><i class="fa fa-pencil"></i> 编辑</a>
				</li>
				<li>
					<a href="#" data-category-id="{{ $category->id }}"><i class="fa fa-trash-o"></i> 删除</a>
				</li>
			</ul>
		</div>
	</li>
	@endforeach
</ul>
<div class="modal fade" id="category-edit">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="blank-form-card">
					<div class="card-content">
						<input type="hidden" name="id">
						<label for="category-title" class="input-label">类型名称</label>
						<input type="text" class="input" id="category-title" name="title">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">关闭</button>
				<button type="submit" class="btn btn-primary">更新类型</button>
			</div>
		</div>
	</div>
</div>
