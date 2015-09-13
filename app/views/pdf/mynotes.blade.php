<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{{ 'Notas del Curso : '.$lesson->module->course->title.' en Lección : '.$lesson->title.'.' }}</title>
	<!-- BEGIN THEME STYLES -->
	<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
	<link href="{{ public_path() }}/assets/global/css/fonts.googleapis.com.css" rel="stylesheet" type="text/css"/>
	<!-- <link href="{{ public_path() }}/assets/global/plugins/bootstrap/css/bootstrap.pdf.css" rel="stylesheet" type="text/css"/> -->
	{{ HTML::style('/assets/global/plugins/bootstrap/css/bootstrap.pdf.css'); }}
	<link href="{{ public_path() }}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="{{ public_path() }}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="{{ public_path() }}/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="{{ public_path() }}/assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="{{ public_path() }}/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="{{ public_path() }}/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
	<link href="{{ public_path() }}/assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<style type="text/css">
	.border{

	}
</style>
	<header style="padding:5px;">
		<div>
			<span style="display:inline-block; width: 49%">
				<img src="{{ public_path('assets/images/logo_main.png') }}" style="width:200px"/>
			</span>
			<span style="display: inline-block; width: 49%">
				<div style="text-align: right">
					<p>Curso: {{ $course->title }}</p>
					<p>Lección: {{ $lesson->title }}</p>
				</div>
			</span>
		</div>
	</header>
	<section style="text-align: center">
		<h3>Notas</h3>
	</section>
	<section>
		@foreach($notes as $note)
			<div style="padding: 5px; border-left: 2px solid #428BCA; margin-top: 10px">
				<em style="font-size:8pt">{{ date('d/m/Y \a \l\a\s h:m a', strtotime($note->created_at)) }}</em><br>
				{{ $note->content }}
			</div>
		@endforeach
	</section>
</body>
</html>