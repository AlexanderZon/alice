	<link rel="stylesheet" type="text/css" href="/games/memory/css/style.css"/>
	<script type="text/javascript" src="/assets/global/plugins/jquery.min.js"></script>

	<div class="row content">

		<div class="col-md-12" id="left-side">
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
						<div class="col-md-6 col-sm-6 col-xs-0">Respuestas: </div>
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
					<div class="col-md-12 col-sm-12 col-xs-12 center" id="indications">&nbsp;</div>
				</div>
			</div>
			

			<!-- <div class="row enemy center">
				<div class="col-md-1"></div>
				<div class="col-md-2 col-sm-3 col-xs-4"><img id="enemy-rock" class="hand" src="/games/hangman/images/red/rock.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-4"><img id="enemy-paper" class="hand" src="/games/hangman/images/red/paper.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-4"><img id="enemy-scissors" class="hand" src="/games/hangman/images/red/scissors.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-6"><img id="enemy-lizard" class="hand" src="/games/hangman/images/red/lizard.png"/></div>
				<div class="col-md-2 col-sm-3 col-xs-6"><img id="enemy-spock" class="hand" src="/games/hangman/images/red/spock.png"/></div>
				<div class="col-md-1"></div>
			</div> -->
			
			<div class="row cards center">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					@foreach(json_decode($questions) as $question)
						<div class="row card question">&nbsp;</div>
					@endforeach
					<!-- <div class="row card question">&nbsp;</div>
					<div class="row card question">&nbsp;</div>
					<div class="row card question">&nbsp;</div>
					<div class="row card question">&nbsp;</div> -->
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					@foreach(json_decode($questions) as $question)
						<div class="row card answer disable">&nbsp;</div>
					@endforeach
					<!-- <div class="row card answer disable">&nbsp;</div>
					<div class="row card answer disable">&nbsp;</div>
					<div class="row card answer disable">&nbsp;</div>
					<div class="row card answer disable">&nbsp;</div> -->
				</div>
			</div>

			<div class="row result">
				<div class="row">
					<h1 class="col-md-12 text">
						
					</h1>					
				</div>
				<div class="row center">
					<div class="col-md-1 col-sm-1 col-xs-1"></div>
					<div class="col-md-10 col-sm-10 col-xs-10" id="result-msg">
						<div class="row" id="answer-selected">
							<h1 class="col-md-12 col-sm-12 col-xs-12" id="result-title">Bateria Descargada</h1>
							<h3 class="col-md-12 col-sm-12 col-xs-12">Respuesta correcta:</h3>
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
					<div class="col-md-1 col-sm-1 col-xs-1"></div>
				</div>
			</div>

			<div class="row final-score center">
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
							<h3 class="col-lg-2 col-md-4 col-sm-4 col-xs-6"><img src="{{ Auth::user()->profile->getAvatar() }}" width="100%"/></h3>
							<div class="col-lg-5 col-md-4 col-sm-4 col-xs-3"></div>
						</div>
						<div class="row" id="answer-selected">
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
							<h3 class="col-md-5 col-sm-5 col-xs-5 right">Puntos: </h3>
							<h3 class="col-md-5 col-sm-5 col-xs-5" id="final-points">0</h3>
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
						</div>
						<div class="row">
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
							<h3 class="col-md-5 col-sm-5 col-xs-5 right">Respuestas Acertadas: </h3>
							<h3 class="col-md-5 col-sm-5 col-xs-5" id="final-answers">0</h3>
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
						</div>
						<div class="row">
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
							<h3 class="col-md-5 col-sm-5 col-xs-5 right">Respuestas Erróneas: </h3>
							<h3 class="col-md-5 col-sm-5 col-xs-5" id="final-wrong-answers">0</h3>
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
						</div>
						<div class="row">
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
							<h3 class="col-md-5 col-sm-5 col-xs-5 right">Tiempo (segundos): </h3>
							<h3 class="col-md-5 col-sm-5 col-xs-5" id="final-timing">0</h3>
							<div class="col-md-1 col-sm-1 col-xs-1"></div>
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
							<span class="col-md-6 col-sm-6 col-xs-8 btn btn-primary btn-lg evaluation-back-btn" data-evaluationable-id="{{ Hashids::encode($evaluation->evaluationable_id )}}" data-evaluationable-type="{{ $evaluation->evaluationable_type }}">Volver</span>
							<div class="col-md-3 col-sm-3 col-xs-2"></div>
						</div>
						<div class="row">&nbsp;</div>
						<div class="row">&nbsp;</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-1"></div>
				</div>
			</div>

			<div class="row spent-time">
				<div class="row">
					<h1 class="col-md-12 text">
						
					</h1>					
				</div>
				<div class="row center">
					<div class="col-md-1 col-sm-1 col-xs-1"></div>
					<div class="col-md-10 col-sm-10 col-xs-12" id="result-msg">
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
							<span class="col-md-12 col-sm-12 col-xs-12 btn btn-default btn-lg finish-button">Finalizar</span
						</div>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1"></div>
				</div>
			</div>

		</div>

	</div>

	<script type="text/javascript">

		var GameMemoryManager = function(){

			/* PROPERTIES */

			var randomize = [];

			var seconds = 240;

			var questions = {{ $questions }};

			var $question = null;

			var time_by_question = 120;

			var timing = 0;

			var progress = 0;

			var points = 0;

			var correct_answers = 0;

			var wrong_answers = 0;

			var incorrect_answers = 0;

			var selected_question = null;

			/* METHODS */

			var setScore = function(questions){
				$('#progress').html(progress+'/'+questions.length);
				$('#points').html(points);
			}

			var duringProgressBar = function(){

				$({
					width:((progress)/questions.length*100)-((correct_answers)/questions.length*100),
					percentage: (progress)/questions.length*100,
				}).animate({
					width:((progress)/questions.length*100)-((correct_answers)/questions.length*100),
					percentage: (progress)/questions.length*100,
				},{
	      			easing:'swing',
	      			step: function() {
				        $('#during-progress').css({width: this.percentage+'%'}, function(){console.log("width")});
				    }
	      		});

			}

			var setLayout = function(){

				$('#right-side').height($('#left-side').height());

			}

			var setQuestion = function(questions){

				do{
					temp = Math.floor((Math.random() * questions.length));
					band = false;
					if($.inArray(temp, randomize) >= 0) band = true;
				}while(band);
			
				randomize.push(temp);
				return questions[temp];

			}

			var setDesktop = function(questions){

				duringProgressBar();

				var question_containers = $('.question');
				var answer_containers = $('.answer');
				var question = null;

				for(var i = 0; i < question_containers.length ; i++){
					console.log('question cicle');
					question = setQuestion(questions);
					$(question_containers[i]).html(question.question);
					$(question_containers[i]).attr('data-id',question.id);
				}

				randomize = [];

				for(var i = 0; i < answer_containers.length ; i++){
					console.log('question cicle');
					question = setQuestion(questions);
					$(answer_containers[i]).html(question.answer);
					$(answer_containers[i]).attr('data-id',question.id);
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
				$('.cards').fadeOut('slow/400/fast', function() {
					
				});
				$('.question').fadeOut('slow/400/fast', function() {
					
				});
				$('#indications').fadeOut('slow/400/fast', function() {
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

			var setScreen = function(questions){
				indication1();
				setDesktop(questions);
				setScore(questions);
				// $question.word = setUnderLinedWord($question.word);
				time_by_question = questions.length*120;
				resetTimer(setTimer);
				decreaseInterval = setInterval(function(){
					decreaseTimer(setTimer);
				}, 1000);
				console.log("setScreen");
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

			var increaseWrongAnswers = function(){
				wrong_answers++;
			}

			var setFinalScore = function(scene){
				percentage = correct_answers*100/(correct_answers+wrong_answers);
				clearInterval(decreaseInterval);
				$('#final-points').html(points);
				$('#final-answers').html(correct_answers);
				$('#final-wrong-answers').html(wrong_answers);
				$('#final-timing').html((time_by_question-timing));

				$('#final-correct').css({
					width: percentage+'%'
				});
				$('#final-correct').attr('aria-valuenow',percentage);
				$('#final-correct').html(Math.floor(percentage)+"%");

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
						duration: time_by_question-timing,
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
				scene4();
			}

			var decreaseTimer = function(cb){
				console.log("decrease");
				timing > 0 ? cb(--timing) : spentTime();
			}

			var wellDone = function(){
				clearInterval(decreaseInterval);
				if(progress == questions.length){
					$('.next-button').css({
						'display':'none'
					});
					$('.finish-button').fadeIn('slow/400/fast', function() {
						
					});
				}
				$('#answers-result').html($question.word);
				$('#result-title').html('Bien Hecho has acertado');
				increaseAnswers();
				scene2();
			}

			var indication1 = function(){
				
				$('#indications').html('Seleccione una pregunta en la parte izquierda');

			}

			var indication2 = function(){

				$('#indications').html('Ahora seleccione la respuesta correspondiente a la pregunta seleccionada en la parte derecha');

			}

			var indication3 = function(){

				$('#indications').html('¡Bien Hecho!, Respuesta correcta');

			}

			var indication4 = function(){

				$('#indications').html('¡Incorrecto!, Respuesta errónea');

			}

			var indication5 = function(){

				$('#indications').html('Bravo!, Has completado la Actividad');

			}

			var indicatorTimeout = null;

			var submitFinalScore = function(){

			}

			return {

				init: function(){

					setScreen(questions);
					setLayout();

					/* EVENT LISTENERS */

					$('.question').on('click', function(){
						clearTimeout(indicatorTimeout);
						$('.question').removeClass('selected');
						$('.answer').removeClass('disable');
						selected_question = $(this).attr('data-id');
						$(this).addClass('selected');
						$('#indications').html('Ahora seleccione la respuesta correspondiente a la pregunta seleccionada en la parte derecha');
						/*covered_letters = [];
						setScreen(questions);
						scene1();*/
					});

					$('.answer').on('click', function(){
						clearTimeout(indicatorTimeout);
						if(!$(this).hasClass('disable')){
							$('.question').removeClass('selected');
							$('.answer').addClass('disable');
							if($(this).attr('data-id') == selected_question){
								$('div[data-id='+$(this).attr('data-id')+']').fadeOut('slow/400/fast', function() {});
								indication3();
								progress++;
								increasePoints(100+timing);
								increaseAnswers();
								setScore(questions);
								duringProgressBar();

								if(correct_answers < questions.length){
									indicatorTimeout = setTimeout(function(){
										indication1();
										console.log('timeout');
									}, 2000);
									console.log('correct');
								}
								else{
									indicatorTimeout = setTimeout(function(){
										indication5();
										setFinalScore(scene3);
									}, 0);
								}
								
							}
							else{
								console.log('wrong');
								decreasePoints(seconds-timing);
								increaseWrongAnswers();
								indication4();
								setTimeout(function(){
									indication1();
									console.log('timeout');
								}, 2000);
							}
						}
						else{
							indication1();
							console.log('disabled');
						}
					})

					$('.finish-button').on('click', function(){
						setFinalScore(scene3);
					});

					$('.save-button').on('click', function(){
						// -- SAVE BUTTON
						submitFinalScore();
					});

					$(document).on('keypress', function(e){
						e.preventDefault();
						var code = e.charCode;
							var letter = String.fromCharCode(code);
							console.log('code: ' + code);
						if((code >= 48 && code <= 57) || (code >= 65 && code <= 90) || (code >= 97 && code <= 122) || code == 241 || code == 209){
							console.log('Intervalo: ' + code);
							verifyLetter(letter.toUpperCase());
						}
					});

				}

			}

		}();

		GameMemoryManager.init();

	</script>