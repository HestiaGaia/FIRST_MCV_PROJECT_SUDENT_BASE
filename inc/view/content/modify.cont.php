<div id="MODIFY_SECTION_TITLE">
        Modifier les informations de l'eleve identifier par CNE: <?=$result[0]?> 
    </div>
<form id="MODIFY_SECTION" method="POST" enctype="multipart/form-data" action="?action=modify">
    <!--INPUTS-->
    <input type="hidden" name="CNE" value="<?=$result[1]['CNE']?>">
    <div class="info" >
        <label for="NOM">NOM</label>
        <input id="NOM" type="text" name="NOM" placeholder="<?=$result[1]['Nom']?>">
    </div>
    <div class="info">
        <label for="PRENOM">PRENOM</label>
        <input id="PRENOM" type="text" name="PRENOM" placeholder="<?=$result[1]['Prenom']?>">
    </div>
    <div class="info">
        <label for="ADDR">ADRESSE</label>
        <input id="ADDR" type="text" name="ADDR" placeholder="<?=$result[1]['Adresse']?>">
    </div>
    <div class="info">
        <label for="VILLE">VILLE</label>
        <input id="VILLE" type="text" name="VILLE" placeholder="<?=$result[1]['Ville']?>">
    </div>
    <div class="info">
        <label for="EMAIL">EMAIL</label>
        <input id="EMAIL" type="text" name="EMAIL" placeholder="<?=$result[1]['email']?>">
    </div>

    <input id="MODIFY_SUBMIT" type="submit" name="MODIFY" value="MODIFY" >
    <a href="./?action=back">BACK</a>
</form>