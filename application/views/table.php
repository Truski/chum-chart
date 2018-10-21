<div class="bigflexcontainer">

<?php for($i = 0; $i < 3; $i++): ?>

    <div class="smallflexcontainer">

    <?php for($j = 0; $j < 3; $j++): ?>

        <div class="flexkiddo" id="<?=$i*3+$j?>"" >

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

#0 { background-color: #FFFFFF}
#1 { background-color: #6C9ACC}
#2 { background-color: #3421CA}
#3 { background-color: #FF9494}
#4 { }
#5 { background-color: #471087}
#6 { background-color: #E80000}
#7 { background-color: #780001}
#8 { background-color: #000000}
</style>