function fun(id)
{
    var food_section=document.getElementById('food-menu');
     if(food_section.style.display=='none')
     food_section.style.display="block";

    var elmntToView = document.getElementById((id+"Scroll"));

    if(elmntToView.style.display=="block")
        elmntToView.style.display="none";
    else
        elmntToView.style.display="block";

    elmntToView.scrollIntoView(); 

}

function hideOnPageLoad()
{
    
    // alert("Hello");
    var element=document.getElementById('food-menu');
    element.style.display="none";
    
}

// function hiddenItem(id)
// {
//     var item=document.getElementById(id);
//     item.style.display='none';
// }
window.onload=hideOnPageLoad;