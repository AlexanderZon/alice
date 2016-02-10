

	<link rel="stylesheet" type="text/css" href="/games/roulette/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="/games/roulette/css/roulette.css"/>

	<div class="row content">

		<div class="col-md-12">
			<div class="row score">
				<div class="col-md-12 col-sm-12 col-xs-12">
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
				        <div class="item5 item" data-color="green" data-action="repeat">
				            <div class="roulette-element"><a href="#five"><i class="fa fa-repeat"></i></a></div>
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
						<div class="col-md-10 col-sm-10 col-xs-10">Tienes la opción de saltarte la pregunta</div> 
					</div>
					<div class="row">
						<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-plus-circle"></i></div>
						<div class="col-md-10 col-sm-10 col-xs-10">Duplica la cantidad de puntos con una respuesta correcta</div> 
					</div>
					<div class="row">
						<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-repeat"></i></div>
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
						<div class="row">
							<span class="col-md-10 col-sm-8 col-xs-6" data-status="false">&nbsp;</span>
							<span class="col-md-2 col-sm-4 col-xs-6 btn btn-warning flash-button" data-status="false"><i class="fa fa-flash"></i></span>
						</div>
					</div>
					<div class="col-md-3 col-sm-2 col-xs-1"></div>
				</div>
			</div>

			<div class="row final-score center">
				<div class="row">
					<h1 class="col-md-12">
						Resultado Final
					</h1>					
				</div>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-1"></div>
					<div class="col-md-8 col-sm-8 col-xs-10 center">
						<div class="row" id="answer-selected">
							<div class="col-lg-5 col-md-4 col-sm-4 col-xs-3"></div>
							<h3 class="col-lg-2 col-md-4 col-sm-4 col-xs-6"><img src="{{ Auth::user()->profile->getAvatar() }}" width="100%"/></h3>
							<div class="col-lg-5 col-md-4 col-sm-4 col-xs-3"></div>
						</div>
						<div class="row" id="answer-selected">
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
							<h3 class="col-md-5 col-sm-5 col-xs-5 right">Puntos: </h3>
							<h3 class="col-md-5 col-sm-5 col-xs-5 left" id="final-points">0</h3>
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
						</div>
						<div class="row">
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
							<h3 class="col-md-5 col-sm-5 col-xs-5 right">Respuestas Acertadas: </h3>
							<h3 class="col-md-5 col-sm-5 col-xs-5 left" id="final-answers">0</h3>
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
						</div>
						<div class="row">
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
							<h3 class="col-md-5 col-sm-5 col-xs-5 right">Respuestas Erradas: </h3>
							<h3 class="col-md-5 col-sm-5 col-xs-5 left" id="final-wrong">0</h3>
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
						</div>
						<div class="row">
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
							<h3 class="col-md-5 col-sm-5 col-xs-5 right">Tiempo (segundos): </h3>
							<h3 class="col-md-5 col-sm-5 col-xs-5 left" id="final-time">0</h3>
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
						</div>
						<div class="row">
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
							<h3 class="col-md-5 col-sm-5 col-xs-5 right">Comodines: </h3>
							<h3 class="col-md-5 col-sm-5 col-xs-5 left">
								<span class="ft-red"><i class="fa fa-clock-o"></i>x<span id="clock-counter">0</span></span>
								<span class="ft-purple"><i class="fa fa-eraser"></i>x<span id="eraser-counter">0</span></span>
								<span class="ft-blue"><i class="fa fa-flash"></i>x<span id="flash-counter">0</span></span>
								<span class="ft-sky"><i class="fa fa-plus-circle"></i>x<span id="plus-counter">0</span></span>
								<span class="ft-green"><i class="fa fa-repeat"></i>x<span id="repeat-counter">0</span></span>
								<span class="ft-yellow"><i class="fa fa-star"></i>x<span id="star-counter">0</span></span>
							</h3>
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
						</div>
						<div class="row">&nbsp;</div>
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
							<span class="col-md-6 col-sm-6 col-xs-8 btn btn-primary btn-lg evaluation-back-btn" data-evaluationable-id="{{ Hashids::encode($evaluation->evaluationable_id )}}" data-evaluationable-type="{{ $evaluation->evaluationable_type }}">Volver</span>
							<div class="col-md-3 col-sm-3 col-xs-2"></div>
						</div>
						<div class="row">&nbsp;</div>
						<div class="row">&nbsp;</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-1"></div>
				</div>
			</div>

			<div class="row spent-time center">
				<div class="col-md-1 col-sm-1 col-xs-1"></div>
				<div class="col-md-10 col-sm-10 col-xs-10" id="result-msg">
					<div class="row" id="answer-selected">
						<h3 class="col-md-12 col-sm-12 col-xs-12">Tiempo Agotado!</h3>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">
						<div class="col-md-3 col-sm-2 col-xs-1"></div>
						<span class="col-md-6 col-sm-8 col-xs-10 btn btn-primary btn-lg final-button">Ver Resultado</span>
						<div class="col-md-3 col-sm-2 col-xs-1"></div>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">&nbsp;</div>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-1"></div>
			</div>

		</div>

	</div>

	<script type="text/javascript">

		var GameRouletteManager = function(){

			/* PROPERTIES */

			var randomize = [];

			var $question = null;

			var questions = {{ $questions }};

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
				repeat: {
					status: false,
					counter: 0,
					used: 0,
				},
				star: {
					status: false,
					counter: 0
				},
			};

			var time_by_question = 90;

			var timing = 0;

			var timer = 0;

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

			var enableRolling = true;

			var completedQuestions = false;

			var decreaseInterval = null;

			/* METHODS */

			var selectActionItem = function(){
				var selected = null;
				actionSelected = $('.item'+itemSelected).attr('data-action');
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
						if(progress < questions.length) $('.flash-button').fadeIn();
						// selected = colorMAP.blue;
					break
					case 'plus':
						actionMAP.plus.counter++;
						actionMAP.plus.status = true;
						// selected = colorMAP.sky;
					break
					case 'repeat':
						actionMAP.repeat.counter++;
						actionMAP.repeat.status = true;
						// selected = colorMAP.green;
					break
					case 'star':
						actionMAP.star.counter++;
						actionMAP.star.status = true;
						// selected = colorMAP.yellow;
					break
				}
				
				showQuestion();

			}

			var changeItem = function(){
				if(itemSelected == 6) itemSelected = 0;
				itemSelected++;
				$('.item').removeClass('hover');
				$('.item'+itemSelected).addClass('hover');
			}

			var rouletteIntervalFunction = function(){
				clearInterval(rouletteRollInterval);
				changeItem();
				if(rouletteRolling){
					rouletteRollInterval = setInterval(rouletteIntervalFunction, (intervalCoeficient));
				}
				else{
					selectActionItem();
				}
			}

			var animateSwingRoulette = function(){
				$({
					swing: intervalCoeficient
				}).animate({
					swing: 1000
				},{
					duration: rouletteStrength,
					easing: 'linear',
					step: function(){
						// console.log("Swing: "+this.swing);
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
				        $('#during-progress').css({width: this.percentage+'%'}, function(){
				        	// console.log("width");
				        });
				    }
	      		});

			}

			var setLayout = function(){
				$('#right-side').height($('#left-side').height());
			}

			var selectQuestion = function(questions){
				duringProgressBar();

				var temp,band;
				do{
					temp = Math.floor((Math.random() * questions.length));
					// console.log('ciclo: ' + temp);
					band = false;
					for(i = 0; i < randomize.length; i++) if(temp == randomize[i]) band = true;
				}while(band);
				randomize.push(temp);
				// console.log(randomize);
				return questions[temp];
			}

			var stopRolling = function(){
				enableRolling = true;
			}

			var showQuestion = function(){
				$question = selectQuestion(questions);
				// console.log($question.question);
				$('.question-text').html($question.question);
				for(var i = 0 ; i < $question.options.length ; i++){
					$('.question'+(i+1)).html($question.options[i].name);
					$('.question'+(i+1)).attr('data-status',$question.options[i].answer);
				}
				setTimeout(function(){
					scene2();
				}, 1000);
			}

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
				// console.log('show result');
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
				$('.score').fadeOut('slow/400/fast', function() {

				});
				$('.result').fadeOut('slow/400/fast', function() {
					$('.final-score').fadeIn('slow/400/fast', function() {
						setLayout();					
					});
				});
			}

			var scene4 = function(){
				// console.log('scene4');
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

			var setQuestion = function(questions){
				// $question = selectQuestion(questions);
				setScore(questions);
				// time_by_question = $question.seconds;
				time_by_question = 240;
				resetTimer(setTimer);
				decreaseInterval = setInterval(function(){
					timer++;
					decreaseTimer(setTimer);
				}, 1000);
				// console.log("setQuestion");
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
				correct_answers > 0 ? correct_answers-- : correct_answers = 0;
			}

			var increaseWrongAnswers = function(){
				wrong_answers++;
			}

			var decreaseWrongAnswers = function(){
				wrong_answers > 0 ? wrong_answers-- : wrong_answers = 0;
			}

			var increaseTiming = function(seconds){
				timing += seconds;
			}

			var setComodinScore = function(){
				$('#clock-counter').html(actionMAP.clock.counter);
				$('#eraser-counter').html(actionMAP.eraser.counter);
				$('#flash-counter').html(actionMAP.flash.counter);
				$('#plus-counter').html(actionMAP.plus.counter);
				$('#repeat-counter').html(actionMAP.repeat.counter);
				$('#star-counter').html(actionMAP.star.counter);
			}

			var setFinalScore = function(scene){
				percentage = correct_answers*100/questions.length;
				$('#final-points').html(points);
				$('#final-answers').html(correct_answers);
				$('#final-wrong').html(wrong_answers);
				$('#final-correct').css({
					width: percentage+'%'
				});
				$('#final-time').html(timer);
				$('#final-correct').attr('aria-valuenow',percentage);
				$('#final-correct').html(Math.round(percentage)+"%");
				$('#final-progress').css({
					width: 100-percentage+'%'
				});
				$('#final-progress').attr('aria-valuenow',100);

				$.ajax({
					url: '{{ $route }}/test',
					type: 'POST',
					data: {
						user_id: '{{ Crypt::encrypt(Auth::user()->id) }}',
						evaluation_id: '{{ Crypt::encrypt($evaluation->id ) }}',
						test_id: '{{ Crypt::encrypt($test->id) }}',
						duration: timer,
						points: points,
						hits: correct_answers,
						mistakes: wrong_answers,
						percentage: percentage,
					},
					success: function(data){
						console.log(data);
					},
					error: function(xhr){
						console.log(xhr);
					}

				});

				setComodinScore();
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
				// $('#spent-result').html($question.answer);
				scene4();
			}

			var decreaseTimer = function(cb){
				// console.log("decrease");
				timing > 0 ? cb(--timing) : spentTime();
			}

			var removeFocusedButtons = function(){
				$('.question-button').removeClass('btn-danger');
				$('.question-button').removeClass('btn-success');
			}

			var answeredTimeout = function(){
				setTimeout(function(){
					removeFocusedButtons();
					if(progress == questions.length){
						$('.next-button').css({
							'display':'none'
						});
						$('.finish-button').fadeIn('slow/400/fast', function() {
							
						});
						setFinalScore(scene3());
					}
					else{
						scene1();
					}
				}, 1000);
			}

			var passQuestion = function(){
				$('.result').fadeOut('slow/400/fast', function() {
					showQuestion();
					$('.result').fadeIn('slow/400/fast', function() {
						
					});
				});
			}

			return {

				init: function(){

					setQuestion(questions);
					setLayout();

					/* EVENT LISTENERS */

					$('.flash-button').on('click', function(e){
						actionMAP.flash.used++;
						e.preventDefault();
						$('.question-button[data-status=true]').addClass('btn-success');
						$('.flash-button').fadeOut('slow/1000/fast', function() {
						});
						setTimeout(function(){
							passQuestion();
							removeFocusedButtons();
						},2000);
					})

					$('.question-button').on('click', function(e){
						e.preventDefault();
						enableRolling = true;
						if($(this).attr('data-status') == 'true'){
							if(actionMAP.clock.status){
								increaseTiming(30);
								actionMAP.clock.status = false;
								console.log("Mas tiempo!");
							}
							if(actionMAP.eraser.status){
								decreaseWrongAnswers();
								actionMAP.eraser.status = false;
								console.log("A Borrar!");
							}
							if(actionMAP.flash.status){
								actionMAP.flash.status = false;
								$('.flash-button').fadeOut();
								console.log("Comodin Saltar!");
							}
							if(actionMAP.plus.status){
								increasePoints(100+timing);
								actionMAP.plus.status = false;
								console.log("Double Puntaje!");
							}
							if(actionMAP.repeat.status){
								actionMAP.repeat.status = false;
								console.log("Comodin Repetir!");
							}
							if(actionMAP.star.status){
								increasePoints(1000);
								actionMAP.star.status = false;
								console.log("1000 PUNTOS!");
							}
							increaseAnswers();
							increasePoints(100+timing);
							$(this).addClass('btn-success');
							answeredTimeout();
						}
						else{
							if(actionMAP.flash.status) $('.flash-button').fadeOut();
							if(actionMAP.repeat.status){
								actionMAP.repeat.used++;
								actionMAP.repeat.status = false;
								$(this).addClass('btn-danger');
							}
							else{
								increaseWrongAnswers();
								decreasePoints(25+time_by_question-timing);
								$(this).addClass('btn-danger');
								$('.question-button[data-status=true]').addClass('btn-success');
								answeredTimeout();
							}
						}
					});

					$('#circle').on('mousedown', function(){
						// console.log("mousedown");
						$(this).addClass('click');
					});

					$('#circle').on('click', function(){
						if(enableRolling){
							console.log("Just Rolling!");
							enableRolling = false;
							intervalCoeficient = 150;
							if(!completedQuestions){
								rouletteStrength = Math.floor((Math.random() * 5000)+1500);
								// console.log(rouletteStrength);
								rouletteRolling = true;
								changeItem();
								// animateSwingRoulette();
								rouletteRollInterval = setInterval(rouletteIntervalFunction, (intervalCoeficient));
								setTimeout(function(){animateSwingRoulette()},rouletteStrength);
							}
							else{
								alert("completed");
							}
						}
					});

					$('#circle').on('mouseup', function(){
						// console.log("mouseup");
						$(this).removeClass('click');
					});

					$('.final-button').on('click', function(){
						setFinalScore(scene3());
					});

					$('.save-button').on('click', function(){
						// -- SAVE BUTTON
					});

				}

			}

		}();

		GameRouletteManager.init();

	</script>