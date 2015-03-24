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

	<link rel="stylesheet" type="text/css" href="/games/hangman/css/style.css"/>
	<script type="text/javascript" src="/assets/global/plugins/jquery.min.js"></script>
</head>
<body>

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
						<div class="col-md-6 col-sm-6 col-xs-0">Palabras: </div>
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
			

			<!-- <div class="row enemy center">
				<div class="col-md-1"></div>
				<div class="col-md-2 col-sm-3 col-xs-4"><img id="enemy-rock" class="hand" src="/games/hangman/images/red/rock.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-4"><img id="enemy-paper" class="hand" src="/games/hangman/images/red/paper.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-4"><img id="enemy-scissors" class="hand" src="/games/hangman/images/red/scissors.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-6"><img id="enemy-lizard" class="hand" src="/games/hangman/images/red/lizard.png"/></div>
				<div class="col-md-2 col-sm-3 col-xs-6"><img id="enemy-spock" class="hand" src="/games/hangman/images/red/spock.png"/></div>
				<div class="col-md-1"></div>
			</div> -->
			
			<div class="row question">
				<h1 class="col-md-12 text">&npsp;</h1>
				<h1 class="col-md-12 answer">&nbsp;</h1>
			</div>
			
			<div class="row my-hand center">
				<!-- KEYBOARD -->
				<!-- <div class="col-md-1"></div>
				<div class="col-md-2 col-sm-3 col-xs-4"><img id="my-rock" class="my hand" src="/games/hangman/images/blue/rock.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-4"><img id="my-paper" class="my hand" src="/games/hangman/images/blue/paper.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-4"><img id="my-scissors" class="my hand" src="/games/hangman/images/blue/scissors.png"/></div>
				<div class="col-md-2 col-sm-2 col-xs-6"><img id="my-lizard" class="my hand" src="/games/hangman/images/blue/lizard.png"/></div>
				<div class="col-md-2 col-sm-3 col-xs-6"><img id="my-spock" class="my hand" src="/games/hangman/images/blue/spock.png"/></div>
				<div class="col-md-1"></div> -->
			</div>

			<div class="row result">
				<div class="row question">
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
							<h3 class="col-lg-2 col-md-4 col-sm-4 col-xs-6"><img src="/games/hangman/images/help.png" width="100%"/></h3>
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
							<h3 class="col-md-3 col-sm-3 col-xs-5">Palabras Acertadas: </h3>
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
							<span class="col-md-12 col-sm-12 col-xs-12 btn btn-default btn-lg finish-button">Finalizar</span>
						</div>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1"></div>
				</div>
			</div>

		</div>

		<div class="col-md-4 aside center" id="right-side">
			<div id="battery" class="row battery">
				<div class="col-md-1">&nbsp;</div>
				<div class="col-md-2 charge bg-red">&nbsp;</div>
				<div class="col-md-2 charge bg-orange">&nbsp;</div>
				<div class="col-md-2 charge bg-yellow">&nbsp;</div>
				<div class="col-md-2 charge bg-green">&nbsp;</div>
				<div class="col-md-2 charge bg-blue">&nbsp;</div>
				<div class="col-md-1">&nbsp;</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					Las tijeras cortan el papel, el papel cubre a la piedra, la piedra aplasta al lagarto, el lagarto envenena a Spock, Spock destroza las tijeras, las tijeras decapitan al lagarto, el lagarto se come el papel, el papel refuta a Spock, Spock vaporiza la piedra, y como es habitual... la piedra aplasta las tijeras.
				</div>
			</div> -->
			<div class="col-md-2"></div>
		</div>

	</div>

	<script type="text/javascript">

		/* PROPERTIES */

		var randomize = [];

		var questions = {{ $questions }};

		var $question = null;

		var time_by_question = 90;

		var timing = 0;

		var progress = 0;

		var points = 0;

		var correct_answers = 0;

		var incorrect_answers = 0;

		var battery = 5;

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

		var covered_letters = [];

		var filterStressedVowel = function(letter){

			var stressedVowels = [
					{
						stressed: 'Á',
						vowel: 'A',
					},
					{
						stressed: 'À',
						vowel: 'A',
					},
					{
						stressed: 'Â',
						vowel: 'A',
					},
					{
						stressed: 'Ã',
						vowel: 'A',
					},
					{
						stressed: 'Å',
						vowel: 'A',
					},
					{
						stressed: 'Ä',
						vowel: 'A',
					},
					{
						stressed: 'Æ',
						vowel: 'A',
					},
					{
						stressed: 'Ç',
						vowel: 'C',
					},
					{
						stressed: 'È',
						vowel: 'E',
					},
					{
						stressed: 'É',
						vowel: 'E',
					},
					{
						stressed: 'Ê',
						vowel: 'E',
					},
					{
						stressed: 'Ë',
						vowel: 'E',
					},
					{
						stressed: 'Ì',
						vowel: 'I',
					},
					{
						stressed: 'Í',
						vowel: 'I',
					},
					{
						stressed: 'Î',
						vowel: 'I',
					},
					{
						stressed: 'Ï',
						vowel: 'I',
					},
					{
						stressed: 'Ð',
						vowel: 'D',
					},
					{
						stressed: 'Ò',
						vowel: 'O',
					},
					{
						stressed: 'Ó',
						vowel: 'O',
					},
					{
						stressed: 'Ô',
						vowel: 'O',
					},
					{
						stressed: 'Õ',
						vowel: 'O',
					},
					{
						stressed: 'Ö',
						vowel: 'O',
					},
					{
						stressed: 'Ø',
						vowel: 'O',
					},
					{
						stressed: 'Ù',
						vowel: 'U',
					},
					{
						stressed: 'Ú',
						vowel: 'U',
					},
					{
						stressed: 'Û',
						vowel: 'U',
					},
					{
						stressed: 'Ü',
						vowel: 'U',
					},
					{
						stressed: 'ß',
						vowel: 'S',
					},
				];

			for(vowel in stressedVowels){
				if(stressedVowels[vowel].stressed == letter) {
					console.log("stressed vowel at " + stressedVowels[vowel].stressed);
					return stressedVowels[vowel].vowel;
				}
			}

			return letter;

		}

		var lettersWithoutSpaces = function(word){

			var counter = 0;

			for(letter in word){
				if(word[letter] != ' ') counter++;
			}

			return counter;

		}

		var setUnderLinedWord = function(word){

			var upperWord = word.toUpperCase();
			console.log(upperWord + ' has ' + lettersWithoutSpaces(upperWord) + ' letters');
			var html_answer = '';
			var covered_positions = 0;
			for (var i = 0; i < upperWord.length; i++) {
				bool = false;
				for(var j = 0; j < covered_letters.length; j++){
					if(filterStressedVowel(upperWord[i]) == covered_letters[j]) bool = true;
				}
				console.log(upperWord[i] == ' ');
				if (bool) {
					covered_positions++;
					html_answer += ' ' + upperWord[i] + ' ';
				}
				else if(upperWord[i] == ' '){
					html_answer += ' &nbsp; ';
				}
				else{
					html_answer += ' _ ';						
				}
			};
			if(covered_positions == lettersWithoutSpaces(upperWord)){
				wellDone();
			}
			$('.answer').html(html_answer);

			return upperWord;

		}

		var decreaseInterval = null;

		var setQuestion = function(questions){
			$question = selectQuestion(questions);
			setScore(questions);
			$question.word = setUnderLinedWord($question.word);
			time_by_question = $question.seconds;
			resetTimer(setTimer);
			decreaseInterval = setInterval(function(){
				decreaseTimer(setTimer);
			}, 1000);
			console.log("setQuestion");
			// setAnswers($question.options);
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
			$('#spent-result').html($question.word);
			scene4();
		}

		var decreaseTimer = function(cb){
			console.log("decrease");
			timing > 0 ? cb(--timing) : spentTime();
		}

		var lowBattery = function(){
			clearInterval(decreaseInterval);
			if(progress == questions.length){
				$('.next-button').css({
					'display':'none'
				});
				$('.finish-button').fadeIn('slow/400/fast', function() {
					
				});
			}
			$('#answers-result').html($question.word);
			$('#result-title').html('Bateria Agotada');
			scene2();
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

		var displayBattery = function(){
			if(battery < 0){
				lowBattery();
			}
			else{
				for(var i = 0; i < $('.charge').length; i++){
						console.log('Battery Discount ' + battery);
					if(i>=battery) {
						elem = $('.charge').get(i);
						$(elem).css({'background-color':'#000'});
					} 
				}
			}
		}

		var discountBattery = function(){
			battery--;
			console.log(battery);
			displayBattery();
		}

		var letterIsCovered = function(letter){
			var bool = false;
			for(var i = 0 ; i < covered_letters.length; i++){
				if(letter == covered_letters[i]) bool = true;
			}
			return bool;
		}

		var verifyLetter = function(letter){
			bool = false;
			if(!letterIsCovered(letter)){
				for(var i = 0; i < $question.word.length ; i++){
					if(letter == $question.word[i]) bool = true;
				}
				if(bool) {
					increasePoints(10);
					covered_letters.push(letter);
					setUnderLinedWord($question.word);
				}
				else{
					discountBattery();
				}
			}
		}

		/* EVENT LISTENERS */

		$('.next-button').on('click', function(){
			covered_letters = [];
			setQuestion(questions);
			scene1();
		});

		$('.finish-button').on('click', function(){
			setFinalScore(scene3);
		});

		$('.save-button').on('click', function(){
			// -- SAVE BUTTON
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
		})

		$(document).on('ready', function(){
			setQuestion(questions);
			setLayout();
		});


	</script>
</body>
</html>