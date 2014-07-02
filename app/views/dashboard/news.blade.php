<div class="action-bar-input">
	<input type="text" placeholder="输入新建的新闻标题，然后点击右边的加号">
	<button class="btn" data-toggle="modal" data-target="#news-new"><i class="fa fa-plus"></i></button>
</div>
<div class="modal fade" id="news-new">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="blank-form-card">
					{{ Form::open(array('url' =>'/news', 'files'=>true, 'class'=>'card-content')); }}
						<label for="news-title" class="input-label">新闻标题</label>
						<input type="text" class="input" placeholder="输入新闻标题" id="news-title" name="title">
						<label for="news-content" class="input-label">新闻内容</label>
						<textarea name="news-content" id="news-content" class="input"></textarea>
						<label for="news-image">新闻图片</label>
						<input type="file" name="img-uri">
					{{ Form::close(); }}
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="submit" class="btn btn-primary">保存新闻</button>
			</div>
		</div>
	</div>
</div>
<ul class="card-list row cards-picture">
	@foreach ($news as $news)
	<li class="col-sm-12 col-md-6" data-news-id="{{ $news->id }}">
		<div class="card has-actions">
			<div class="card-content">
				<div class="content-picture">
					<a href="#"><img src="{{ $news->imgUri }}" alt="{{ $news->title }}"></a>
				</div>
				<div class="content-main" id="news-id-{{ $news->id }}">
					<h3><a href="#">{{ $news->title }}</a></h3>
					<p>{{ $news->content }}</p>
				</div>
			</div>
			<ul class="card-action">
				<li>
					<a href="#" data-news-id="{{ $news->id }}" data-toggle="modal" data-target="#news-edit"><i class="fa fa-pencil"></i> 编辑</a>
				</li>
				<li>
					<a href="#" data-news-id="{{ $news->id }}"><i class="fa fa-trash-o"></i> 删除</a>
				</li>
			</ul>
		</div>
	</li>
	@endforeach
</ul>
<div class="modal fade" id="news-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="" class="blank-form-card">
					<div class="card-content">
						<input type="hidden" name="id">
						<label for="news-title" class="input-label">新闻标题</label>
						<input type="text" class="input" placeholder="输入新闻标题" id="news-title" name="title">
						<label for="news-content" class="input-label">新闻内容</label>
						<div id="news-wysiwyg-edit"></div>
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
