<?php

class UserProfile extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_profiles';

	protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public function user(){

    	return $this->belongsTo('User', 'user_id', 'id');
    	
    }

    protected static $upload_folder = '/uploads/courses/';

    const DEFAULT_MAIN_PICTURE = '/uploads/courses/defaults/200x200.gif';

    const DEFAULT_COVER_PICTURE = '/uploads/courses/defaults/1000x200.gif';

    const DEFAULT_THUMBNAIL_PICTURE = '/uploads/courses/defaults/100x100.gif';

    public static function makeFullDirectory( $name ){

        $path = public_path().self::$upload_folder.$name;

        File::makeDirectory($path.'/images', $mode = 0755, true, true);
        File::makeDirectory($path.'/files', $mode = 0755, true, true);

        return $path;

    }

    public static function uploadPicture( $image, $name, $width, $height){
        
        $filename = self::$upload_folder.$name.'/images/'.GUID::generate().".".$image->getClientOriginalExtension();

        $path = public_path().$filename;

        if( self::validatePicture( $image )):
        
            Image::make( $image->getRealPath() )->resize( $width, null, function ($constraint) { 
                $constraint->aspectRatio(); 
                })->crop($width, $height, 0, 0)->save($path);

            return $filename;

        else:

            return false;

        endif;  

    }

    public static function uploadMainPicture($image, $name){

        $picture = self::uploadPicture( $image, $name, 200, 200);

        return $picture;
        
    }

    public static function uploadCoverPicture($image, $name){

        $picture = self::uploadPicture( $image, $name, 1000, 200);

        return $picture;
        
    }

    public static function uploadThumbnailPicture($image, $name){

        $picture = self::uploadPicture( $image, $name, 100, 100);

        return $picture;
        
    }

}