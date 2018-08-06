<?
global $secondText;
?>
    <a class="scroll-mouse">
        <img src="<?= path() ?>img/mouse.png" alt="mouse">
        <p><?= $secondText ? 'не убедили' : 'интересно' ?>? ... крутите вниз</p>
    </a>
<? $secondText = false ?>