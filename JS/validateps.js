function validatePs(){
    
    var pw1=document.getElementById("password").value.toString();
    var pw2=document.getElementById("confpassword").value.toString();
    
    if(pw2.localeCompare("")!=0 && pw1.localeCompare(pw2)!=0){
        document.getElementById("pwdalert").innerHTML="Passwords do not match!";
        document.getElementById("pwdalert").style.color="red";
        // console.log("Passwords not matching");
    }
    else if(pw1.localeCompare(pw2)==0 && pw2.localeCompare("")!=0){
        document.getElementById("pwdalert").innerHTML="Passwords Match";
        document.getElementById("pwdalert").style.color="green";
        // console.log("Match");
    }
    else if(pw2.localeCompare("")==0 || pw1.localeCompare("")==0){
        document.getElementById("pwdalert").innerHTML="Enter both the password fields..";
        document.getElementById("pwdalert").style.color="#6e0000";
        
    }
}
