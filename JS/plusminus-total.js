max=20;
function plus(idnum,fprice){
    
    var curr=parseInt(document.getElementById(idnum).value,10);
    
    // alert('hello');
    // var fp=parseInt(ftotal,10);
    if(curr>=0 && curr<max)
    {
        document.getElementById(idnum).value=curr+1;
        var gt=parseInt(document.getElementById('gtotal').innerHTML,10);
        document.getElementById('gtotal').innerHTML=gt+parseInt(fprice);

    }

}

function minus(idnum,fprice){
    
    var curr=parseInt(document.getElementById(idnum).value,10);
    if(curr>0)
    {
        document.getElementById(idnum).value=curr-1;
        var gt=parseInt(document.getElementById('gtotal').innerHTML,10);
        document.getElementById('gtotal').innerHTML=gt-parseInt(fprice);
        // document.getElementById('p'+idnum).value=

    }

}