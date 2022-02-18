var num1 = 0;


/*Function go to page 1 and adjusts style and Web Storage*/
function nav1() {
    document.getElementById('nav1').style.color = "#ffffff";
    document.getElementById('nav2').style.color = "#000000";
    document.getElementById('nav3').style.color = "#000000";
    document.getElementById('nav4').style.color = "#000000";
    document.getElementById('selectA').style.left = "0px";
}



/*Function go to page 2 and adjusts style and Web Storage*/
function nav2() {
    document.getElementById('nav1').style.color = "#000000";
    document.getElementById('nav2').style.color = "#ffffff";
    document.getElementById('nav3').style.color = "#000000";
    document.getElementById('nav4').style.color = "#000000";
    document.getElementById('selectA').style.left = "120px";
}



/*Function go to page 3 and adjusts style and Web Storage*/
function nav3() {
    document.getElementById('nav1').style.color = "#000000";
    document.getElementById('nav2').style.color = "#000000";
    document.getElementById('nav3').style.color = "#ffffff";
    document.getElementById('nav4').style.color = "#000000";
    document.getElementById('selectA').style.left = "240px";
}



/*Function go to page 4 and adjusts style and Web Storage*/
function nav4() {
    document.getElementById('nav1').style.color = "#000000";
    document.getElementById('nav2').style.color = "#000000";
    document.getElementById('nav3').style.color = "#000000";
    document.getElementById('nav4').style.color = "#ffffff";
    document.getElementById('selectA').style.left = "360px";
}



/*Function that opens the online cart/login*/
function wagenOpen() {
    document.getElementById('wwBack').style.display = "block";
}
function wagenClose() {
    document.getElementById('wwBack').style.display = "none";
}
function loginOpen() {
    document.getElementById('loginBack').style.display = "block";
}
function loginClose() {
    document.getElementById('loginBack').style.display = "none";
}


function goto(){
    window.location.href = "http://localhost/Supermarkt/public_html/index-product.php";
}