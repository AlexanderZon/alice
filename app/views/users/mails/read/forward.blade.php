
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/jquery-multi-select/css/multi-select.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-summernote/summernote.css">

<form class="inbox-compose form-horizontal" id="compose-mail" action="#" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="token" value="{{ $token }}">
	<input type="hidden" name="type" value="forward">
	<input type="hidden" name="action" value="send">
	<div class="inbox-compose-btn">
		<button class="send-btn btn blue"><i class="fa fa-check"></i>Enviar</button>
		<button class="discard-btn btn">Descartar</button>
		<button class="delete-btn btn">Borrador</button>
	</div>
	<div class="inbox-form-group mail'to">
		<label class="control-label">Para</label>
		<div class="controls">
			<select class="bs-select form-control" name="to[]" multiple data-show-subtext="true" placeholder="Seleccione un destinatario">
				@foreach($tousers as $user)
					<option value="{{ Hashids::encode($user->id) }}" data-subtext="{{ $user->username }}" {{ $message->hasTo($user) ? 'selected' : '' }}>{{ $user->first_name }} {{ $user->last_name }}</option>
				@endforeach
			</select>
			<!-- <input type="hidden" id="loading-select" class="form-control select2"> -->
		</div>
	</div>

	<!-- <div class="inbox-form-group mail-to">
		<label class="control-label">Para:</label>
		<div class="controls controls-to">
			<input type="text" class="form-control" name="to" value="fiona.stone@arthouse.com, lisa.wong@pixel.com, jhon.doe@gmail.com">
			<span class="inbox-cc-bcc">
			<span class="inbox-cc " style="display:none">
			Cc </span>
			<span class="inbox-bcc">
			Bcc </span>
			</span>
		</div>
	</div> -->
	<!-- <div class="inbox-form-group input-cc">
		<a href="javascript:;" class="close">
		</a>
		<label class="control-label">Cc:</label>
		<div class="controls controls-cc">
			<input type="text" name="cc" class="form-control" value="jhon.doe@gmail.com, kevin.larsen@gmail.com">
		</div>
	</div>
	<div class="inbox-form-group input-bcc display-hide">
		<a href="javascript:;" class="close">
		</a>
		<label class="control-label">Bcc:</label>
		<div class="controls controls-bcc">
			<input type="text" name="bcc" class="form-control">
		</div>
	</div> -->
	<div class="inbox-form-group">
		<label class="control-label">Asunto:</label>
		<div class="controls">
			<input type="text" class="form-control" name="subject" value="{{ $message->subject }}">
		</div>
	</div>
	<div class="inbox-form-group">
		<div class="controls-row">
			<textarea class="form-control summernote" name="message" rows="12">
				{{ $message->message }}
			</textarea>
			<!--blockquote content for reply message, the inner html of reply_email_content_body element will be appended into wysiwyg body. Please refer Inbox.js loadReply() function. -->
			<!-- <div id="reply_email_content_body" class="hide">
				<input type="text">
				<br>
				<br>
				<blockquote>
					 Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. <br>
					<br>
					 Consectetuer adipiscing elit, sed diam nonummy nibh euismod exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. <br>
					<br>
					 All the best,<br>
					 Lisa Nilson, CEO, Pixel Inc.
				</blockquote>
			</div> -->
		</div>
	</div>
	<div class="inbox-compose-attachment">
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<span class="btn green fileinput-button">
		<i class="fa fa-plus"></i>
		<span>
		Añadir Archivos... </span>
		<input type="file" name="files[]" multiple>
		</span>
		<!-- The table listing the files available for upload/download -->
		<table role="presentation" class="table table-striped margin-top-10">
		<tbody class="files">
			@if(count($message->attachments) > 0)
				@foreach($message->attachments as $attachment)
				    <tr class="template-download fade in">
				        <td class="name" width="30%"><span href="{{ $attachment->route }}" title="{{ $attachment->name }}" data-gallery download="{{ $attachment->name }}">{{ $attachment->name }}</span></td>
				        <td class="size" width="40%"><span>{{ $attachment->getSize() }}</span></td>
				        @if ($attachment->status == 'error')
				            <td class="error" width="20%" colspan="2"><span class="label label-danger">Error</span> {{ $attachment->route }}</td>
				        @else
				            <td colspan="2"></td>
				        @endif
				        <td class="cancel" width="10%" align="right">
				            <button class="btn btn-sm red cancel" data-attachmentid="{{ Crypt::encrypt($attachment->id) }}">
		                    	<i class="fa fa-times"></i>
		                   </button>
				        </td>
				    </tr>
				@endforeach
			@endif 
		</tbody>
		</table>
	</div>
	<!--- DEFAULT -->
	<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="name" width="30%"><span>{%=file.name%}</span></td>
        <td class="size" width="40%"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" width="20%" colspan="2"><span class="label label-danger">Error</span> {%=file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <p class="size">{%=o.formatFileSize(file.size)%}</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                   <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                   </div>
            </td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel" width="10%" align="right">{% if (!i) { %}
            <button class="btn btn-sm red cancel">
                       <i class="fa fa-ban"></i>
                       <span>Cancel</span>
                   </button>
        {% } %}</td>
    </tr>
{% } %}
	</script>
	<!-- The template to display files available for download -->
	<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td class="name" width="30%"><span>{%=file.name%}</span></td>
            <td class="size" width="40%"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" width="30%" colspan="2"><span class="label label-danger">Error</span> {%=file.error%}</td>
        {% } else { %}
            <td class="name" width="30%">
                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size" width="40%"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete" width="10%" align="right">
            <button class="btn default btn-sm" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                <i class="fa fa-times"></i>
            </button>
        </td>
    </tr>
{% } %}
	</script>
	<div class="inbox-compose-btn">
		<button class="send-btn btn blue"><i class="fa fa-check"></i>Enviar</button>
		<button class="discard-btn btn">Descartar</button>
		<button class="delete-btn btn">Borrador</button>
	</div>
</form>
	
<script type="text/javascript" src="/assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/select2/select2_locale_es.js"></script>
<script type="text/javascript" src="/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script src="/assets/admin/pages/scripts/components-dropdowns.js"></script>

<script type="text/javascript" src="/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-summernote/summernote.js" type="text/javascript"></script>

<script src="/assets/admin/pages/scripts/components-form-tools.js" type="text/javascript"></script>

<script type="text/javascript">

	function userFormatResult(user) {
        var markup = "<table class='user-result'><tr>";
        if (user.posters !== undefined && user.posters.thumbnail !== undefined) {
            markup += "<td valign='top'><img src='" + user.posters.thumbnail + "'/></td>";
        }
        markup += "<td valign='top'><h5>" + user.first_name + " " + user.last_name + " &lt;" + user.email + "&gt; " + "</h5>";
        if (user.critics_consensus !== undefined) {
            markup += "<div class='user-synopsis'>" + user.username + "</div>";
        } else if (user.synopsis !== undefined) {
            markup += "<div class='user-synopsis'>" + user.display_name + "</div>";
        }
        markup += "</td></tr></table>"
        return markup;
    }

    function userFormatSelection(user) {
        return user.title;
    }
    $('.summernote').summernote({
    	height: 300,
    });
    $('.bs-select').select2({
            iconBase: 'fa',
            tickIcon: 'fa-check'
        });
</script>