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

    protected static $upload_folder = '/uploads/users/';

    const DEFAULT_MAIN_PICTURE = '/uploads/users/defaults/200x200.gif';

    const DEFAULT_COVER_PICTURE = '/uploads/users/defaults/1000x200.gif';

    const DEFAULT_THUMBNAIL_PICTURE = '/uploads/users/defaults/100x100.gif';

    public $DEFAULT_MALE_AVATARES = array(
    	'/uploads/users/defaults/male_avatar_1.jpg',
    	'/uploads/users/defaults/male_avatar_2.jpg',
    	'/uploads/users/defaults/male_avatar_3.jpg',
    	'/uploads/users/defaults/male_avatar_4.jpg',
    	);

    public $DEFAULT_FEMALE_AVATARES = array(
    	'/uploads/users/defaults/female_avatar_1.jpg',
    	'/uploads/users/defaults/female_avatar_2.jpg',
    	'/uploads/users/defaults/female_avatar_3.jpg',
    	'/uploads/users/defaults/female_avatar_4.jpg',
    	);

    public function selectRandomAvatar( $sex ){

    	$picture = '';

    	switch( $sex ):
    		case 'male':
    			$picture = $this->DEFAULT_MALE_AVATARES[rand(0,count($this->DEFAULT_MALE_AVATARES)-1)];
    			break;
    		case 'female':
    			$picture = $this->DEFAULT_FEMALE_AVATARES[rand(0,count($this->DEFAULT_FEMALE_AVATARES)-1)];
    			break;
    		default:
    			$picture = $this->DEFAULT_MALE_AVATARES[rand(0,count($this->DEFAULT_MALE_AVATARES)-1)];
    			break;
    	endswitch;

    	return $picture;

    }

    public function getAvatar(){

    	if($this->picture == ''):

    		$this->picture = $this->selectRandomAvatar($this->sex);
    		$this->save();

    	endif;

    	return $this->picture;

    }

    public static function makeFullDirectory( $name ){

        $path = public_path().self::$upload_folder.$name;

        File::makeDirectory($path.'/images', $mode = 0755, true, true);
        File::makeDirectory($path.'/files', $mode = 0755, true, true);

        return $path;

    }

    public static function validatePicture( $image ){

        $validator = Validator::make(
            array(
                'image' => $image
                ), 
            array(
                'image' => 'required|mimes:png,jpeg,gif'
                ),
            array(
                'mimes' => 'Tipo de imagen inválido, solo se admite los formatos PNG, JPEG, y GIF'
                )
            );

        if( $validator->fails() ):

            return false;

        else:

            return true;

        endif;

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