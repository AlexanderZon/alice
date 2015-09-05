
	<link rel="stylesheet" type="text/css" href="/games/rpsls/css/style.css"/>

	<div class="row content">

		<div class="col-md-8" id="left-side">
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
						<div class="col-md-6 col-sm-6 col-xs-0">Pregunta: </div>
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
					<div class="col-md-1 col-sm-1 col-xs-1"></div>
					<div class="col-md-4 col-sm-4 col-xs-3" id="hand-selected"></div>
					<div class="col-md-2 col-sm-2 col-xs-4" id="result-msg">
						<div class="row" id="answer-selected">
							<h3 class="col-md-12 col-sm-12 col-xs-12">Blanco</h3>
						</div>
						<div class="row">&nbsp;</div>
						<div class="row">
							<span class="col-md-12 col-sm-12 col-xs-12 alert alert-success" id="answers-result">&nbsp;</span>
						</div>
						<div class="row">&nbsp;</div>
						<div class="row">
							<span class="col-md-12 col-sm-12 col-xs-12 btn btn-primary btn-lg next-button">Siguiente</span>
							<span class="col-md-12 col-sm-12 col-xs-12 btn btn-default btn-lg finish-button">Finalizar</span>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-3" id="hand-revenge"></div>
					<div class="col-md-1 col-sm-1 col-xs-1"></div>
				</div>
			</div>

			<div class="row final-score">
				<div class="row question">
					<h1 class="col-md-12">
						Resultado Final
					</h1>					
				</div>
				<div class="row center">
					<div class="col-md-2 col-sm-2 col-xs-1"></div>
					<div class="col-md-8 col-sm-8 col-xs-10 center">
						<div class="row" id="answer-selected">
							<div class="col-lg-5 col-md-4 col-sm-4 col-xs-3"></div>
							<h3 class="col-lg-2 col-md-4 col-sm-4 col-xs-6"><img src="{{ Auth::user()->profile->getAvatar() }}" width="100%"/></h3>
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

		<div class="col-md-4 aside center" id="right-side">
			<div class="row">
				<div class="col-md-2"></div>
				<img class="col-md-8" src="/games/rpsls/images/help.png"/>
				<div class="col-md-2"></div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					Las tijeras cortan el papel, el papel cubre a la piedra, la piedra aplasta a la iguana, la iguana muerde a la garra, la garra destroza las tijeras, las tijeras decapitan a la iguana, la iguana se come el papel, el papel dibuja a la garra, la garra tira la piedra, y como es habitual... la piedra aplasta las tijeras.
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>

	</div>

	<script type="text/javascript">

		var GameRPSLSManager = function(){

			/* PROPERTIES */

			var randomize = [];

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

			var $question = null;

			var questions = {{ $questions }};

			var time_by_question = 90;

			var timing = 0;

			var progress = 0;

			var points = 0;

			var correct_answers = 0;

			var incorrect_answers = 0;

			/* METHODS */

			var setScore = function(questions){
				$('#progress').html(progress+'/'+questions.length);
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

			var scene1 = function(){

				$('.spent-time').fadeOut('slow/400/fast', function() {
				});
				$('.result').fadeOut('slow/400/fast', function() {
					$('.enemy').fadeIn('slow/400/fast', function() {
						
					});
					$('.question').fadeIn('slow/400/fast', function() {
						
					});
					$('.my-hand').fadeIn('slow/400/fast', function() {
						setLayout();
					});
				});
				
			}

			var scene2 = function(){

				$('.enemy').fadeOut('slow/400/fast', function() {
					
				});
				$('.question').fadeOut('slow/400/fast', function() {
					
				});
				$('.spent-time').fadeOut('slow/400/fast', function() {
				});
				$('.my-hand').fadeOut('slow/400/fast', function() {
					$('.result').fadeIn('slow/400/fast', function() {
						setLayout();
					});
				});

			}

			var scene3 = function(){

				$('.enemy').fadeOut('slow/400/fast', function() {
					
				});
				$('.question').fadeOut('slow/400/fast', function() {
					
				});
				$('.my-hand').fadeOut('slow/400/fast', function() {
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
				$('.enemy').fadeOut('slow/400/fast', function() {
					
				});
				$('.question').fadeOut('slow/400/fast', function() {
					
				});
				$('.my-hand').fadeOut('slow/400/fast', function() {
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
				$question = selectQuestion(questions);
				setScore(questions);
				time_by_question = 120;
				resetTimer(setTimer);
				decreaseInterval = setInterval(function(){
					decreaseTimer(setTimer);
				}, 1000);
				console.log("setQuestion");
				setAnswers($question.options);
				showQuestion($question);
			}

			var increasePoints = function(pts){
				points += pts;
				setScore(questions);
			}

			var increaseAnswers = function(){
				correct_answers++;
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

			/*var enemyInterval = 0setInterval(function(){
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

			return {

				init: function(){

					setQuestion(questions);
					setLayout();

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
						scene2();
						console.log(timing);
						clearInterval(decreaseInterval);
						console.log(timing);
						var elem = $(this);
						if(elem.attr('data-answer') == 'true'){
							$('#hand-selected').html('<img id="my-paper" class="finish-hand" src="/games/rpsls/images/blue/'+elem.attr('data-figure')+'.png"/>');
							$('#hand-revenge').html('<img id="my-paper" class="finish-hand" src="/games/rpsls/images/red/'+rpslsMAP[elem.attr('data-figure')].on[Math.floor((Math.random() * rpslsMAP[elem.attr('data-figure')].on.length))]+'.png"/>');
							$('#answer-selected > h3').html(elem.attr('data-name'));
							$('#answers-result').html('Correcto');
							$('#answers-result').removeClass('alert-danger');
							$('#answers-result').addClass('alert-success');
							increasePoints(100+timing);
							increaseAnswers();
							// correctProgressBar();
							/*console.log(rpslsMAP[elem.attr('data-figure')].on.length);
							$('#enemy-'+rpslsMAP[elem.attr('data-figure')].on[Math.floor((Math.random() * rpslsMAP[elem.attr('data-figure')].on.length))]).animate({
								width: '200px',
								height: '200px',
							});*/
						}
						else{
							$('#hand-selected').html('<img id="my-paper" class="finish-hand" src="/games/rpsls/images/blue/'+elem.attr('data-figure')+'.png"/>');
							$('#hand-revenge').html('<img id="my-paper" class="finish-hand" src="/games/rpsls/images/red/'+rpslsMAP[elem.attr('data-figure')].below[Math.floor((Math.random() * rpslsMAP[elem.attr('data-figure')].below.length))]+'.png"/>');
							$('#answer-selected > h3').html(elem.attr('data-name'));
							$('#answers-result').html('Incorrecto');
							$('#answers-result').removeClass('alert-success');
							$('#answers-result').addClass('alert-danger');
							/*console.log(rpslsMAP[elem.attr('data-figure')].below.length);
							$('#enemy-'+rpslsMAP[elem.attr('data-figure')].below[Math.floor((Math.random() * rpslsMAP[elem.attr('data-figure')].below.length))]).animate({
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


				}

			}

		}();

		GameRPSLSManager.init();

	</script>