var modal = document.getElementById('lginPanel');
window.onclick = function(event){
    // alert("it is not modal.");
    if(event.target === modal){
        // alert("it is modal.");
        modal.style.display = "none";
    }
}
function clkSgupSubmitBtn(){
    var strSgupEmail = document.getElementById("sginEmail").value;
    var strSgupPsw = document.getElementById("sginPsw").value;
    var strSgupPswRpt = document.getElementById("sginPswRpt").value;
    if(strSgupEmail === ""){
        alert("Please write your Email address.");
        return false;
    }else if(strSgupPsw === ""){
        alert("Please write your Password.");
        return false;
    }else if(strSgupPswRpt === ""){
        alert("Please Repeat your Password.");
        return false;
    }else{
        if(!isEmail(strSgupEmail)){
            alert("Email address seem to be uncorrect.");
            return false;
        }else if(strSgupPsw !== strSgupPswRpt){
            alert("Entered passwords differ from the another.");
            return false;
        }else{
            return true;
        }
    }
}
function clkLginSubmitBtn(){
    var strLginEmail = document.getElementById("lginEmail").value;
    var strLginPsw = document.getElementById("lginPsw").value;
    // alert(strLginEmail);
    // alert(strLginPsw);
    if(strLginEmail === ""){
        alert("Please write your Email address.");
        return false;
    }else if(strLginPsw === ""){
        alert("Please write your Password.");
        return false;
    }else{
        if(!isEmail(strLginEmail)){
            alert("Email address seem to be uncorrect.");
            return false;
        }else{
            return true;
        }
    }
}
function isEmail(strEmail){
    return /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(strEmail);
}


