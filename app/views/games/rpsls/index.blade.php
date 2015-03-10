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

	<link rel="stylesheet" type="text/css" href="/games/rpsls/css/style.css"/>
	<script type="text/javascript" src="/assets/global/plugins/jquery.min.js"></script>
</head>
<body>

	<div class="row content">

		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12 score">
					<div class="col-md-4">
						<div class="col-md-6">Tiempo: </div>
						<div class="col-md-6" id="timer">00:00</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-6">Puntos: </div>
						<div class="col-md-6" id="points">0</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-6">Respuestas: </div>
						<div class="col-md-6" id="progress">0/0</div>
					</div>
				</div>
			</div>
			

			<div class="row enemy center">
				<div class="col-md-1"></div>
				<div class="col-md-2 col-sm-3 col-xs-4"><img id="enemy-rock" class="hand" src="/games/rpsls/images/red/rock.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-4"><img id="enemy-paper" class="hand" src="/games/rpsls/images/red/paper.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-4"><img id="enemy-scissors" class="hand" src="/games/rpsls/images/red/scissors.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-6"><img id="enemy-lizard" class="hand" src="/games/rpsls/images/red/lizard.png"/></div>
				<div class="col-md-2 col-sm-3 col-xs-6"><img id="enemy-spock" class="hand" src="/games/rpsls/images/red/spock.png"/></div>
				<div class="col-md-1"></div>
			</div>
			
			<div class="row question">
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
			</div>

			<div class="row result">
				<div class="row question">
					<h1 class="col-md-12 text">
						
					</h1>					
				</div>
				<div class="row center">
					<div class="col-md-1"></div>
					<div class="col-md-4" id="hand-selected"><img id="my-paper" class="finish-hand" src="/games/rpsls/images/blue/paper.png"/></div>
					<div class="col-md-2" id="result-msg">
						<div class="row" id="answer-selected">
							<h3 class="col-md-12">Blanco</h3>
						</div>
						<div class="row">&nbsp;</div>
						<div class="row">
							<span class="col-md-12 btn btn-success btn-lg" id="answers-result">Correcto</span>
						</div>
						<div class="row">&nbsp;</div>
						<div class="row" id="next-question">
							<span class="col-md-5 btn btn-primary">Siguiente</span>
							<span class="col-md-2"></span>
							<span class="col-md-5 btn btn-primary">Finalizar</span>
						</div>
					</div>
					<div class="col-md-4" id="hand-revenge"><img id="my-spock" class="finish-hand" src="/games/rpsls/images/red/spock.png"/></div>
					<div class="col-md-1"></div>
				</div>
			</div>

		</div>

		<div class="col-md-4 aside center">
			<div class="row">
				<div class="col-md-2"></div>
				<img class="col-md-8" src="/games/rpsls/images/help.png"/>
				<div class="col-md-2"></div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					Las tijeras cortan el papel, el papel cubre a la piedra, la piedra aplasta al lagarto, el lagarto envenena a Spock, Spock destroza las tijeras, las tijeras decapitan al lagarto, el lagarto se come el papel, el papel refuta a Spock, Spock vaporiza la piedra, y como es habitual... la piedra aplasta las tijeras.
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>

	</div>

	<script type="text/javascript">
		var rpslsMAP = {
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
		}

		var questions = {{ $questions }};

		var selectQuestion = function(questions){
			return questions[Math.floor((Math.random() * questions.length))];
		}

		var showQuestion = function(question){
			console.log(question.question);
			$('.question > .text').html(question.question);
		};

		var setAnswers = function(options){
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
		}

		var enemyInterval = 0/*setInterval(function(){
			hands = $('.enemy .hand');
			hand_animate = hands[Math.floor((Math.random() * hands.length))];
			// console.log($(hand_animate));
			$('.enemy .hand').animate({
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

		$('.my').on('mouseover',function(){
			$(this).animate({
				width: '120px',
				height: '120px',
			},{
				duration: 500
			});
			// console.log($(this).attr('data-name'));
			var elem = $(".answer").html($(this).attr('data-name'));
		});

		$('.my').on('mouseout',function(){
			$(this).animate({
				width: '100px',
				height: '100px',
			});
			var elem = $(".answer").html('&nbsp;');
		});

		$('.my').on('click', function(){
			// clearInterval(enemyInterval);
			$('.enemy').fadeOut('slow/400/fast', function() {
				
			});
			$('.question').fadeOut('slow/400/fast', function() {
				
			});
			$('.my-hand').fadeOut('slow/400/fast', function() {
				$('.result').fadeIn('slow/400/fast', function() {
					
				});
			});
			$('.enemy .hand').css({
				width: '100px',
				height: '100px',
			});
			var elem = $(this);
			if(elem.attr('data-answer') == 'true'){
				/*console.log(rpslsMAP[elem.attr('data-figure')].on.length);
				$('#enemy-'+rpslsMAP[elem.attr('data-figure')].on[Math.floor((Math.random() * rpslsMAP[elem.attr('data-figure')].on.length))]).animate({
					width: '200px',
					height: '200px',
				});*/
			}
			else{
				/*console.log(rpslsMAP[elem.attr('data-figure')].below.length);
				$('#enemy-'+rpslsMAP[elem.attr('data-figure')].below[Math.floor((Math.random() * rpslsMAP[elem.attr('data-figure')].below.length))]).animate({
					width: '200px',
					height: '200px',
				});*/
			}
		});

		$(document).on('ready', function(){

			$question = selectQuestion(questions);
			setAnswers($question.options);
			showQuestion($question);
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