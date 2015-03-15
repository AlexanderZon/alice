<html>
<head>
    <title>Hangman Game</title>
    <link rel="stylesheet" type="text/css" href="/games/hangman/page.css">
</head>
<body>
    <div class='topmatter'> <!-- encloses topmatter -->
      <div class='hang-container'>
        <div class='scaffolding-top'></div>
        <div class='scaffolding-left'></div>
    
        <div class='draw-area'>
          <div class='rope'></div>
        </div>
    
        <div class='scaffolding-base'></div>
      </div>
      <div class='side-container'>
        <div class='container-title'>Guess A Letter!</div>
        <div class='input-area'>
          <input id='letter-input' type='text' maxlength='1'/>
        </div>
      </div>
    
      <div class='side-container'>
        <div class='container-title'>Guessed Letters</div>
        <div id="wrong-letters" class='input-area'></div>
      </div>
    </div>
    <div class='bottommatter'>
        <div class='word-box'>
            <div class='word-display'>
            </div>
        </div>
    </div>   
</body>
<script src='/assets/global/plugins/jquery.min.js'></script>
<script src='/games/hangman/ui.js'></script>
<script src='/games/hangman/rules.js'></script>
<script src='/games/hangman/game.js'></script>
</html>