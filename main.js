
function toogleDone(chk, id){
    if(chk.checked===true){
        document.getElementById(id).style.display="block";
    }
    else {
        document.getElementById(id).style="none";
    }
}

