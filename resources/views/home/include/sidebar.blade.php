<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start {{ ($uri == 'home') ? 'active' : '' }}">
					<a href="{{ route('home') }}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class="icon-rocket"></i>
						<span class="title">Channel</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ route('channel.getAdd') }}">
								<span class="icon-plus"></span> Add channel
							</a>
						</li>

						<li>
							<a href="{{ route('channel.getManage') }}">
								<span class="icon-diamond"></span>  Manage channel
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="fa fa-ship"></i>
						<span class="title">Video</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="">
								<span class="icon-like"></span> Upload
							</a>
						</li>

						<li>
							<a href="{{ route('video.getCloneVideo') }}">
								<span class="icon-paper-plane"></span> Clone a video
							</a>
						</li>

						<li>
							<a href="{{ route('video.getCloneChannel') }}">
								<span class="icon-present"></span> Clone a channel
							</a>
						</li>

					</ul>
				</li>

				<li>
					<a href="{{ route('queue.getList') }}">
						<i class="fa fa-ship"></i>
						<span class="title">Queue</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->