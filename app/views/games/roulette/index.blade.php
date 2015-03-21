<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>

	<link href="/assets/global/css/fonts.googleapis.com.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" type="text/css" href="/games/roulette/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="/games/roulette/css/roulette.css"/>
	<script type="text/javascript" src="/assets/global/plugins/jquery.min.js"></script>
</head>
<body>

	<div class="row content">

		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 score">
					<div class="col-md-4 col-sm-4 col-xs-4">
						<div class="col-md-6 col-sm-6 col-xs-0">Tiempo: </div>
						<div class="col-md-6 col-sm-6 col-xs-12" id="timer">00:00</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<div class="col-md-6 col-sm-6 col-xs-0">Puntos: </div>
						<div class="col-md-6 col-sm-6 col-xs-12" id="points">0</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<div class="col-md-6 col-sm-6 col-xs-0">Aciertos: </div>
						<div class="col-md-6 col-sm-6 col-xs-12" id="progress">0/0</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 score">
						<div class="progress">
						  	<div id="correct-progress" class="progress-bar progress-bar-striped progress-bar-success" style="width: 0%;position:relative;left:0;">
						    	<span class="sr-only"></span>
						  	</div>
						  	<div id="during-progress" class="progress-bar progress-bar-striped progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;;position:relative;left:0;">
						    	<span class="sr-only"></span>
						  	</div>
						</div>
					</div>
				</div>
			</div>
			

			<div class="row roulette center">
				<div class="col-md-8 col-sm-12 col-xs-12">
					<div id="roulette">
				        <div class="item1 item" data-color="red" data-action="clock">
				            <div class="roulette-element"><a href="#one"><i class="fa fa-clock-o"></i></a></div>
				        </div>
				        <div class="item2 item" data-color="purple" data-action="eraser">
				            <div class="roulette-element"><a href="#two"><i class="fa fa-eraser"></i></a></div>
				        </div>
				        <div class="item3 item" data-color="blue" data-action="flash">
				            <div class="roulette-element"><a href="#three"><i class="fa fa-flash"></i></a></div>
				        </div>
				        <div class="item4 item" data-color="sky" data-action="plus">
				            <div class="roulette-element"><a href="#four"><i class="fa fa-plus-circle"></i></a></div>
				        </div>
				        <div class="item5 item" data-color="green" data-action="refresh">
				            <div class="roulette-element"><a href="#five"><i class="fa fa-refresh"></i></a></div>
				        </div>
				        <div id="wrapper6">
				            <div class="item6 item" data-color="yellow" data-action="star">
				                <div class="roulette-element"><a href="#six"><i class="fa fa-star"></i></a></div>
				            </div>
				        </div>
				        <div id="circle" class="">
				        </div>
				    </div>
				   <!--  <div id="one" class="display-target">Welcome!<br>This changing effect is done by ...</div>
				   <div id="two" class="display-target">... having <code>&lt;div&gt;</code>s with <code>id</code>s ... </div>
				   <div id="three" class="display-target">... that have the style <code>display: none</code> and the style <pre style="text-align: left">:target {
				   display: block;
				   				}</pre>so that these messages appear when there is a hash tag like <code>#three</code> (look at the address bar!)</div>
				   <div id="four" class="display-target">Look at the source of this page ...</div>
				   <div id="five" class="display-target">... to see how the circular menu works.</div>
				   <div id="six" class="display-target">By Shaquin Trifonoff</div>
				   					<p><a href="http://stackoverflow.com/users/1421049/shaquin-trifonoff" title="My profile on Stack Overflow">By Shaquin Trifonoff</a></p> -->
				</div>
				<div class="col-md-3 col-sm-12 col-xs-12 left indications">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-clock-o"></i></div>
						<div class="col-md-10 col-sm-10 col-xs-10">Aumenta tu tiempo restante +30 segundos, si tu respuesta es correcta</div> 
					</div>
					<div class="row">
						<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-eraser"></i></div>
						<div class="col-md-10 col-sm-10 col-xs-10">Elimina tu última respuesta incorrecta, si tu respuesta es correcta</div> 
					</div>
					<div class="row">
						<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-flash"></i></div>
						<div class="col-md-10 col-sm-10 col-xs-10">Comodín de saltar pregunta</div> 
					</div>
					<div class="row">
						<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-plus-circle"></i></div>
						<div class="col-md-10 col-sm-10 col-xs-10">Duplica la cantidad de puntos pon una respuesta correcta</div> 
					</div>
					<div class="row">
						<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-refresh"></i></div>
						<div class="col-md-10 col-sm-10 col-xs-10">Tienes la opción de repetir si te equivocas</div> 
					</div>
					<div class="row">
						<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-star"></i></div>
						<div class="col-md-10 col-sm-10 col-xs-10">Gana 1000 puntos si respondes correctamente</div> 
					</div>
				</div>
			</div>
			
			<!-- <div class="row question">
				<h1 class="col-md-12 text"></h1>
				<h3 class="col-md-12 answer">&nbsp;</h3>
			</div>
			
			<div class="row my-hand center">
				<div class="col-md-1"></div>
				<div class="col-md-2 col-sm-3 col-xs-4"><img id="my-rock" class="my hand" src="/games/rpsls/images/blue/rock.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-4"><img id="my-paper" class="my hand" src="/games/rpsls/images/blue/paper.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-4"><img id="my-scissors" class="my hand" src="/games/rpsls/images/blue/scissors.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-6"><img id="my-lizard" class="my hand" src="/games/rpsls/images/blue/lizard.png"/></div>
				<div class="col-md-2 col-sm-3 col-xs-6"><img id="my-spock" class="my hand" src="/games/rpsls/images/blue/spock.png"/></div>
				<div class="col-md-1"></div>
			</div> -->

			<div class="row result">
				<div class="row center">
					<h1 class="col-md-12 question-text">
						
					</h1>					
				</div>
				<div class="row center">
					<div class="col-md-3 col-sm-2 col-xs-1"></div>
					<div class="col-md-6 col-sm-8 col-xs-10" id="result-msg">
						<div class="row">
							<span class="col-md-12 col-sm-12 col-xs-12 btn btn-default btn-lg question-button question1" data-status="false">&nbsp;</span>
						</div>
						<div class="row">
							<span class="col-md-12 col-sm-12 col-xs-12 btn btn-default btn-lg question-button question2" data-status="false">&nbsp;</span>
						</div>
						<div class="row">
							<span class="col-md-12 col-sm-12 col-xs-12 btn btn-default btn-lg question-button question3" data-status="false">&nbsp;</span>
						</div>
						<div class="row">
							<span class="col-md-12 col-sm-12 col-xs-12 btn btn-default btn-lg question-button question4" data-status="false">&nbsp;</span>
						</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-2 col-xs-1"></div>
				</div>
			</div>

			<div class="row final-score">
				<div class="row">
					<h1 class="col-md-12">
						Resultado Final
					</h1>					
				</div>
				<div class="row center">
					<div class="col-md-2 col-sm-2 col-xs-1"></div>
					<div class="col-md-8 col-sm-8 col-xs-10 center">
						<div class="row" id="answer-selected">
							<div class="col-lg-5 col-md-4 col-sm-4 col-xs-3"></div>
							<h3 class="col-lg-2 col-md-4 col-sm-4 col-xs-6"><img src="/games/rpsls/images/help.png" width="100%"/></h3>
							<div class="col-lg-5 col-md-4 col-sm-4 col-xs-3"></div>
						</div>
						<div class="row" id="answer-selected">
							<div class="col-md-3 col-sm-3 col-xs-1"></div>
							<h3 class="col-md-3 col-sm-3 col-xs-5">Puntos: </h3>
							<h3 class="col-md-3 col-sm-3 col-xs-5" id="final-points">200</h3>
							<div class="col-md-3 col-sm-3 col-xs-1"></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-1"></div>
							<h3 class="col-md-3 col-sm-3 col-xs-5">Respuestas Acertadas: </h3>
							<h3 class="col-md-3 col-sm-3 col-xs-5" id="final-answers">2</h3>
							<div class="col-md-3 col-sm-3 col-xs-1"></div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-1"></div>
							<div class="col-md-6 col-sm-6 col-xs-10">
								<div class="progress">
								  <div id="final-correct" class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
								    0%
								  </div>
								  <div id="final-progress" class="progress-bar progress-bar-striped progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
								    
								  </div>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-1"></div>
						</div>
						<div class="row">&nbsp;</div>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-2"></div>
							<span class="col-md-6 col-sm-6 col-xs-8 btn btn-primary btn-lg save-button">Guardar</span>
							<div class="col-md-3 col-sm-3 col-xs-2"></div>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-1"></div>
				</div>
			</div>

			<div class="row spent-time">
				<div class="row question">
					<h1 class="col-md-12 text">
						
					</h1>					
				</div>
				<div class="row center">
					<div class="col-md-1 col-sm-1 col-xs-1"></div>
					<div class="col-md-10 col-sm-10 col-xs-10" id="result-msg">
						<div class="row" id="answer-selected">
							<h3 class="col-md-12 col-sm-12 col-xs-12">Tiempo Agotado!</h3>
						</div>
						<div class="row">&nbsp;</div>
						<div class="row">
							<span class="col-md-12 col-sm-12 col-xs-12 alert alert-warning" id="spent-result">&nbsp;</span>
						</div>
						<div class="row">&nbsp;</div>
						<div class="row">
							<span class="col-md-12 col-sm-12 col-xs-12 btn btn-primary btn-lg next-button">Siguiente</span>
							<span class="col-md-12 col-sm-12 col-xs-12 btn btn-default btn-lg finish-button">Finalizar</span>
						</div>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1"></div>
				</div>
			</div>

		</div>

	</div>

	<script type="text/javascript">

		/* PROPERTIES */

		var randomize = [];

		/*var rpslsMAP = {
			'rock' : {
				on: [
					'lizard',
					'scissors'
				],
				below: [
					'spock',
					'paper'
				]
			},
			'paper' : {
				on: [
					'rock',
					'spock'
				],
				below: [
					'lizard',
					'scissors'
				]
			},
			'scissors' : {
				on: [
					'lizard',
					'paper'
				],
				below: [
					'spock',
					'rock'
				]
			},
			'lizard' : {
				on: [
					'spock',
					'paper'
				],
				below: [
					'rock',
					'scissors'
				]
			},
			'spock' : {
				on: [
					'rock',
					'scissors'
				],
				below: [
					'lizard',
					'paper'
				]
			},
		}*/

		var $question = null;

		// var questions = {{ $questions }};

		/*var questions = {
			red: [
				{
					question: "Red Question #1",
					answer: 3,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Correct",
							answer: true,
						},
					]
				},
				{
					question: "Red Question #2",
					answer: 1,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Correct",
							answer: true,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Red Question #3",
					answer: 0,
					options: [
						{
							id: 0,
							name: "Correct",
							answer: true,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Red Question #4",
					answer: 2,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Correct",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: true,
						},
					]
				},
			],
			purple: [
				{
					question: "Purple Question #1",
					answer: 3,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Correct",
							answer: true,
						},
					]
				},
				{
					question: "Purple Question #2",
					answer: 1,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Correct",
							answer: true,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Purple Question #3",
					answer: 0,
					options: [
						{
							id: 0,
							name: "Correct",
							answer: true,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Purple Question #4",
					answer: 2,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Correct",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: true,
						},
					]
				},
			],
			blue: [
				{
					question: "Blue Question #1",
					answer: 3,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Correct",
							answer: true,
						},
					]
				},
				{
					question: "Blue Question #2",
					answer: 1,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Correct",
							answer: true,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Blue Question #3",
					answer: 0,
					options: [
						{
							id: 0,
							name: "Correct",
							answer: true,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Blue Question #4",
					answer: 2,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Correct",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: true,
						},
					]
				},
			],
			sky: [
				{
					question: "Sky Question #1",
					answer: 3,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Correct",
							answer: true,
						},
					]
				},
				{
					question: "Sky Question #2",
					answer: 1,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Correct",
							answer: true,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Sky Question #3",
					answer: 0,
					options: [
						{
							id: 0,
							name: "Correct",
							answer: true,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Sky Question #4",
					answer: 2,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Correct",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: true,
						},
					]
				},
			],
			green: [
				{
					question: "Green Question #1",
					answer: 3,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Correct",
							answer: true,
						},
					]
				},
				{
					question: "Green Question #2",
					answer: 1,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Correct",
							answer: true,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Green Question #3",
					answer: 0,
					options: [
						{
							id: 0,
							name: "Correct",
							answer: true,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Green Question #4",
					answer: 2,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Correct",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: true,
						},
					]
				},
			],
			yellow: [
				{
					question: "Yellow Question #1",
					answer: 3,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Correct",
							answer: true,
						},
					]
				},
				{
					question: "Yellow Question #2",
					answer: 1,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Correct",
							answer: true,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Yellow Question #3",
					answer: 0,
					options: [
						{
							id: 0,
							name: "Correct",
							answer: true,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: false,
						},
					]
				},
				{
					question: "Yellow Question #4",
					answer: 2,
					options: [
						{
							id: 0,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 1,
							name: "Incorrect",
							answer: false,
						},
						{
							id: 2,
							name: "Correct",
							answer: false,
						},
						{
							id: 3,
							name: "Incorrect",
							answer: true,
						},
					]
				},
			],
		};*/

		var questions = [
			{
				question: "Question #1",
				answer: 3,
				options: [
					{
						id: 0,
						name: "Incorrect",
						answer: false,
					},
					{
						id: 1,
						name: "Incorrect",
						answer: false,
					},
					{
						id: 2,
						name: "Incorrect",
						answer: false,
					},
					{
						id: 3,
						name: "Correct",
						answer: true,
					},
				]
			},
			{
				question: "Question #2",
				answer: 1,
				options: [
					{
						id: 0,
						name: "Incorrect",
						answer: false,
					},
					{
						id: 1,
						name: "Correct",
						answer: true,
					},
					{
						id: 2,
						name: "Incorrect",
						answer: false,
					},
					{
						id: 3,
						name: "Incorrect",
						answer: false,
					},
				]
			},
			{
				question: "Question #3",
				answer: 0,
				options: [
					{
						id: 0,
						name: "Correct",
						answer: true,
					},
					{
						id: 1,
						name: "Incorrect",
						answer: false,
					},
					{
						id: 2,
						name: "Incorrect",
						answer: false,
					},
					{
						id: 3,
						name: "Incorrect",
						answer: false,
					},
				]
			},
			{
				question: "Question #4",
				answer: 2,
				options: [
					{
						id: 0,
						name: "Incorrect",
						answer: false,
					},
					{
						id: 1,
						name: "Incorrect",
						answer: false,
					},
					{
						id: 2,
						name: "Correct",
						answer: true,
					},
					{
						id: 3,
						name: "Incorrect",
						answer: false,
					},
				]
			},
		]

		/*var colorMAP = {
			red: {
				counter: 0,
				correct: 0,
				incorrect: 0,
				limit: questions.red.length,
			},
			purple: {
				counter: 0,
				correct: 0,
				incorrect: 0,
				limit: questions.purple.length,
			},
			blue: {
				counter: 0,
				correct: 0,
				incorrect: 0,
				limit: questions.blue.length,
			},
			sky: {
				counter: 0,
				correct: 0,
				incorrect: 0,
				limit: questions.sky.length,
			},
			green: {
				counter: 0,
				correct: 0,
				incorrect: 0,
				limit: questions.green.length,
			},
			yellow: {
				counter: 0,
				correct: 0,
				incorrect: 0,
				limit: questions.yellow.length,
			}
		};*/

		var actionMAP = {
			clock: {
				status: false,
				counter: 0,
				coeficient: 30,
			},
			eraser: {
				status: false,
				counter: 0,
			},
			flash: {
				status: false,
				counter: 0,	
				used: 0,
			},
			plus: {
				status: false,
				counter: 0,
			},
			refresh: {
				status: false,
				counter: 0,
				used: 0,
			},
			star: {
				status: false,
				counter: 0
			}
		};

		var time_by_question = 90;

		var timing = 0;

		var progress = 0;

		var points = 0;

		var correct_answers = 0;

		var wrong_answers = 0;

		var rouletteStrength = 0;

		var rouletteStrengthSwing = 1;

		var intervalCoeficient = 150;

		var rouletteRollInterval = null;

		var itemSelected = 0;

		var actionSelected = null;

		var rouletteRolling = false;

		var completedQuestions = false;

		/* METHODS */

		var verifyCompletedQuestions = function(){

			completedQuestions = true;

			for(color in colorMAP){
				console.log(colorMAP[color]);
				if(colorMAP[color].counter < colorMAP[color].limit) completedQuestions = false;
			}

		}

		var selectColorItem = function(){
			var selected = null;
			actionSelected = $('.item'+itemSelected).attr('data-color');
			switch(actionSelected){
				case 'clock':
					actionMAP.clock.counter++;
					actionMAP.clock.status = true;
					// selected = colorMAP.red;
				break
				case 'eraser':
					actionMAP.eraser.counter++;
					actionMAP.eraser.status = true;
					// selected = colorMAP.purple;
				break
				case 'flash':
					actionMAP.flash.counter++;
					actionMAP.flash.status = true;
					// selected = colorMAP.blue;
				break
				case 'plus':
					actionMAP.plus.counter++;
					actionMAP.plus.status = true;
					// selected = colorMAP.sky;
				break
				case 'refresh':
					actionMAP.refresh.counter++;
					actionMAP.refresh.status = true;
					// selected = colorMAP.green;
				break
				case 'star':
					actionMAP.star.counter++;
					actionMAP.star.status = true;
					// selected = colorMAP.yellow;
				break
			}
			
			showQuestion(actionSelected);
			/*if(selected.limit == selected.counter){
				changeItem();
				selectColorItem();
			}
			else{
				selected.counter++;
				verifyCompletedQuestions();
				console.log($('.item'+itemSelected).attr('data-color') + ' : ' + selected.counter);
			}*/
		}

		var changeItem = function(){
			if(itemSelected == 6) itemSelected = 0;
			itemSelected++;
			$('.item').removeClass('hover');
			$('.item'+itemSelected).addClass('hover');
		}

		var rouletteIntervalFunction = function(){
			clearInterval(rouletteRollInterval);
			// console.log('changing');
			changeItem();
			if(rouletteRolling){
				rouletteRollInterval = setInterval(rouletteIntervalFunction, (intervalCoeficient));
			}
			else{
				selectColorItem();
				// Item seleccionado
			}
		}/*

		var animateSwingRoulette = function(){
			$({
				swing: 1
			}).animate({
				swing: rouletteStrength
			},{
				duration: 2500,
				easing: 'swing',
				step: function(){
					rouletteStrengthSwing = this.swing
				},
				done: function(){
					$({
						swing: rouletteStrengthSwing
					}).animate({
						swing: 1
					},{
						duration: 5000,
						easing: 'swing',
						step: function(){
							rouletteStrengthSwing = this.swing
						},
						done: function(){
							rouletteRolling = false;
						}
					});
				}
			});
		}*/

		var animateSwingRoulette = function(){
			$({
				swing: intervalCoeficient
			}).animate({
				swing: 1000
			},{
				duration: rouletteStrength,
				easing: 'linear',
				step: function(){
					console.log("Swing: "+this.swing);
					intervalCoeficient = this.swing;
				},
				done: function(){
					rouletteRolling = false;
				}
			});
		}

		var setScore = function(questions){
			$('#progress').html(correct_answers+'/'+questions.length);
			$('#points').html(points);
		}

		var duringProgressBar = function(){

			$({
				width:((progress)/questions.length*100)-((correct_answers)/questions.length*100),
				percentage: (progress++)/questions.length*100,
			}).animate({
				width:((progress)/questions.length*100)-((correct_answers)/questions.length*100),
				percentage: (progress)/questions.length*100,
			},{
      			easing:'swing',
      			step: function() {
			        $('#during-progress').css({width: this.percentage+'%'}, function(){console.log("width")});
			        // $('#during-progress').css({width: this.width+'%'}, function(){console.log("width")});
			        // $('#during-progress').text(Math.floor(Math.round(this.percentage))+'%');
			    }
      		});

		}

		/*var correctProgressBar = function(){

			$({percentage:(correct_answers)/questions.length*100, during: (progress)/questions.length*100 }).animate({percentage:(correct_answers)/questions.length*100, during: ((correct_answers)/questions.length*100)-((progress)/questions.length*100)},{
      			easing:'swing',
      			step: function() {
			        $('#during-progress').css({width: this.during+'%'}, function(){console.log("width")});
			        $('#correct-progress').css({width: this.percentage+'%'}, function(){console.log("width")});
			        // $('#correct-progress').text(Math.floor(Math.round(this.percentage))+'%');
			    }
      		});

		}*/

		var setLayout = function(){

			$('#right-side').height($('#left-side').height());

		}

		var selectQuestion = function(questions){
			duringProgressBar();

			var temp,band;
			do{
				temp = Math.floor((Math.random() * questions.length));
				console.log('ciclo: ' + temp);
				band = false;
				for(i = 0; i < randomize.length; i++) if(temp == randomize[i]) band = true;
			}while(band);
			randomize.push(temp);
			console.log(randomize);
			return questions[temp];
		}

		var showQuestion = function(action){

			$question = selectQuestion(questions);

			console.log($question.question);
			$('.question-text').html($question.question);
			for(var i = 0 ; i < $question.options.length ; i++){
				$('.question'+(i+1)).html($question.options[i].name);
				$('.question'+(i+1)).attr('data-status',$question.options[i].answer);
			}
			setTimeout(function(){
				scene2();
			}, 1000);
		};

		/*var setAnswers = function(options){
			console.log(options);
			for(i = 0; i < options.length; i++){
				$option = null;
				switch(options[i].figure){
					case 'rock':
						$option = $('#my-rock');
						break;
					case 'paper':
						$option = $('#my-paper');
						break;
					case 'scissors':
						$option = $('#my-scissors');
						break;
					case 'lizard':
						$option = $('#my-lizard');
						break;
					case 'spock':
						$option = $('#my-spock');
						break;
				}
				$option.attr('data-figure', options[i].figure);
				$option.attr('data-name', options[i].name);
				$option.attr('data-answer', options[i].answer);
			}
		}*/

		var scene1 = function(){

			$('.spent-time').fadeOut('slow/400/fast', function() {

			});
			$('.final-score').fadeOut('slow/400/fast', function() {

			});
			$('.result').fadeOut('slow/400/fast', function() {
				$('.roulette').fadeIn('slow/400/fast', function() {
					
				});
			});
			
		}

		var scene2 = function(){
			console.log('show result');
			$('.roulette').fadeOut('slow/400/fast', function() {

			});
			$('.final-score').fadeOut('slow/400/fast', function() {

			});
			$('.spent-time').fadeOut('slow/400/fast', function() {
				$('.result').fadeIn('slow/400/fast', function() {
					setLayout();
				});
			});

		}

		var scene3 = function(){

			$('.roulette').fadeOut('slow/400/fast', function() {
				
			});
			$('.spent-time').fadeOut('slow/400/fast', function() {

			});
			$('.result').fadeOut('slow/400/fast', function() {
				$('.final-score').fadeIn('slow/400/fast', function() {
					setLayout();					
				});
			});

		}

		var scene4 = function(){
			console.log('scene4');
			$('.roulette').fadeOut('slow/400/fast', function() {
				
			});
			$('.final-score').fadeOut('slow/400/fast', function() {

			});
			$('.result').fadeOut('slow/400/fast', function() {
				$('.spent-time').fadeIn('slow/400/fast', function() {
					setLayout();					
				});
			});

		}

		var decreaseInterval = null;

		var setQuestion = function(questions){
			// $question = selectQuestion(questions);
			setScore(questions);
			// time_by_question = $question.seconds;
			time_by_question = 240;
			resetTimer(setTimer);
			decreaseInterval = setInterval(function(){
				decreaseTimer(setTimer);
			}, 1000);
			console.log("setQuestion");
			// setAnswers($question.options);
			// showQuestion($question);
		}

		var increasePoints = function(pts){
			points += pts;
			setScore(questions);
		}

		var decreasePoints = function(pts){
			points -= pts;
			setScore(questions);
		}

		var increaseAnswers = function(){
			correct_answers++;
		}

		var decreaseAnswers = function(){
			correct_answers--;
		}

		var increaseWrongAnswers = function(){
			wrong_answers++;
		}

		var decreaseWrongAnswers = function(){
			wrong_answers--;
		}

		var setFinalScore = function(scene){
			percentage = correct_answers*100/questions.length;
			$('#final-points').html(points);
			$('#final-answers').html(correct_answers);

			$('#final-correct').css({
				width: percentage+'%'
			});
			$('#final-correct').attr('aria-valuenow',percentage);
			$('#final-correct').html(percentage+"%");

			$('#final-progress').css({
				width: 100-percentage+'%'
			});
			$('#final-progress').attr('aria-valuenow',100);

			scene();

		}

		var setTimer = function(time){
			var minutes = Math.floor( time/60);
			var seconds = Math.floor((time - (minutes * 60)));
		    if (minutes < 10) minutes = "0"+minutes;
		    if (seconds < 10) seconds = "0"+seconds;
		    $('#timer').html(minutes+':'+seconds);
		}

		var resetTimer = function(cb){
			timing = time_by_question;
			cb(timing);
		}

		var spentTime = function(){
			clearInterval(decreaseInterval);
			$('#spent-result').html($question.answer);
			scene4();
		}

		var decreaseTimer = function(cb){
			console.log("decrease");
			timing > 0 ? cb(--timing) : spentTime();
		}


		/* EVENT LISTENERS */

		/*var rouletteInterval = 0setInterval(function(){
			hands = $('.roulette .hand');
			hand_animate = hands[Math.floor((Math.random() * hands.length))];
			// console.log($(hand_animate));
			$('.roulette .hand').animate({
				width: '100px',
				height: '100px',
			}, function(){
				// console.log("Listo " + Math.floor((Math.random() * hands.length)));
				$(hand_animate).animate({
					width: '120px',
					height: '120px',
				},{
					duration: 500
				});
			});
		}, 500)*/;

		$('.my').on('click', function(){
			scene2();
			console.log(timing);
			clearInterval(decreaseInterval);
			console.log(timing);
			var elem = $(this);
			if(elem.attr('data-answer') == 'true'){
				$('#hand-selected').html('<img id="my-paper" class="finish-hand" src="/games/rpsls/images/blue/'+elem.attr('data-figure')+'.png"/>');
				$('#hand-revenge').html('<img id="my-paper" class="finish-hand" src="/games/rpsls/images/red/'+rpslsMAP[elem.attr('data-figure')].on[Math.floor((Math.random() * rpslsMAP[elem.attr('data-figure')].on.length))]+'.png"/>');
				$('#answers-result').html('Correcto');
				$('#answers-result').removeClass('alert-danger');
				$('#answers-result').addClass('alert-success');
				increasePoints(100+timing);
				increaseAnswers();
				// correctProgressBar();
				/*console.log(rpslsMAP[elem.attr('data-figure')].on.length);
				$('#roulette-'+rpslsMAP[elem.attr('data-figure')].on[Math.floor((Math.random() * rpslsMAP[elem.attr('data-figure')].on.length))]).animate({
					width: '200px',
					height: '200px',
				});*/
			}
			else{
				$('#hand-selected').html('<img id="my-paper" class="finish-hand" src="/games/rpsls/images/blue/'+elem.attr('data-figure')+'.png"/>');
				$('#hand-revenge').html('<img id="my-paper" class="finish-hand" src="/games/rpsls/images/red/'+rpslsMAP[elem.attr('data-figure')].below[Math.floor((Math.random() * rpslsMAP[elem.attr('data-figure')].below.length))]+'.png"/>');
				$('#answers-result').html('Incorrecto');
				$('#answers-result').removeClass('alert-success');
				$('#answers-result').addClass('alert-danger');
				/*console.log(rpslsMAP[elem.attr('data-figure')].below.length);
				$('#roulette-'+rpslsMAP[elem.attr('data-figure')].below[Math.floor((Math.random() * rpslsMAP[elem.attr('data-figure')].below.length))]).animate({
					width: '200px',
					height: '200px',
				});*/
			}
			if(progress == questions.length){
				$('.next-button').css({
					'display':'none'
				});
				$('.finish-button').fadeIn('slow/400/fast', function() {
					
				});
			}
		});

		$('.question-button').on('click', function(e){
			e.preventDefault();
			if($(this).attr('data-status') == 'true'){
				increaseAnswers();
				increasePoints(100+timing);
				$(this).addClass('btn-success');
			}
			else{
				increaseWrongAnswers();
				decreasePoints(25+time_by_question-timing);
				$(this).addClass('btn-danger');
				$('.question-button[data-status=true]').addClass('btn-success');
			}
			setTimeout(function(){
				$('.question-button').removeClass('btn-danger');
				$('.question-button').removeClass('btn-success');
				scene1();
			}, 1000);
		});

		$('#circle').on('mousedown', function(){
			// console.log("mousedown");
			$(this).addClass('click');
		});

		$('#circle').on('click', function(){
			intervalCoeficient = 150;
			if(!completedQuestions){
				rouletteStrength = Math.floor((Math.random() * 5000)+1500);
				console.log(rouletteStrength);
				rouletteRolling = true;
				changeItem();
				// animateSwingRoulette();
				rouletteRollInterval = setInterval(rouletteIntervalFunction, (intervalCoeficient));
				setTimeout(function(){animateSwingRoulette()},rouletteStrength);
			}
			else{
				alert("completed");
			}
		});

		$('#circle').on('mouseup', function(){
			// console.log("mouseup");
			$(this).removeClass('click');
		});

		$('.next-button').on('click', function(){
			setQuestion(questions);
			scene1();
		});

		$('.finish-button').on('click', function(){
			setFinalScore(scene3);
		});

		$('.save-button').on('click', function(){
			// -- SAVE BUTTON
		});

		$(document).on('ready', function(){
			setQuestion(questions);
			setLayout();
			/*$.ajax({
				url: 'http:localhost:8000/rpsls',
				type: 'GET',
				dataType: 'json',
				error: function(err){
					console.log("ERROR");
					// consol.log(err);
				},
				success: function(data){
					console.log(data);

					console.log("success");
				}
			});*/
		});


	</script>
</body>
	<!--- <script type="text/javascript">
		var questions = [
			{
				question: "¿De que color es el caballo de Simón Bolívar?",
				answer: 3,
				options: [
					{
						id: 0,
						item: "rock",
						name: "Rojo",
						answer: false,
					},
					{
						id: 1,
						item: "scissors",
						name: "Azul",
						answer: false,
					},
					{
						id: 2,
						item: "paper",
						name: "Verde",
						answer: false,
					},
					{
						id: 3,
						item: "lizard",
						name: "Blanco",
						answer: true,
					},
					{
						id: 4,
						item: "spock",
						name: "Amarillo",
						answer: false,
					},
				]
			},
		];

		var selectQuestion = function(questions){
			return questions[Math.floor((Math.random() * questions.length))];
		}

		var setPossibleAnswers = function(options){
			for(i = 0; i < options.length; i++){
				$option = null;
				switch(options[i].item){
					case 'rock':
						$option = $('#myRock .possibleAnswer');
						break;
					case 'paper':
						$option = $('#myPaper .possibleAnswer');
						break;
					case 'scissors':
						$option = $('#myScissors .possibleAnswer');
						break;
					case 'lizard':
						$option = $('#myLizard .possibleAnswer');
						break;
					case 'spock':
						$option = $('#mySpock .possibleAnswer');
						break;
				}
				$option.html(options[i].name);
			}
		}

		$(document).on('ready', function(){

			$question = selectQuestion(questions);
			setPossibleAnswers($question.options);
			/*$.ajax({
				url: 'http:localhost:8000/rpsls',
				type: 'GET',
				dataType: 'json',
				error: function(err){
					console.log("ERROR");
					// consol.log(err);
				},
				success: function(data){
					console.log(data);

					console.log("success");
				}
			});*/
		});
	</script>
</html>