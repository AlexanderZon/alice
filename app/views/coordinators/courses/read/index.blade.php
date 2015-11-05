@extends ('layouts.master')

@section('toolbar')
	
	<div class="page-toolbar">
		<!-- BEGIN THEME PANEL -->
		<div class="btn-group btn-theme-panel">
			@if(Auth::user()->hasCap('coordinators_courses_get_inactive'))
				<a href="{{ $route }}/inactive" class="btn tooltips" data-toggle="Visualizar Cursos Inactivos" data-container="body" data-placement="left" data-html="true"  data-original-title="Visualizar Cursos Inactivos"><i class="icon-ban"></i></a>
			@endif
			@if(Auth::user()->hasCap('coordinators_courses_get_create'))
				<a href="{{ $route }}/create" class="btn tooltips" data-toggle="Añadir un nuevo registro" data-container="body" data-placement="left" data-html="true"  data-original-title="Añadir un nuevo curso"><i class="icon-plus"></i></a>
			@endif
		</div>
		<!-- END THEME PANEL -->
	</div>

@stop

@section ("content")

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet box green-haze">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-notebook"></i>Listado de Cursos
						</div>
						<div class="tools">
							@if(Auth::user()->hasCap('coordinators_courses_get_inactive'))
								<a href="{{ $route }}/inactive" class="label bg-green-haze tooltips" data-original-title="Ver los Cursos Inactivos"><i class="fa fa-ban"></i> Ver Inactivos</a>
							@endif
							@if(Auth::user()->hasCap('coordinators_courses_get_create'))
								<a href="{{ $route }}/create" class="label bg-green-haze tooltips" data-original-title="Añadir un nuevo curso"><i class="fa fa-plus-circle"></i> Añadir Nuevo</a>
							@endif
						</div>
					</div>
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover" id="datatable">
						<thead>
						<tr>
							<th>
								 Título 
							</th>
							<th>
								 Profesor
							</th>
							<th>
								 Estudiantes
							</th>
							<th>
								 Lecciones
							</th>
							<th>
								 Discusiones
							</th>
							<th>
								 Estado
							</th>
							@if(Auth::user()->hasCap('coordinators_courses_get_show') OR Auth::user()->hasCap('coordinators_courses_get_update') OR Auth::user()->hasCap('coordinators_courses_get_delete'))
								<th>
									 Acciones
								</th>
							@endif
						</tr>
						</thead>
						<tbody>
						@foreach( $courses as $course )
						<tr>
							<td>
								{{ $course->title }}
							</td>
							<td>
								{{ $course->teacher->first_name }} {{ $course->teacher->last_name }}
							</td>
							<td>
								{{ count($course->students) }}
							</td>
							<td>
								{{ count($course->lessons) }}
							</td>
							<td>
								{{ count($course->discussions) }}
							</td>
							<td>
							@if( $course->status == 'active' )
								@if(Auth::user()->hasCap('coordinators_courses_get_deactivate'))
									<a href="{{ $route . '/deactivate/' . Hashids::encode($course->id) }}" class="tooltips" data-container="body" data-placement="bottom" data-html="true"  data-original-title="Desactivar"><span class="label bg-blue">{{ 'Activo' }}</span></a>
								@else
									{{ $course->status == 'active' ? 'Activo' : 'Inactivo' }}
								@endif
							@elseif( $course->status == 'inactive' )
								@if(Auth::user()->hasCap('coordinators_courses_get_activate'))
									<a href="{{ $route . '/activate/' . Hashids::encode($course->id) }}" class="tooltips" data-container="body" data-placement="bottom" data-html="true"  data-original-title="Activar"><span class="label bg-yellow-saffron">{{ 'Inactivo' }}</span>
								@else
									{{ $course->status == 'active' ? 'Activo' : 'Inactivo' }}
								@endif
							@else
								{{ $course->status == 'active' ? 'Activo' : 'Inactivo' }}
							@endif
							</td>
							@if(Auth::user()->hasCap('coordinators_courses_get_show') OR Auth::user()->hasCap('coordinators_courses_get_update') OR Auth::user()->hasCap('coordinators_courses_get_delete'))
								<td>
									@if( $course->status == 'active' )
										@if(Auth::user()->hasCap('coordinators_courses_get_show'))
											&nbsp;&nbsp;
											<a class="font-blue-steel tooltips" href="{{ $route . '/show/' . Hashids::encode($course->id) }}" data-container="body" data-placement="bottom" data-html="true"  data-original-title="Visualizar contenido del curso"> <i class="fa fa-eye"></i> </a> 
										@endif
									@elseif( $course->status == 'inactive' )
										@if(Auth::user()->hasCap('coordinators_courses_get_show'))
											&nbsp;&nbsp;
											<a class="font-blue-steel tooltips" href="{{ $route . '/show/' . Hashids::encode($course->id) }}" data-container="body" data-placement="bottom" data-html="true"  data-original-title="Visualizar"> <i class="fa fa-eye"></i> </a> 
										@endif
										@if(Auth::user()->hasCap('coordinators_courses_get_update'))
											&nbsp;&nbsp;
											<a class="font-yellow-crusta tooltips" href="{{ $route . '/update/' . Hashids::encode($course->id) }}" data-container="body" data-placement="bottom" data-html="true"  data-original-title="Editar"> <i class="fa fa-pencil"></i> </a> 
										@endif
										@if(Auth::user()->hasCap('coordinators_courses_get_delete'))
											&nbsp;&nbsp;
											<a class="font-red-sunglo tooltips" href="{{ $route . '/delete/' . Hashids::encode($course->id) }}" data-container="body" data-placement="bottom" data-html="true"  data-original-title="Eliminar"> <i class="fa fa-trash-o"></i> </a>
										@endif
									@endif
								</td>
							@endif
						</tr>
						@endforeach
						</tbody>
						</table>
					</div>
				</div>
				<!-- END EXAMPLE TABLE PORTLET-->
			</div>
		</div>

		<!-- END PAGE CONTENT INNER -->

@stop

@section('javascripts')
	
	<script src="/assets/global/scripts/datatable.js"></script>
	<script type="text/javascript">	
		var TableAdvanced = function () {

		    var initDataTable = function () {
		        var table = $('#datatable');

		        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

		        /* Set tabletools buttons and button container */

		        $.extend(true, $.fn.DataTable.TableTools.classes, {
		            "container": "btn-group tabletools-btn-group pull-right",
		            "buttons": {
		                "normal": "btn btn-sm default",
		                "disabled": "btn btn-sm default disabled"
		            }
		        });

		        var oTable = table.dataTable({

		            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
		            "language": {
		                "aria": {
		                    "sortAscending": ": activate to sort column ascending",
		                    "sortDescending": ": activate to sort column descending"
		                },
		                "emptyTable": "No hay datos disponibles en la tabla",
		                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
		                "infoEmpty": "Ningún registro encontrado",
		                "infoFiltered": "(filtrando de _MAX_ registros totales)",
		                "lengthMenu": "Ver _MENU_ registros",
		                "search": "Buscar:",
		                "zeroRecords": "Ninguna coincidencia encontrada"
		            },

		            "order": [
		                [0, 'asc']
		            ],
		            "lengthMenu": [
		                [5, 15, 20, -1],
		                [5, 15, 20, "All"] // change per page values here
		            ],

		            // set the initial value
		            "pageLength": 10,
		            "dom": "<'row'<'col-md-6 col-sm-4'l><'col-md-4'T><'col-md-2' f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

		            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
		            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
		            // So when dropdowns used the scrollable div should be removed. 
		            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

		            "tableTools": {
		                "sSwfPath": "/assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
		                "aButtons": [{
		                    "sExtends": "pdf",
		                    "sButtonText": "PDF"
		                }, {
		                    "sExtends": "csv",
		                    "sButtonText": "CSV"
		                }, {
		                    "sExtends": "xls",
		                    "sButtonText": "Excel"
		                }, {
		                    "sExtends": "print",
		                    "sButtonText": "Imprimir",
		                    "sInfo": 'Por favor presione "CTRL+P" para imprimir o "ESC" para salir',
		                    "sMessage": "Generado mediate DataTables"
		                }, {
		                    "sExtends": "copy",
		                    "sButtonText": "Copiar"
		                }]
		            }
		        });

		        var tableWrapper = $('#sample_2_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
		        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
		    }

		    return {

		        //main function to initiate the module
		        init: function () {

		            if (!jQuery().dataTable) {
		                return;
		            }

		            initDataTable();

		        }

		    };

		}();
	</script>
	<!-- END PAGE LEVEL SCRIPTS -->

	<script>
        jQuery(document).ready(function() {  
           	Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			Demo.init(); // init demo features
   			TableAdvanced.init();

   			jQuery('.fancybox').fancybox();
   			
        });

	</script>

@stop
