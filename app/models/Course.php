<?php

class Course extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'courses';

    protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected static $slug_counter = 0;

    public static $upload_folder = '/uploads/courses/';

    const DEFAULT_MAIN_PICTURE = '/uploads/courses/defaults/200x200.gif';

    const DEFAULT_COVER_PICTURE = '/uploads/courses/defaults/1000x200.gif';

    const DEFAULT_THUMBNAIL_PICTURE = '/uploads/courses/defaults/100x100.gif';

    const DEFAULT_ALL_COURSES_ROUTE = '/cursos';

    const DEFAULT_VIEW_COURSE_ROUTE = '/curso/';

    public function contributors(){

        return $this->belongsToMany('User', 'contributors', 'course_id', 'user_id')->where('contributors.deleted_at','=',null);

    }

    public function contributions(){

        return $this->hasMany('Contributor', 'course_id')->where('contributors.deleted_at','=',null);

    }

    public function contributionOf($teacher){

        $contrib = false;

        foreach($this->contributions as $contribution):
            if($contribution->user_id == $teacher->id):
                $contrib = $contribution;
            endif;
        endforeach;

        return $contrib;

    }


    public function contributionStatus($teacher){

        if(($contribution = $this->contributionOf($teacher)) != false) return $contribution->status;

        return false;

    }

    public function isContributor($teacher){

        $bool = false;

        foreach($this->contributors as $contributor):
            if($contributor->id == $teacher->id):
                $bool = true;
            endif;
        endforeach;

    	return $bool;

    }

    public function noncontributors(){

        if( $role = Role::getByName( 'teacher' ) ):

            $users = User::where( 'role_id', '=', $role->id )->where( 'status', '=', 'active' );

            foreach($this->contributors as $contributor):
                $users = $users->where('id','!=',$contributor->id);
            endforeach;

            $users = $users->where('id','!=',$this->author_id);

            return $users->get();

        else:

            return false;

        endif;

    }

    public function teacher(){

    	return $this->belongsTo('User','author_id');

    }

    public function inscriptions(){

    	return $this->hasMany('Inscription', 'course_id');

    }

    public function postulations(){

    	return $this->hasMany('Inscription', 'course_id')->where('inscriptions.status','=','inactive');

    }

    public function accepted(){

    	return $this->hasMany('Inscription', 'course_id')->where('inscriptions.status','=','active');

    }

    public function denied(){

    	return $this->hasMany('Inscription', 'course_id')->where('inscriptions.status','=','rejected');

    }

    public function postulates(){

    	return $this->belongsToMany('User', 'inscriptions')->where('inscriptions.status','=','inactive');

    }

    public function students(){

    	return $this->belongsToMany('User', 'inscriptions')->where('inscriptions.status','=','active');

    }

    public function rejected(){

    	return $this->belongsToMany('User', 'inscriptions')->where('inscriptions.status','=','rejected');

    }

    public function auditories(){

    	return $this->hasMany('Auditory', 'course_id');

    }

    public function followStudent( $user ){

    	return $this->hasMany('Auditory', 'course_id')->where('user_id','=', $user->id );

    }

    public function modules(){

    	return $this->hasMany('Module', 'course_id')->orderBy('modules.order', 'ASC');

    }

    public function lessons(){

    	return $this->hasManyThrough('Lesson', 'Module')->orderBy('lessons.order', 'ASC');

    }

    public function discussions(){

        return $this->morphMany('Discussion','discussionable');

    }

    public function recentdiscussions(){

    	return $this->morphMany('Discussion','discussionable')->orderBy('created_at', 'DESC');

    }

    public function achievements(){

        return $this->hasMany('CourseAchievement', 'course_id');

    }

    public function activeachievements(){

    	return $this->achievements()->where('course_achievements.status','=','active');

    }

    public function evaluations(){

        return $this->morphMany('Evaluation', 'evaluationable')->orderBy('created_at');

    }

    public function questions(){

        return $this->hasMany('CourseQuestion', 'course_id');

    }

    public function discussionsOf($user){

        $results = array();
        $counter = 0;

        foreach($this->lessons as $lesson):
            if($lesson->discussions->count() > 0 ):
                foreach($lesson->discussions as $discussion):
                    if($discussion->user_id == $user->id) $results[] = $discussion; $counter++;
                    if($discussion->children->count() > 0 ):
                        foreach($discussion->children as $child):
                            if($child->user_id == $user->id) $results[] = $child; $counter++;
                        endforeach;
                    endif;
                endforeach;
            endif;
        endforeach;

        foreach($this->discussions as $discussion):
            if($discussion->user_id == $user->id) $results[] = $discussion; $counter++;
            if($discussion->children->count() > 0 ):
                foreach($discussion->children as $child):
                    if($child->user_id == $user->id) $results[] = $child; $counter++;
                    if($child->children->count() > 0 ):
                        foreach($child->children as $grandchild):
                            if($grandchild->user_id == $user->id) $results[] = $grandchild; $counter++;
                        endforeach;
                    endif;
                endforeach;
            endif;
        endforeach;

        return $results;

    }

    public function discussionsThumbsupsOf($user){

        $discussions = $this->discussionsOf($user);
        $counter = 0;

        foreach($discussions as $comment):
            $counter += $comment->thumbsups->count();
        endforeach;

        return $counter;

    }

    public function discussionsInDiscussionsOf($user){

        $results = array();
        $counter = 0;

        foreach($this->discussions as $discus):
            if($discus->children->count() > 0 ):
                foreach($discus->children as $discussion):
                    if($discussion->user_id == $user->id) $results[] = $discussion; $counter++;
                    if($discussion->children->count() > 0 ):
                        foreach($discussion->children as $child):
                            if($child->user_id == $user->id) $results[] = $child; $counter++;
                        endforeach;
                    endif;
                endforeach;
            endif;
        endforeach;

        return $results;

    }

    public function discussionsInLessonsOf($user){

        $results = array();
        $counter = 0;

        foreach($this->lessons as $lesson):
            if($lesson->discussions->count() > 0 ):
                foreach($lesson->discussions as $discussion):
                    if($discussion->user_id == $user->id) $results[] = $discussion; $counter++;
                    if($discussion->children->count() > 0 ):
                        foreach($discussion->children as $child):
                            if($child->user_id == $user->id) $results[] = $child; $counter++;
                        endforeach;
                    endif;
                endforeach;
            endif;
        endforeach;

        return $results;

    }

    public function discussionsInLessonsThumbsupsOf($user){

        $discussions = $this->discussionsOf($user);
        $counter = 0;

        foreach($discussions as $comment):
            $counter += $comment->thumbsups->count();
        endforeach;

        return $counter;

    }


    public function discussionsInLessonsBannedOf($user){

        $discussions = $this->discussionsOf($user);
        $counter = 0;

        foreach($discussions as $comment):
            $counter += $comment->banned->count();
        endforeach;

        return $counter;

    }

    public function attachmentsInLessonsOf($user){

        $results = array();
        $counter = 0;

        foreach($this->lessons as $lesson):
            if($lesson->discussions->count() > 0 ):
                foreach($lesson->discussions as $discussion):
                    if($discussion->user_id == $user->id AND $discussion->attachments->count() > 0 ) $results[] = $discussion->attachments()->first(); $counter++;
                    if($discussion->children->count() > 0 ):
                        foreach($discussion->children as $child):
                            if($child->user_id == $user->id AND $child->attachments->count() > 0 ) $results[] = $child->attachments()->first(); $counter++;
                        endforeach;
                    endif;
                endforeach;
            endif;
        endforeach;

        return $results;

    }

    public function activitiesOf($user){

        $results = array();
        $counter = 0;

        foreach($this->lessons as $lesson):
            if($lesson->evaluations->count() > 0 ):
                foreach($lesson->evaluations as $evaluation):
                    $tmp = $evaluation->testsOf( $user );
                    if(count($tmp) > 0):
                        foreach($tmp as $test):
                            $results[] = $test; $counter++;
                        endforeach;
                    endif;
                endforeach;
            endif;
        endforeach;

        return $results;

    }

    public function averageOf($user){

        $points = 0;
        $counter = 0;

        foreach($this->lessons as $lesson):
            if($lesson->evaluations->count() > 0 ):
                foreach($lesson->evaluations as $evaluation):
                    $tmp = $evaluation->testsOf( $user );
                    if(count($tmp) > 0):
                        foreach($tmp as $test):
                            $points += $test->percentage; $counter++;
                        endforeach;
                    endif;
                endforeach;
            endif;
        endforeach;
        
        if($this->evaluations->count() > 0 ):
            foreach($this->evaluations as $evaluation):
                $tmp = $evaluation->testsOf( $user );
                if(count($tmp) > 0):
                    foreach($tmp as $test):
                        $points += $test->percentage; $counter++;
                    endforeach;
                endif;
            endforeach;
        endif;

        if($counter > 0 ):

            return $points/$counter;
        
        else:

            return 0;

        endif;

    }

    public function average(){

        $students = $this->students;

        $averages = 0;
        $counter = 0;

        if($students):

            foreach($students as $student):
                $averages += $this->averageOf($student);
                $counter++;
            endforeach;

            return $averages/$counter;

        else:

            return 0;

        endif;

    }

    public function getRoute(){

        return self::DEFAULT_VIEW_COURSE_ROUTE.$this->name;

    }

    public function getSummary( $length = 500 ){

        $text = html_entity_decode(strip_tags( $this->description ));

        if(strlen($text) > $length) return substr($text, 0, $length).'...';

        return $text;

    }

    public function getRoundOptimizedMainPicture( $width = '200' ){

        $image = public_path().$this->main_picture;

        $attr = getimagesize($image);

        $pivot = 'width';

        if($attr[0] > $attr[1]):

            $pivot = 'height';

        endif;

        return HTML::image($this->main_picture, $this->title, array($pivot => $width));

    }

    public function getRoundOptimizedThumbnailPicture( $width = '100' ){

        $image = public_path().$this->thumbnail_picture;

        $attr = getimagesize($image);

        $pivot = 'width';

        if($attr[0] > $attr[1]):

            $pivot = 'height';

        endif;

        return HTML::image($this->thumbnail_picture, $this->title, array($pivot => $width));

    }

    public function beststudents(){

        return $this->students;

    }

    public function getAccepted($user){

        $inscription = $this->accepted()->where('inscriptions.user_id','=', $user->id)->first();

        return $inscription;

    }

    public function hasAccepted($user){

        $inscription = $this->getAccepted($user);

        if($inscription != null) return true;
        else return false;

    }

    public function iveAccepted(){

        return $this->hasAccepted(Auth::user());

    }

    public function getPostuled($user){

        $inscription = $this->postulations()->where('inscriptions.user_id','=', $user->id)->first();

        return $inscription;

    }

    public function hasPostuled($user){

        $inscription = $this->getPostuled($user);

        if($inscription != null) return true;
        else return false;

    }

    public function ivePostuled(){

        return $this->hasPostuled(Auth::user());

    }

    public function getInscription($user){

        $inscription = $this->inscriptions()->where('inscriptions.user_id','=', $user->id)->first();

        return $inscription;

    }

    public function hasInscription($user){

        $inscription = $this->getInscription($user);

        if($inscription != null) return true;
        else return false;

    }

    public function iveInscription(){

        return $this->hasInscription(Auth::user());

    }

    public function lessonParticipationOf($student){

        $counter = 0;

        foreach($this->lessons as $lesson):
            $lesson->hasBeenViewedBy($student) ? $counter++ : $counter;
        endforeach;

        return $counter;

    }

    public function getMainPicture(){

        $image = $this->main_picture;

        if($image != ''):

            if(File::exists(public_path().$image)):

                return $image;

            else:

                return Course::DEFAULT_MAIN_PICTURE;

            endif;

        else:

            return Course::DEFAULT_MAIN_PICTURE;

        endif;

    }

    public function getCoverPicture(){

        $image = $this->cover_picture;

        if($image != ''):

            if(File::exists(public_path().$image)):

                return $image;

            else:

                return Course::DEFAULT_COVER_PICTURE;

            endif;

        else:

            return Course::DEFAULT_COVER_PICTURE;

        endif;

    }

    public static function getByName( $name ){

        $course = self::where('name','=',$name)->first();

        if($course == null) throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("No se Encontró el curso");

        return $course; 

    }

    public static function findPermalinkCounter( $name ){

        $slug = $name.'-'.(++self::$slug_counter);

        if( count(self::where('name', '=', $slug)->get()) > 0 ):

            return self::findPermalinkCounter( $name );

        else:

            return $slug;

        endif;

    }

    public static function setPermalink( $title ){

        $name = Str::slug( $title );

        if( $counter = count(self::where('name', '=', $name)->get()) ):

            return self::findPermalinkCounter( $name );

        else:

            return $name;

        endif;

    }

    public static function _get( $status = 'active' ){

        return self::where( 'status', '=', $status )->get();

    }

    public static function actives(){

        return self::_get('active');

    }

    public static function inactives(){

        return self::_get('inactive');

    }

    public static function makeFullDirectory( $name ){

        $path = public_path().self::$upload_folder.$name;

        File::makeDirectory($path.'/images', $mode = 0755, true, true);
        File::makeDirectory($path.'/files', $mode = 0755, true, true);
        File::makeDirectory($path.'/lessons', $mode = 0755, true, true);
        File::makeDirectory($path.'/discussions', $mode = 0755, true, true);

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

    public static function getRoundOptimizedImage( $route, $width = '200', $title = '' ){

        $image = public_path().$route;

        $attr = getimagesize($image);

        $pivot = 'width';

        if($attr[0] > $attr[1]):

            $pivot = 'height';

        endif;

        return HTML::image($route, $title, array($pivot => $width));

    }



}