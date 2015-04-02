<?php namespace Administrators;

class DashboardController extends \BaseController {

	public function __construct(){

		parent::__construct();

		$this->beforeFilter('auth');

		$this->beforeFilter('capabilities');

		$this->beforeFilter('parameters');

		$this->beforeFilter('arguments');

		$this->afterFilter('auditory');
		
		self::$views = 'administrators.dashboard';

		self::$route = '/administrators';

		self::$name = 'administrators_dashboard';

		self::$title = 'Administrador';

		self::$description = 'Administrador del Sistem Alice';

		self::fixSection('index', 'Inicio');

		self::setArguments();

	}

	/**
	 * Display a listing of the resource.
	 * GET /
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		/*$args = array(
			'module' => $this->module,
			// 'audits' => Audits::orderBy('created_at','DESC')->take(100)->get(),
			'audits' => Auth::user()->audits()->orderBy('created_at','DESC')->get(),
			'incomes' => self::incomes(),
			'projects' => self::projects(),
			'tasks' => self::tasks(),
			);*/
		/*Audits::add(Auth::user(), array(
			'name' => 'dashboard_get_index',
			'title' => 'Escritorio',
			'description' => 'Vizualización del Escritorio'
			), 'READ');*/
		return self::make('index');
	}

	private function getBreadcumbs(){

		return array();

	}

	/*private static function incomes(){

		$sale_orders = SaleOrders::all();
		$receipts = Receipts::all();

		$incomes = array(
			'received' => 0,
			'concreted' => 0,
			'percentage' => 0
			);

		foreach($sale_orders as $sale_order):
			$incomes['concreted'] += $sale_order->budget;
		endforeach;

		foreach($receipts as $receipt):
			$incomes['received'] += $receipt->amount;
		endforeach;

		$incomes['percentage'] = number_format($incomes['received']/$incomes['concreted']*100, 2);

		$incomes = array(
			'received' => self::format($incomes['received']),
			'concreted' => self::format($incomes['concreted']),
			'percentage' => self::format($incomes['percentage'])
			);

		return $incomes;

	}

	private static function projects(){

		$actives = Projects::getActive();
		$inactives = Projects::getInactive();

		$args = array(
			'all' => count($actives) + count($inactives),
			'active_percentage' => number_format(count($actives)/(count($actives) + count($inactives))*100, 2),
			'actives' => $actives,
			'inactive' => $inactives,
			);

		return $args;

	}

	private static function tasks(){

		$projects = Projects::getActive();

		$done = array();
		$inactive = array();
		$active = array();

		foreach( $projects as $project ):

			foreach( $project->tasks as $task ):

				if( $task->status == 'done' ):

					$done[] = $task;

				elseif( $task->status == 'active' ):

					$active[] = $task;

				else:

					$inactive[] = $task;

				endif;

			endforeach;

		endforeach;

		$args = array(
			'all' => count($active)+count($inactive)+count($done),
			'done' => $done,
			'active' => $active,
			'inactive' => $inactive,
			'done_percentage' => number_format(count($done)/(count($done)+count($active)+count($inactive))*100, 2),
			);

		return $args;

	}*/

}