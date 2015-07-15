<?php

class Notification extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notifications';

    protected $fillable = [];

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    
    public function user(){

    	return $this->belongsTo('User', 'user_id');

    }
    
    /*
    public $_title = '';
    public $_description = '';
    public $_type = '';
    public $_id = '';
    public $_users = array();
    public $_icon = '';
    public $_route = '';
    public $_status = 'fired';
    public $_picture = '';


    public function newStudent( $name ){

    	self::$_users = User::getCoordinators();

    	self::$_title = 'Nuevo Estudiante Registrado';
    	self::$_description = $name . ' se ha registrado en el sistema y está esperando por su verificación';
    	self::$_icon = 'fa-user';
    	self::$_route = '/coordinators/students/inactive';

    	$this->_create();

    }

    public function _create(){

			self::create( array(
				'title' => 'Nuevo Estudiante Registrado',
				'description' => ' se ha registrado en el sistema y está esperando por su verificación',
				'notificationable_type' => '',
				'notificationable_id' => '',
				'route' => '/coordinators/students/inactive',
				'status' => 'fired',
				'icon' => 'fa-user',
				'user_id' => 3
				));

    }*/

}