/*window.addEventListener('load', function(){
    const loaderIndex = document.querySelector(".loaderIndex");
    loaderIndex.className += " hidden";
});

window.addEventListener('load', function(){
    const loaderCustomer = document.querySelector(".loaderCustomer");
    loaderCustomer.className += " hidden";
});
window.addEventListener('load', function(){
    const loaderEmployee = document.querySelector(".loaderEmployee");
    loaderEmployee.className += " hidden";
});
window.addEventListener('load', function(){
    const loaderStoreOwner = document.querySelector(".loaderStoreOwner");
    loaderStoreOwner.className += " hidden";
});
window.addEventListener('load', function(){
    const loaderTotalSales = document.querySelector(".loaderTotalSales");
    loaderTotalSales.className += " hidden";
});
*/

function login(){

    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    
    if (username == "cust" && password == "123"){
        window.location.replace("http://localhost/myFolder/customer.php");
    }

    else if (username == "owner" && password == "pass"){
        window.location.replace("http://localhost/myFolder/storeOwner.php");
    }

    else{
        alert("Wrong Credentials");
    }
}

