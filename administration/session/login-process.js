document.getElementById("login-form").addEventListener("submit", function(e){
    e.preventDefault();


    var xhr = new XMLHttpRequest();
    
    xhr.open("POST", "session/login-process.php?opc=login", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4 && xhr.status === 200){
            var data = JSON.parse(xhr.responseText);
            if(data.username == username){
                //alert("login succesfully");
                location.href ='index.php';
            }else{
                //alert("login failed");
            }
            
        }
    };
    

    var username = document.getElementById("username").value;
    var pass = document.getElementById("pass").value;

    xhr.send("username=" + username + "&pass=" + pass);
})

