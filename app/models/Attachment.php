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
    			return $path.'TXT.png';
    			break;
    		# CSS
    		case 'text/css':
    			return $path.'CSS.png';
    			break;
    		# HTML
    		case 'text/html':
    		case 'text/x-server-parsed-html':
    			return $path.'HTML.png';
    			break;
    		# XML
    		case 'text/xml':
    		case 'application/xml':
    			return $path.'XML.png';
    			break;
    		# C++
    		case 'text/x-c':
    			return $path.'C.png';
    			break;
            case 'text/x-h':
                return $path.'H.png';
                break;
    		# Javascript
    		case 'text/javascript':
    		case 'text/ecmascript':
    		case 'application/x-javascript':
    		case 'application/javascript':
    		case 'application/ecmascript':
    			return $path.'JS.png';
    			break;
    		# Java
    		case 'text/x-java-source':
    		case 'application/java':
    		case 'application/java-byte-code':
    		case 'application/x-java-class':
    			return $path.'JAVA.png';
    			break;
    		# Bash
    		case 'application/x-bsh':    		
    		case 'application/x-sh':    		
    		case 'application/x-shar':    		
    		case 'text/x-script.sh':          
                return $path.'EXE.png';
                break;		
            # Images
            case 'image/png':
                return $path.'PNG.png';
                break;
            case 'image/gif':
                return $path.'GIF.png';
                break;
            case 'image/jpeg':
    			return $path.'JPG.png';
    			break;
    		# Audio
    		case 'audio/mpeg':
    		case 'audio/x-mpeg':
                return $path.'MPEG.png';
                break;
            case 'audio/mpeg3':
            case 'audio/x-mpeg-3':
                return $path.'MP3.png';
                break;
            case 'audio/wav':
            case 'audio/x-wav':
                return $path.'WAV.png';
                break;
            case 'audio/aiff':
            case 'audio/x-aiff':
    			return $path.'AIFF.png';
    			break;
            case 'audio/midi':
            case 'audio/x-mid':
            case 'audio/x-midi':
                return $path.'MIDI.png';
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
    			return $path.'AVI.png';
    			break;
            case 'video/mpeg':
            case 'video/x-mpeg':
            case 'video/x-mpeq2a':
                return $path.'MP4.png';
                break;
            case 'video/quicktime':
            case 'video/x-qtc':
            case 'video/x-sgi-movie':
                return $path.'MOV.png';
                break;
    		# PDF
    		case 'application/pdf':
    			return $path.'PDF.png';
    			break;
    		# Word
    		case 'application/msword':
                return $path.'DOC.png'
    		case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                return $path.'DOCX.png'; #less DOC DOCX
                break;
            # Power Point
            case 'application/mspowerpoint':
            case 'application/powerpoint':
                return $path.'PPT.png'; #PPT PPTX
                break;
            case 'application/vnd.ms-powerpoint':
            case 'application/x-mspowerpoint':
                return $path.'PPTX.png'; #PPT PPTX
                break;
            # Excel
            case 'application/excel':
            case 'application/x-excel':
                return $path.'XLS.png'; #XLS XLSX
                break;
            case 'application/x-msexcel':
            case 'application/vnd.ms-excel':
                return $path.'XLSX.png'; #XLS XLSX
                break;
            # Libre Office
            case 'application/vnd.oasis.opendocument.text':
                return $path.'ODT.png';
                break;
            case 'application/vnd.oasis.opendocument.presentation':
                return $path.'ODP.png'; #less
                break;
            case 'application/vnd.oasis.opendocument.spreadsheet':
    			return $path.'ODS.png';
    			break;
    		# EXE
    		case 'application/octet-stream':
    			return $path.'EXE.png';
    			break;
    		# SWF
    		case 'application/x-shockwave-flash':
                return $path.'SWF.png'; #less
                break;
            # Compressed
            case 'application/x-compressed':
            case 'application/x-zip-compressed':
            case 'application/zip':
            case 'multipart/x-zip':
                return $path.'ZIP.png';
                break;
            case 'application/x-gzip':
            case 'multipart/x-gzip':
                return $path.'GZ.png';
                break;
            case 'application/x-tar':
                return $path.'TAR.png';
                break;
            case 'application/x-rar-compressed':
    			return $path.'RAR.png';
                break;
            case 'application/x-gtar':
    			return $path.'GTAR.png'; #less
    			break;
            case 'application/gnutar':
                return $path.'TGZ.png'; #less
                break;
    		default:
    			return $path.'UNKNOWN.png';
    			break;

    	}

    }

    public function getSize(){

    	return BaseController::bitesFormat( $this->size );

    }

}