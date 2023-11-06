<?php
    $userid= $_SESSION['user']['userid'];
    $tvid= filter_input(INPUT_GET, "tvid");
    $tv=$db->getKivalasztottTV($tvid);
    if ($vasarlas= filter_input(INPUT_POST, "vasarlas", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
        $tvid= filter_input(INPUT_POST, "tvid", FILTER_VALIDATE_INT);
        $userid= filter_input(INPUT_POST, "userid", FILTER_VALIDATE_INT);
        echo 'rögítve';
    }
    echo '<p>Valóban szeretné a '.$tv['tv_neve'].' nevű tvt megvásárolni?</p>';
    if ($db->setVasarlasTV($tvid, $_SESSION['user']['userid'])) 
    {
        
    }
    else
    {
        echo 'Sikertelen rögzítés';
    }
  
?>
<form method="POST">
    <input type="hidden" name="userid" value="<?php echo $_SESSION['user']['userid']; ?>">
    <input type="hidden" name="tvid" value="<?php echo $tvid; ?>">
    <a href="index.php?menu=sikeres" class="btn btn-danger" name="vasarlas" value="1">Igen</button>
    <a href="index.php?menu=home" class="btn btn-light" >Nem</a>
</form>