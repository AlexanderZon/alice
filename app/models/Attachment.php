<?php

class Attachment extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attachments';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function attachmentable(){

    	return $this->morphTo();
    	
    }

    public function image(){

    	$path = '/uploads/attachments/mimetypes/';

    	switch($this->mime){
    		# Text Plain
    		case 'text/plain':
    			return $path.'text-plain.png';
    			break;
    		# CSS
    		case 'text/css':
    			return $path.'text-css.png';
    			break;
    		# HTML
    		case 'text/html':
    		case 'text/x-server-parsed-html':
    			return $path.'text-html.png';
    			break;
    		# XML
    		case 'text/xml':
    		case 'application/xml':
    			return $path.'text-plain.png';
    			break;
    		# C++
    		case 'text/x-c':
    		case 'text/x-h':
    			return $path.'text-plain.png';
    			break;
    		# Javascript
    		case 'text/javascript':
    		case 'text/ecmascript':
    		case 'application/x-javascript':
    		case 'application/javascript':
    		case 'application/ecmascript':
    			return $path.'text-plain.png';
    			break;
    		# Java
    		case 'text/x-java-source':
    		case 'application/java':
    		case 'application/java-byte-code':
    		case 'application/x-java-class':
    			return $path.'text-plain.png';
    			break;
    		# Bash
    		case 'application/x-bsh':    		
    		case 'application/x-sh':    		
    		case 'application/x-shar':    		
    		case 'text/x-script.sh':    		
    			return $path.'text-plain.png';
    			break;
    		# Images
    		case 'image/png':
    		case 'image/gif':
    		case 'image/jpeg':
    			return $this->route;
    			break;
    		# Audio
    		case 'audio/mpeg':
    		case 'audio/x-mpeg':
    		case 'audio/mpeg3':
    		case 'audio/x-mpeg-3':
    		case 'audio/wav':
    		case 'audio/x-wav':
    		case 'audio/aiff':
    		case 'audio/x-aiff':
    		case 'audio/midi':
    		case 'audio/x-mid':
    		case 'audio/x-midi':
    			return $path.'audio.png';
    			break;
    		# Video
    		case 'video/animaflex':
    		case 'video/x-ms-asf':
    		case 'video/avi':
    		case 'video/msvideo':
    		case 'video/x-msvideo':
    		case 'video/avs-video':
    		case 'video/x-dv':
    		case 'video/dv':
    		case 'video/x-dl':
    		case 'video/dl':
    		case 'video/x-fli':
    		case 'video/fli':
    		case 'video/mpeg':
    		case 'video/x-mpeg':
    		case 'video/x-mpeq2a':
    		case 'video/quicktime':
    		case 'video/x-qtc':
    		case 'video/x-sgi-movie':
    			return $path.'video.png';
    			break;
    		# PDF
    		case 'application/pdf':
    			return $path.'pdf.png';
    			break;
    		# Word
    		case 'application/msword':
    		case 'application/msword':
    		case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
    			return $path.'word.png';
    			break;
    		# Power Point
    		case 'application/mspowerpoint':
    		case 'application/vnd.ms-powerpoint':
    		case 'application/powerpoint':
    		case 'application/x-mspowerpoint':
    		case 'application/mspowerpoint':
    			return $path.'powerpoint.png';
    			break;
    		# Excel
    		case 'application/excel':
    		case 'application/x-excel':
    		case 'application/x-msexcel':
    		case 'application/vnd.ms-excel':
    			return $path.'excel.png';
    			break;
    		# EXE
    		case 'application/octet-stream':
    			return $path.'text-plain.png';
    			break;
    		# SWF
    		case 'application/x-shockwave-flash':
    			return $path.'text-plain.png';
    			break;
    		# Compressed
    		case 'application/zip':
    		case 'application/x-gtar':
    		case 'application/x-compressed':
    		case 'application/x-zip-compressed':
    		case 'application/x-gzip':
    		case 'multipart/x-gzip':
    		case 'multipart/x-zip':
    		case 'application/x-tar':
    		case 'application/gnutar':
    		case 'application/x-compressed':
    			return $path.'text-plain.png';
    			break;
    		default:
    			return $path.'text-plain.png';
    			break;

    	}

    }

    public function getSize(){

    	return BaseController::bitesFormat( $this->size );

    }

}