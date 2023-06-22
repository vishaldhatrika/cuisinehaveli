var max=20;
function plus(idnum){
    
    var curr=parseInt(document.getElementById(idnum).value,10);
    if(curr>=0 && curr<max)
    {
        document.getElementById(idnum).value=curr+1;

    }

}
function minus(idnum){
    
    var curr=parseInt(document.getElementById(idnum).value,10);
    if(curr>0)
    {
        document.getElementById(idnum).value=curr-1;

    }

}




