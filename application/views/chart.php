<div class="bigflexcontainer">

<?php for($i = 0; $i < 4; $i++): ?>

    <div class="smallflexcontainer">

    <?php for($j = 0; $j < 4; $j++): ?>

        <div class="flexkiddo" id="<?=$i*4+$j?>"" >

        </div>

    <? endfor; ?>

    </div>

<? endfor; ?>

</div>

<style>

.bigflexcontainer {
    display: flex;
    flex-direction: column;
    align-items: stretch;
}

.smallflexcontainer {
    display: flex;
    align-items: stretch;
}

.flexkiddo {

}

#5 { background-color: #FFFFFF}
#6 { background-color: #6C9ACC}
#7 { background-color: #3421CA}
#9 { background-color: #FF9494}
#10 { }
#11 { background-color: #471087}
#13 { background-color: #E80000}
#14 { background-color: #780001}
#15 { background-color: #000000}
</style>