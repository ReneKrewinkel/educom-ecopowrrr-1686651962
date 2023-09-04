function checkActive(){
    var accountDetail = document.getElementById("account");
    
    if(accountDetail.classList.contains("deactivate")){
        accountDetail.classList.remove("deactivate");
    }else{
        accountDetail.classList.add("deactivate");
    }
}

window.addEventListener('scroll', scrollNavBar);

function scrollNavBar() 
{
    //navbar
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar").style.padding = "10px 20px";
        document.getElementById("navbar").style.height = "110px";
        document.getElementById("navbar").style.backgroundColor = "#fcf9c6b3";
    } else {
        document.getElementById("navbar").style.padding = "10px 10px";
        document.getElementById("navbar").style.height = "120px";
        document.getElementById("navbar").style.backgroundColor = "#fcf9c6";
    }

}