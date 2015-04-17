@yield('before')

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
				<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu1" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="heading">
						<h3>GENERAL</h3>
					</li>
					@if(Auth::user()->hasCap('administrators_dashboard_get_index'))
					<li class="tooltips {{ $name == 'administrators_dashboard' ? 'active open' : '' }}">
						<a href="/">
						<i class="icon-home"></i>
						<span class="title">Escritorio</span>
						</a>
					</li>
					@endif

					@if(Auth::user()->hasCap('persons_view_get') || Auth::user()->hasCap('clients_view_get') || Auth::user()->hasCap('providers_view_get') || Auth::user()->hasCap('locations_view_get'))
					<li class="tooltips {{ $module['name'] == 'persons' || $module['name'] == 'clients' || $module['name'] == 'providers' || $module['name'] == 'locations' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Personas">
						<a href="/clients">
						<i class="icon-user"></i>
						<span class="title">
						Personas </span>
						<span class="arrow"></span>
						</a>
						<ul class="sub-menu">

							@if(Auth::user()->hasCap('clients_view_get'))
							<li class="{{ $module['name'] == 'clients' ? 'active' : '' }}">
								<a href="/clients">
								<i class="icon-emoticon-smile"></i>
								Clientes</a>
							</li>
							@endif

							@if(Auth::user()->hasCap('providers_view_get'))
							<li class="{{ $module['name'] == 'providers' ? 'active' : '' }}">
								<a href="/providers">
								<i class="icon-briefcase"></i>
								Proveedores</a>
							</li>
							@endif

							@if(Auth::user()->hasCap('locations_view_get'))
							<li class="{{ $module['name'] == 'locations' ? 'active' : '' }}">
								<a href="/locations">
								<i class="icon-pointer"></i>
								Localidades</a>
							</li>
							@endif

							@if(Auth::user()->hasCap('persons_view_get'))
							<li class="{{ $module['name'] == 'persons' ? 'active' : '' }}">
								<a href="/persons">
								<i class="icon-list"></i>
								Representantes</a>
							</li>
							@endif

						</ul>
					</li>
					@endif

					<!-- Coordanators Module -->

					@if(Auth::user()->hasCap('coordinators_read_get_index'))
					<li class="tooltips {{ $name == 'coordinators_read' ? 'active open' : '' }}">
						<a href="/">
						<i class="icon-home"></i>
						<span class="title">Escritorio</span>
						</a>
					</li>
					@endif

					@if(Auth::user()->hasCap('coordinators_teachers_get_index'))
					<li class="tooltips {{ $name == 'coordinators_teachers_read' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Profesores">
						<a href="/coordinators/teachers">
						<i class="icon-graduation"></i>
						<span class="title">
						Profesores </span>
						<!-- <span class="arrow"></span> -->
						</a>
						<!--
						<ul class="sub-menu">

							@if(Auth::user()->hasCap('coordinators_teachers_get_index'))
							<li class="{{ $name == 'coordinators_teachers_read' ? 'active' : '' }}">
								<a href="/coordinators/teachers">
								<i class="icon-list"></i>
								Listado</a>
							</li>
							@endif

							@if(Auth::user()->hasCap('coordinators_teachers_get_inactive'))
							 <li class="{{ $name == 'coordinators_teachers_inactive' ? 'active' : '' }}">
								<a href="/coordinators/teachers/inactive">
								<i class="icon-ban"></i>
								Inactivos</a>
							</li> 
							@endif

						</ul>
						-->
					</li>
					@endif

					@if(Auth::user()->hasCap('coordinators_students_get_index'))
					<li class="tooltips {{ $name == 'coordinators_students_read' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Estudiantes">
						<a href="/coordinators/students">
						<i class="icon-emoticon-smile"></i>
						<span class="title">
						Estudiantes </span>
						<!-- <span class="arrow"></span> -->
						</a>
						<!-- <ul class="sub-menu">
						
							@if(Auth::user()->hasCap('coordinators_students_get_index'))
							<li class="{{ $name == 'coordinators_students_read' ? 'active' : '' }}">
								<a href="/coordinators/students">
								<i class="icon-list"></i>
								Listado</a>
							</li>
							@endif
						
							@if(Auth::user()->hasCap('coordinators_students_get_inactive'))
							<li class="{{ $name == 'coordinators_students_inactive' ? 'active' : '' }}">
								<a href="/coordinators/students/inactive">
								<i class="icon-ban"></i>
								Inactivos</a>
							</li>
							@endif
						
						</ul> -->
					</li>
					@endif

					@if(Auth::user()->hasCap('coordinators_courses_get_index'))
					<li class="tooltips {{ $name == 'coordinators_courses_read' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Cursos">
						<a href="/coordinators/courses">
							<i class="icon-notebook"></i>
							<span class="title">
							Cursos </span>
							<!-- <span class="arrow"></span> -->
						</a>
						<!-- <ul class="sub-menu">
						
							@if(Auth::user()->hasCap('coordinators_courses_get_index'))
							<li class="{{ $name == 'coordinators_courses_read' ? 'active' : '' }}">
								<a href="/coordinators/courses">
								<i class="icon-list"></i>
								Listado</a>
							</li>
							@endif
						
							@if(Auth::user()->hasCap('coordinators_courses_get_inactive'))
							<li class="{{ $name == 'coordinators_courses_inactive' ? 'active' : '' }}">
								<a href="/coordinators/courses/inactive">
								<i class="icon-ban"></i>
								Inactivos</a>
							</li> 
							@endif
						
						</ul> -->
					</li>
					@endif

					<!-- Security Module -->

					@if(Auth::user()->hasCap('security_user_get_index') || Auth::user()->hasCap('security_role_get_index') || Auth::user()->hasCap('security_capability_get_index'))
					<li class="tooltips {{ $name == 'security_user' || $name == 'security_role' || $name == 'security_capability' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Usuario, Roles y Capacidades">
						<a href="/security/users">
						<i class="icon-users"></i>
						<span class="title">
						Usuarios </span>
						<span class="arrow"></span>
						</a>
						<ul class="sub-menu">

							@if(Auth::user()->hasCap('security_user_get_index'))
							<li class="{{ $name == 'security_user' ? 'active' : '' }}">
								<a href="/security/users">
								<i class="icon-list"></i>
								Todos</a>
							</li>
							@endif

							@if(Auth::user()->hasCap('security_role_get_index'))
							<li class="{{ $name == 'security_role' ? 'active' : '' }}">
								<a href="/security/roles">
								<i class="icon-lock"></i>
								Roles</a>
							</li>
							@endif

							@if(Auth::user()->hasCap('security_capability_get_index'))
							<li class="{{ $name == 'security_capability' ? 'active' : '' }}">
								<a href="/security/capabilities">
								<i class="icon-key"></i>
								Capacidades</a>
							</li>
							@endif

						</ul>
					</li>
					@endif
					<!-- END ANGULARJS LINK -->
					<!--
					<li>
						<a href="javascript:;">
						<i class="icon-basket"></i>
						<span class="title">eCommerce</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								<i class="icon-home"></i>
								Dashboard</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-basket"></i>
								Orders</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-tag"></i>
								Order View</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-handbag"></i>
								Products</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-pencil"></i>
								Product Edit</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-rocket"></i>
						<span class="title">Page Layouts</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-danger">new</span>Layout with Fontawesome Icons</a>
							</li>
							<li>
								<a href="index_extended.html">
								Layout with Glyphicon</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-warning">new</span>Full Height Content</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-warning">new</span>Right Sidebar Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Sidebar Fixed Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Sidebar Closed Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Content Loading via Ajax</a>
							</li>
							<li>
								<a href="index_extended.html">
								Disabled Menu Links</a>
							</li>
							<li>
								<a href="index_extended.html">
								Blank Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Fluid Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Language Switch Bar</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-diamond"></i>
						<span class="title">UI Features</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="ui_general.html">
								General Components</a>
							</li>
							<li>
								<a href="ui_buttons.html">
								Buttons</a>
							</li>
							<li>
								<a href="ui_confirmations.html">
								Popover Confirmations</a>
							</li>
							<li>
								<a href="ui_icons.html">
								<span class="badge badge-roundless badge-danger">new</span>Font Icons</a>
							</li>
							<li>
								<a href="ui_colors.html">
								Flat UI Colors</a>
							</li>
							<li>
								<a href="ui_typography.html">
								Typography</a>
							</li>
							<li>
								<a href="ui_tabs_accordions_navs.html">
								Tabs, Accordions & Navs</a>
							</li>
							<li>
								<a href="ui_tree.html">
								<span class="badge badge-roundless badge-danger">new</span>Tree View</a>
							</li>
							<li>
								<a href="ui_page_progress_style_1.html">
								<span class="badge badge-roundless badge-warning">new</span>Page Progress Bar</a>
							</li>
							<li>
								<a href="ui_blockui.html">
								Block UI</a>
							</li>
							<li>
								<a href="ui_notific8.html">
								Notific8 Notifications</a>
							</li>
							<li>
								<a href="ui_toastr.html">
								Toastr Notifications</a>
							</li>
							<li>
								<a href="ui_alert_dialog_api.html">
								<span class="badge badge-roundless badge-danger">new</span>Alerts & Dialogs API</a>
							</li>
							<li>
								<a href="ui_session_timeout.html">
								Session Timeout</a>
							</li>
							<li>
								<a href="ui_idle_timeout.html">
								User Idle Timeout</a>
							</li>
							<li>
								<a href="ui_modals.html">
								Modals</a>
							</li>
							<li>
								<a href="ui_extended_modals.html">
								Extended Modals</a>
							</li>
							<li>
								<a href="ui_tiles.html">
								Tiles</a>
							</li>
							<li>
								<a href="ui_datepaginator.html">
								<span class="badge badge-roundless badge-success">new</span>Date Paginator</a>
							</li>
							<li>
								<a href="ui_nestable.html">
								Nestable List</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-folder"></i>
						<span class="title">Multi Level Menu</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="javascript:;">
								<i class="icon-settings"></i> Item 1 <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="javascript:;">
										<i class="icon-user"></i>
										Sample Link 1 <span class="arrow"></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="#"><i class="icon-power"></i> Sample Link 1</a>
											</li>
											<li>
												<a href="#"><i class="icon-paper-plane"></i> Sample Link 1</a>
											</li>
											<li>
												<a href="#"><i class="icon-star"></i> Sample Link 1</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#"><i class="icon-camera"></i> Sample Link 1</a>
									</li>
									<li>
										<a href="#"><i class="icon-link"></i> Sample Link 2</a>
									</li>
									<li>
										<a href="#"><i class="icon-pointer"></i> Sample Link 3</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="javascript:;">
								<i class="icon-globe"></i> Item 2 <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="#"><i class="icon-tag"></i> Sample Link 1</a>
									</li>
									<li>
										<a href="#"><i class="icon-pencil"></i> Sample Link 1</a>
									</li>
									<li>
										<a href="#"><i class="icon-graph"></i> Sample Link 1</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">
								<i class="icon-bar-chart"></i>
								Item 3 </a>
							</li>
						</ul>
					</li>
					<li class="heading">
						<h3>MORE FEATURES</h3>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-settings"></i>
						<span class="title">Form Stuff</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								Form Controls</a>
							</li>
							<li>
								<a href="index_extended.html">
								iCheck Controls</a>
							</li>
							<li>
								<a href="index_extended.html">
								Form Layouts</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-warning">new</span>Form X-editable</a>
							</li>
							<li>
								<a href="index_extended.html">
								Form Wizard</a>
							</li>
							<li>
								<a href="index_extended.html">
								Form Validation</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-danger">new</span>Image Cropping</a>
							</li>
							<li>
								<a href="index_extended.html">
								Multiple File Upload</a>
							</li>
							<li>
								<a href="index_extended.html">
								Dropzone File Upload</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-briefcase"></i>
						<span class="title">Data Tables</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								Basic Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Responsive Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Managed Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Editable Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Advanced Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Ajax Datatables</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-present"></i>
						<span class="title">Extra</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								About Us</a>
							</li>
							<li>
								<a href="index_extended.html">
								Contact Us</a>
							</li>
							<li>
								<a href="index_extended.html">
								Search Results</a>
							</li>
							<li>
								<a href="index_extended.html">
								Pricing Tables</a>
							</li>
							<li>
								<a href="index_extended.html">
								404 Page Option 1</a>
							</li>
							<li>
								<a href="index_extended.html">
								404 Page Option 2</a>
							</li>
							<li>
								<a href="index_extended.html">
								404 Page Option 3</a>
							</li>
							<li>
								<a href="index_extended.html">
								500 Page Option 1</a>
							</li>
							<li>
								<a href="index_extended.html">
								500 Page Option 2</a>
							</li>
						</ul>
					</li>
					-->
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>

@yield('after')