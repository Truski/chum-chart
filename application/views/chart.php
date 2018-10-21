
<div class="bigflexcontainer">

    <div class="smallflexcontainer">
        <div class="flexkiddo" style="width:70px">
            <!-- nothing -->
        </div>
        <div class="flexkiddo header">
            Lawful
        </div>
        <div class="flexkiddo header">
            Neutral
        </div>
        <div class="flexkiddo header">
            Chaotic
        </div>
    </div>

    <div class="smallflexcontainer">
        <div class="flexkiddo header left">
            Good
        </div>
        <div class="flexkiddo" id="1">
            <img src="<?=$lg->photourl?>" />
        </div>
        <div class="flexkiddo" id="2">
            <img src="<?=$ng->photourl?>" />
        </div>
        <div class="flexkiddo" id="3">
            <img src="<?=$cg->photourl?>" />
        </div>
        
    </div>

    <div class="smallflexcontainer">
        <div class="flexkiddo header left">
            Neutral
        </div>
        <div class="flexkiddo" id="4">
            <img src="<?=$ln->photourl?>" />
        </div>
        <div class="flexkiddo" id="5">
            <img src="<?=$tn->photourl?>" />
        </div>
        <div class="flexkiddo" id="6">
            <img src="<?=$cn->photourl?>" />
        </div>
        
    </div>

    <div class="smallflexcontainer">
        <div class="flexkiddo header left">
            Evil
        </div>
        <div class="flexkiddo" id="7">
            <img src="<?=$le->photourl?>" />
        </div>
        <div class="flexkiddo" id="8">
            <img src="<?=$ne->photourl?>" />
        </div>
        <div class="flexkiddo" id="9">
            <img src="<?=$ce->photourl?>" />
        </div>
        
    </div>

</div>

<style>

.bigflexcontainer {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    background-color: black;
    width: 450px;
    height: 390px;
    padding:10px;
}

.smallflexcontainer {
    display: flex;
    justify-content: space-around;
    width: 100%;
    flex-direction: run;
    align-items: center;
    flex-grow: 1;
}

.flexkiddo {
    text-align: center;
    font-size: 18pt;
    padding: 10px;
    flex-grow: 1;
}

.flexkiddo > img {
    width: 100px;
    height: 100px;
}

.header {
    color: white;
    width: 100px;
    font-family: IMPACT;
    
}

.left {
    text-align: right;
    vertical-align: center;
}

#1 { background-color: #FFFFFF}
#2 { background-color: #6C9ACC}
#3 { background-color: #3421CA}
#4 { background-color: #FF9494}
#5 { }
#6 { background-color: #471087}
#7 { background-color: #E80000}
#8 { background-color: #780001}
#9 { background-color: #000000}
</style>