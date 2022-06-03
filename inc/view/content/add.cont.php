<form id="ADD_SECTION" method="POST" enctype="multipart/form-data" action="?action=add">
    <!--INPUTS-->
    <input type="text" name="CNE" placeholder="CNE" required>
    <input type="text" name="NOM" placeholder="NOM">
    <input type="text" name="PRENOM" placeholder="PRENOM">
    <input type="text" name="ADDR" placeholder="ADRESSE" >
    <input type="text" name="VILLE" placeholder="VILLE">
    <input type="text" name="EMAIL" placeholder="EMAIL">
    <input type="file" name="IMG" placeholder="IMG">
    <input id="ADD_SUBMIT" type="submit" name="ADD" value="ADD">
    <a href="./?action=back">BACK</a>
</form>