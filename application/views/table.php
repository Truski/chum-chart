<div class="bigflexcontainer">

<?php for($i = 0; $i < 3; $i++): ?>

    <div class="smallflexcontainer">

    <?php for($j = 0; $j < 3; $j++): ?>

        <div class="flexkiddo" id=<?=$i*3+j?> >

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

</style>