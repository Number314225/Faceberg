// $(document).ready(function(){
//     $("#mark1").click(function(event) {
//         $(".slide1").show();
//         $(".slide2").hide();
//         $(".slide3").hide();
//         $("#mark1").css({"background-color":"#777"});
//         $("#mark2").css({"background-color":"#131313"});
//         $("#mark3").css({"background-color":"#131313"});
//     });
//     $("#mark2").click(function(event) {
//         $(".slide1").hide();
//         $(".slide2").show();
//         $(".slide3").hide();
//         $("#mark1").css({"background-color":"#131313"});
//         $("#mark2").css({"background-color":"#777"});
//         $("#mark3").css({"background-color":"#131313"});
//     });
//     $("#mark3").click(function(event) {
//         $(".slide1").hide();
//         $(".slide2").hide();
//         $(".slide3").show();
//         $("#mark1").css({"background-color":"#131313"});
//         $("#mark2").css({"background-color":"#131313"});
//         $("#mark3").css({"background-color":"#777"});
//     });
//     $(".marks").hover(css({"background-color":"#777"}))
// });

// window.onload = function(){
//     var userInfo = document.getElementById('userInfo');
//     var frndList = document.getElementById('frndList');
//     var setting = document.getElementById('setting');

//     var userInfoPanel = document.getElementById('userInfoPanel');
//     var frndListPanel = document.getElementById('frndListPanel');
//     var settingPanel = document.getElementById('settingPanel');

//     userInfoPanel.style.display = "block";

//     userInfo.onclick = function(){
//         userInfoPanel.style.display = "block";
//         frndListPanel.style.display = "none";
//         settingPanel.style.display = "none";
//     }
//     frndList.onclick = function(){
//         userInfoPanel.style.display = "none";
//         frndListPanel.style.display = "block";
//         settingPanel.style.display = "none";
//     }
//     setting.onclick = function(){
//         userInfoPanel.style.display = "none";
//         frndListPanel.style.display = "none";
//         settingPanel.style.display = "block";
//     }
// }
function openPanel(evt, panel){
    var i;
    var slctContent = document.getElementsByClassName("slctShowPanel");
    for(i = 0; i < slctContent.length; i++){
        slctContent[i].style.display = "none";
    }
    var slctLink = document.getElementsByClassName("slct");
    for(i = 0; i < slctLink.length; i++){
        slctLink[i].className = slctLink[i].className.replace(" active","")
    }
    document.getElementById(panel).style.display = "block";
    evt.currentTarget.className += " active";
}
window.onload = function(){
    document.getElementById("defaultOpen").click();
}



var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

