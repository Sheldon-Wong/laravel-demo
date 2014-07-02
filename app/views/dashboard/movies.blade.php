<div class="action-bar-input">
	<input type="text" placeholder="输入新建的电影名称，然后点击右边的加号">
	<button class="btn" data-toggle="modal" data-target="#movie-new"><i class="fa fa-plus"></i></button>
</div>
<div class="modal fade" id="movie-new">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form class="blank-form-card" method="post" enctype="multipart/form-data" action="">
					<div class="card-content">

						<label for="movie-title" class="input-label">电影名称</label>
						<input name="title" type="text" class="input" placeholder="输入电影名称" id="movie-title" required>

						<label for="movie-year" class="input-label">上映年份</label>
						<input name="year" type="text" class="input" id="movie-year" placeholder="输入电影上映的年份" required autofocus>

						<label for="movie-description" class="input-label">电影简介</label>
						<textarea name="description" id="movie-description" class="input" cols="30" rows="5" placeholder="输入电影的简介" required></textarea>

						<label for="movie-poster" class="input-label">海报</label>
						<input name="poster" type="file" id="movie-poster" required>

						<label for="movie-uri" class="input-label">电影原片</label>
						<input name="movieUri" type="file" id="movie-uri" required>

						<label for="movie-trailer-uri" class="input-label">电影预告片</label>
						<input name="movieTrailerUri" type="file" id="movie-trailer-uri" required>

						<label for="movie-alias" class="input-label">电影别名</label>
						<input name="alias" type="text" class="input" id="movie-alias" placeholder="输入电影的其他别名" required>

						<label for="movie-countries" class="input-label">国家</label>
						<input name="countries" type="text" class="input" id="movie-countries" placeholder="输入电影所属的国家" required>

						<label for="movie-languages" class="input-label">语言</label>
						<input name="languages" type="text" class="input" id="movie-languages" placeholder="输入电影的语言" required>

						<label for="movie-directors" class="input-label">导演</label>
						<input name="directors" type="text" class="input" id="movie-directors" placeholder="输入电影的导演" required>

						<label for="movie-rank" class="input-label">评分</label>
						<input name="rank" type="text" class="input" id="movie-rank" placeholder="输入电影的评分" required>

						<label for="movie-length" class="input-label">时长</label>
						<input name="length" type="text" class="input" id="movie-length" placeholder="输入电影的时长" required>

						<label for="movie-categories" class="input-label">类型</label>
						<input name="categories" type="text" class="input" id="movie-categories" placeholder="输入电影的类型" required>

					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="submit" class="btn btn-primary">保存电影</button>
			</div>
		</div>
	</div>
</div>
<ul class="card-list row cards-picture">
	@foreach ($movies as $movie)
	<li class="col-sm-12 col-md-6" data-movie-id="{{ $movie->id }}">
		<div class="card has-actions">
			<div class="card-content">
				<div class="content-picture">
					<a href="#"><img src="{{ $movie->coverUri }}" alt="{{ $movie->title }}"></a>
				</div>
				<div class="content-main" id="movie-id-{{ $movie->id }}">
					<h3><a href="#">{{ $movie->title }}<span>({{ $movie->year }})</span></a></h3>
					<p>{{ $movie->summary }}</p>
					<aside>
						<p><b>Director</b> <a href="">{{ $movie->directors }}</a></p>
						<p><b>Stars</b>@foreach( $movie->actors as $actor ) <a href="">{{ $actor->name }}</a>,@endforeach more...</p>
					</aside>
				</div>
			</div>
			<ul class="card-action">
				<li>
					<a href="#" data-movie-id="{{ $movie->id }}" data-toggle="modal" data-target="#news-edit"><i class="fa fa-pencil"></i> 编辑</a>
				</li>
				<li>
					<a href="#" data-movie-id="{{ $movie->id }}"><i class="fa fa-trash-o"></i> 删除</a>
				</li>
			</ul>
		</div>
	</li>
	@endforeach
</ul>
