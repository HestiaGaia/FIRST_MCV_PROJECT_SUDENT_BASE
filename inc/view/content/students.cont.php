<a class="OPTION" href="./?action=logout">LOGOUT/DISCONNECT</a>
<a class="OPTION" id="ADD_BOTTON" href="./?action=ADD_PAGE">ADD STUDENT</a>

<div id="STUDENT_TABLE">
    <?php while ($row=$result->fetch()): ?>
        <a class="column"h href="./?action=obliterate&who=<?=$row[1]?>">Remove</a>
        <a class="column"h href="./?action=MODIFY_PAGE&who=<?=$row[1]?>">Modify</a>
        
        <?php for ($i=1;$i<8;++$i): ?>
            <div class="column">
                <?php if($i==7):?>
                    <img class="img"src="./inc/view/PHOTO/default.png" alt="DEFAULT IMAGE">
                    <?php else:?> <?= $row[$i]; ?>
                <?php endif?>
            </div>
        <?php endfor; ?>
    <?php endwhile; ?>
</table>