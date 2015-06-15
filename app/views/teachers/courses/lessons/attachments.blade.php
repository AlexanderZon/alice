
	<!-- BEGIN PICKERS LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/clockface/css/clockface.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"/>
	<!-- END PICKERS LEVEL STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
	<link href="/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
	<link href="/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
	<!-- END PAGE LEVEL STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.Metronic.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-summernote/summernote.css">

	<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
	<!-- END PAGE LEVEL STYLES -->

	<style type="text/css">
		#dropzone {
		    width: 100%;
		    height: 100px;
		    line-height: 50px;
		    text-align: center;
		    font-weight: bold;
		}
		#dropzone.in {
		    width: 100%;
		    height: 120px;
		    line-height: 200px;
		    font-size: larger;
		}
		#dropzone.hover {
		    background: #909090;
		    padding: 1em;
		    border: 2px dashed grey;
		}
		#dropzone.fade {
		    -webkit-transition: all 0.3s ease-out;
		    -moz-transition: all 0.3s ease-out;
		    -ms-transition: all 0.3s ease-out;
		    -o-transition: all 0.3s ease-out;
		    transition: all 0.3s ease-out;
		    opacity: 1;
		}
	</style>

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PORTLET -->

			<div class="portlet light">

				<!-- END PAGE CONTENT INNER -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="portlet-title">
							<h4 class="profile-usertitle-name">Archivos Adjuntos de la lección "{{ $lesson->title }}"
								<a href="javascript:;" class="btn blue-madison pull-right tooltips lessons-back-btn" data-placement="left" data-original-title="Ir al listado de Lecciones">
									<i class="fa fa-arrow-left"></i>
								</a>
							</h4>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<!-- <form id="fileupload" action="/assets/global/plugins/jquery-file-upload/server/php/index.php" method="POST" enctype="multipart/form-data"> -->
							<form id="fileupload" action="{{ $route }}/uploadattachments" method="POST" enctype="multipart/form-data">
								<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
								<div class="row fileupload-buttonbar">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<!-- The fileinput-button span is used to style the file input field as button -->
										<span class="btn green fileinput-button">
										<i class="fa fa-plus"></i>
										<span>
										Añadir Archivos... </span>
										<input type="file" name="files[]" multiple="">
										</span>
										<button type="submit" class="btn blue start">
										<i class="fa fa-upload"></i>
										<span>
										Comenzar Subida </span>
										</button>
										<button type="reset" class="btn warning cancel">
										<i class="fa fa-ban-circle"></i>
										<span>
										Cancelar Subida </span>
										</button>
										<button type="button" class="btn red delete">
										<i class="fa fa-trash"></i>
										<span>
										Eliminar </span>
										</button>
										<input type="checkbox" class="toggle">
										<!-- The global file processing state -->
									</div>
									<!-- The global progress information -->
									<div class="col-lg-5 fileupload-progress fade">
										<!-- The global progress bar -->
										<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
											<div class="progress-bar progress-bar-success" style="width:0%;">
											</div>
										</div>
										<!-- The extended global progress information -->
										<div class="progress-extended">
											 &nbsp;
										</div>
									</div>
								</div>

								<div id="dropzone" class="fade well">Arrastre los Archivos Aquí</div>
								<!-- The table listing the files available for upload/download -->
								<div class="row">
									<div class="col-md-4"></div>
									<div class="col-md-4" style="text-align:center"><span class="fileupload-process"></span></div>
									<div class="col-md-4"></div>
								</div>
								<table role="presentation" class="table table-striped clearfix">
									<tbody class="files">
									</tbody>
								</table>
							</form>


							<!-- <form id="editlesson-form" action="" method="post" class="form-horizontal ajax-form" data-url="{{ $route }}/editlesson" enctype="multipart/form-data">
								<input type="hidden" name="lesson_id" value="{{ Crypt::encrypt($lesson->id) }}">
								<div class="form-body"> 
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-offset-3 col-md-9">
													<button type="submit" class="btn green">Enviar</button>
													<a href="javascript:;" class="btn default lessons-back-btn">Volver</a>
												</div>
											</div>
										</div>
										<div class="col-md-6">
										</div>
									</div>
								</div>
							</form> -->
							<!-- END FORM-->
							<!-- The blueimp Gallery widget -->
							<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
								<div class="slides">
								</div>
								<h3 class="title"></h3>
								<a class="prev">
								‹ </a>
								<a class="next">
								› </a>
								<a class="close white">
								</a>
								<a class="play-pause">
								</a>
								<ol class="indicator">
								</ol>
							</div>
							<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
							<script id="template-upload" type="text/x-tmpl">
							{% for (var i=0, file; file=o.files[i]; i++) { %}
							    <tr class="template-upload fade">
							        <td>
							            <span class="preview"></span>
							        </td>
							        <td>
							            <p class="name">{%=file.name%}</p>
							            <strong class="error text-danger label label-danger"></strong>
							        </td>
							        <td>
							            <p class="size">Processing...</p>
							            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
							            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
							            </div>
							        </td>
							        <td>
							            {% if (!i && !o.options.autoUpload) { %}
							                <button class="btn blue start" disabled>
							                    <i class="fa fa-upload"></i>
							                    <span>Subir</span>
							                </button>
							            {% } %}
							            {% if (!i) { %}
							                <button class="btn red cancel">
							                    <i class="fa fa-ban"></i>
							                    <span>Cancelar</span>
							                </button>
							            {% } %}
							        </td>
							    </tr>
							{% } %}
							</script>
							<!-- The template to display files available for download -->
							<script id="template-download" type="text/x-tmpl">
							        {% for (var i=0, file; file=o.files[i]; i++) { %}
							            <tr class="template-download fade">
							                <td>
							                    <span class="preview">
							                        {% if (file.thumbnailUrl) { %}
							                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" style="max-height: 70px; max-width:100px"></a>
							                        {% } %}
							                    </span>
							                </td>
							                <td>
							                    <p class="name">
							                        {% if (file.url) { %}
							                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
							                        {% } else { %}
							                            <span>{%=file.name%}</span>
							                        {% } %}
							                    </p>
							                    {% if (file.error) { %}
							                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
							                    {% } %}
							                </td>
							                <td>
							                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
							                </td>
							                <td>
							                    {% if (file.deleteUrl) { %}
							                        <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
							                            <i class="fa fa-trash-o"></i>
							                            <span>Eliminar</span>
							                        </button>
							                        <input type="checkbox" name="delete" value="1" class="toggle">
							                    {% } else { %}
							                        <button class="btn yellow cancel btn-sm">
							                            <i class="fa fa-ban"></i>
							                            <span>Cancelar</span>
							                        </button>
							                    {% } %}
							                </td>
							            </tr>
							        {% } %}
							    </script>


						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT INNER -->
				
			</div>
					
			<!-- END PORTLET -->
		</div>
	</div>		

	<script type="text/javascript" src="/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-summernote/summernote.js" type="text/javascript"></script>
	
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="/assets/global/plugins/ion.rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
	<!-- END PAGE LEVEL PLUGINS-->
	<!-- BEGIN:File Upload Plugin JS files-->
	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
	<!-- The Templates plugin is included to render the upload/download listings -->
	<script src="/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
	<!-- blueimp Gallery script -->
	<script src="/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
	<!-- The File Upload processing plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
	<!-- The File Upload image preview & resize plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
	<!-- The File Upload audio preview plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
	<!-- The File Upload video preview plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
	<!-- The File Upload validation plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
	<!-- The File Upload user interface plugin -->
	<script src="/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
	<!-- The main application script -->
	<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
	<!--[if (gte IE 8)&(lt IE 10)]>
	    <script src="/assets/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
	    <![endif]-->
	<!-- END:File Upload Plugin JS files-->

	<!-- BEGIN PICKERS LEVEL PLUGINS -->
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/clockface/js/clockface.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/moment/moment.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- END PICKERS LEVEL PLUGINS -->


	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	
	<script type="text/javascript">

		var FormFileUpload = function () {

		    return {
		        //main function to initiate the module
		        init: function () {

		             // Initialize the jQuery File Upload widget:
		             // This is used when the file is uploading
		            $('#fileupload').fileupload({
		                disableImageResize: false,
    					dropZone: $('#dropzone'),
		                autoUpload: false,
		                disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
		                maxFileSize: 5000000,
		                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
						formData: {
							lesson_id: '{{Hashids::encode($lesson->id)}}',
						},
		                // Uncomment the following to send cross-domain cookies:
		                //xhrFields: {withCredentials: true},                
		            });

		            // Enable iframe cross-domain access via redirect option:
		            $('#fileupload').fileupload(
		                'option',
		                'redirect',
		                window.location.href.replace(
		                    /\/[^\/]*$/,
		                    '/cors/result.html?%s'
		                )
		            );

		            // Upload server status check for browsers with CORS support:
		            if ($.support.cors) {
		                $.ajax({
		                    type: 'HEAD'
		                }).fail(function () {
		                    $('<div class="alert alert-danger"/>')
		                        .text('Upload server currently unavailable - ' +
		                                new Date())
		                        .appendTo('#fileupload');
		                });
		            }

		            // Load & display existing files:
		            $('#fileupload').addClass('fileupload-processing');
		            $.ajax({
		                // Uncomment the following to send cross-domain cookies:
		                //xhrFields: {withCredentials: true},
		                url: $('#fileupload').attr("action"),
		                dataType: 'json',
		                data: {
		                	lesson_id: '{{ Hashids::encode($lesson->id)}}',
		                },
		                error: function(xhr){
		                	console.log(xhr);
		                },
		                context: $('#fileupload')[0]
		            }).always(function () {
		                $(this).removeClass('fileupload-processing');
		            }).done(function (result) {
		                $(this).fileupload('option', 'done')
		                .call(this, $.Event('done'), {result: result});
		            }).error(function(e) {
		            	/* Act on the event */
		            	console.log(e);
		            });;
		        }

		    };

		}();

		var ComponentsIonSliders = function () {

		    return {
		        //main function to initiate the module
		        init: function () {

		            $("#approval_percentage").ionRangeSlider({
		                min: 0,
		                max: 100,
		                type: 'single',
		                step: 1,
		                postfix: " %",
		                prettify: false,
		                hasGrid: true
		            });
		            
		        }

		    };

		}();

		var ComponentsPickers = function () {

		    var handleDatePickers = function () {

		       	if (!jQuery().daterangepicker) {
		            return;
		        }
		        moment.locale('es');

		        $('#defaultrange').daterangepicker({
		                opens: (Metronic.isRTL() ? 'left' : 'right'),
		                format: 'DD/MM/YYYY',
		                locale: {
			                applyLabel: 'Aplicar',
			                cancelLabel: 'Cancelar',
			                fromLabel: 'Desde',
			                toLabel: 'Hasta',
			                weekLabel: 'W',
			                customRangeLabel: 'Custom Range',
			                daysOfWeek: moment.weekdaysMin(),
			                monthNames: moment.monthsShort(),
			                firstDay: moment.localeData()._week.dow
			            },
		                separator: ' to ',
		                //startDate: moment("{{ date('Ymd', strtotime($lesson->date_start)) }}", "YYYYMMDD" ),
		                //endDate: moment("{{ date('Ymd', strtotime($lesson->date_end)) }}", "YYYYMMDD" ),
		                minDate: moment(),
		                maxDate: moment().subtract('days', -365),
		            },
		            function (start, end) {
		            	console.log('change;');
		                $('#defaultrange input').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
		            }
		        ); 

		    }	   

		    return {
		        //main function to initiate the module
		        init: function () {
		            handleDatePickers();
		        }
		    };

		}();

		var ComponentsEditors = function () {

		    var handleSummernote = function () {
		        $('.summernote').summernote({
		        	height: 300,
		        });
		        //API:
		        //var sHTML = $('#summernote_1').code(); // get code
		        //$('#summernote_1').destroy(); // destroy
		    }

		    return {
		        //main function to initiate the module
		        init: function () {
		            handleSummernote();
		        }
		    };

		}();
		
		ComponentsEditors.init();
		ComponentsPickers.init();
		ComponentsIonSliders.init();
		FormFileUpload.init();

		$(document).bind('drop dragover', function (e) {
		    e.preventDefault();
		});

		$(document).bind('dragover', function (e) {
		    var dropZone = $('#dropzone'),
		        timeout = window.dropZoneTimeout;
		    if (!timeout) {
		        dropZone.addClass('in');
		    } else {
		        clearTimeout(timeout);
		    }
		    var found = false,
		        node = e.target;
		    do {
		        if (node === dropZone[0]) {
		            found = true;
		            break;
		        }
		        node = node.parentNode;
		    } while (node != null);
		    if (found) {
		        dropZone.addClass('hover');
		    } else {
		        dropZone.removeClass('hover');
		    }
		    window.dropZoneTimeout = setTimeout(function () {
		        window.dropZoneTimeout = null;
		        dropZone.removeClass('in hover');
		    }, 100);
		});

		$('#fileupload').bind('fileuploadprogress', function (e, data) {
		    // Log the current bitrate for this upload:
		    console.log(data.bitrate);
		});

		$('#course-title').html('{{ $course->title }}');
		$('#course-teacher').html('{{ $course->teacher->display_name }}');
		$('#course-main-image').html('<img src="{{ $course->main_picture }}" class="img-responsive" alt="">');

	</script>