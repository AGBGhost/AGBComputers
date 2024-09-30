function showslidebar(){
    var slidebar = document.getElementById("slidebar");
    

    slidebar.classList.toggle("d-none");
   
}



function showslidebar2(){
    
    var slidebar = document.getElementById("slidebar2")

    slidebar.classList.toggle("d-none");
}


function changeView(){
    
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signup(){
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    

    var form = new FormData();
    form.append("f",fname.value);
    form.append("l",lname.value);
    form.append("e",email.value);
    form.append("p",password.value);
    form.append("m",mobile.value);

    var request = new XMLHttpRequest();

request.onreadystatechange = function(){
    if(request.status == 200 & request.readyState == 4){
        var response = request.responseText;
        if(response == "success"){
       document.getElementById("msg").innerHTML = "Registration Successfull";
       document.getElementById("msg").className ="alertboxtext";
       document.getElementById("msgdiv").className = "d-block";

        }else{
            document.getElementById("msg").innerHTML = response;
            document.getElementById("msgdiv").className = "d-block";
        }
    }
}

    request.open("POST","signupProcess.php",true);
    request.send(form);
}

function signin(){

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var form = new FormData();
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("r", rememberme.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;

            if (response == "success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgdiv1").className = "d-block";
            }

        }
    }

    request.open("POST", "signInProcess.php", true);
    request.send(form);

}


var forgotPasswordModal;
 
function forgotPassword(){
    

    var email =document.getElementById("email2");

    var request = new XMLHttpRequest();

request.onreadystatechange = function(){
    if(request.status == 200 & request.readyState == 4) {
        var text = request.responseText;


if (text == "Success") {
    alert ("Verification code has sent successfully. Please check your Email.");
    var modal = document.getElementById("fpmodal");
    forgotPasswordModal = new bootstrap.Modal(modal);
    forgotPasswordModal.show();

}else{
    document.getElementById("msg1").innerHTML = text;
    document.getElementById("msgdiv1").className = "d-block";
}
       
}
}

    request.open("GET","forgotPasswordProcess.php?e=" + email.value,true);
    request.send();
    
}

function showPassword1(){

     var textfield = document.getElementById("np");
     var button = document.getElementById("npb");

     if(textfield.type == "password"){
        textfield.type = "text";
        button.innerHTML = "Hide";
     }else{
        textfield.type = "password";
        button.innerHTML = "Show";
     }

}

function showPassword2(){

    var textfield = document.getElementById("rnp");
    var button = document.getElementById("rnpb");

    if(textfield.type == "password"){
       textfield.type = "text";
       button.innerHTML = "Hide";
    }else{
       textfield.type = "password";
       button.innerHTML = "Show";
    }

}

function resetPassword(){

      var email = document.getElementById("email2");
      var newPassword = document.getElementById("np");
      var retypePassword = document.getElementById("rnp");
      var verification = document.getElementById("vcode");
      
var form =  new FormData();
   form.append("e",email.value);
   form.append("n",newPassword.value);
   form.append("r",retypePassword.value);
   form.append("v",verification.value);

var request = new XMLHttpRequest();
 
request.onreadystatechange = function() {
    if(request.status == 200 & request.readyState === 4){
        var response = request.responseText;
        if(response == "success"){
            alert ("Password updated successfully.");
            forgotPasswordModal.hide();
        }else{
            alert (response);
        }

    }
}

request.open("POST","resetPasswordProcess.php",true);
request.send(form);


}


function signout(){
    
    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
        if(request.status == 200 & request.readyState == 4){
            var response = request.responseText;
            if(response == "success"){
                window.location.reload();
            }
        }
    }

    request.open("GET","signOutProcess.php",true);
    request.send();
}




function adminSignIn(){
    var email = document.getElementById("email");
    var pw = document.getElementById("pw");

  //alert(email.value);

  var f = new FormData();
f.append("e",email.value);
f.append("p",pw.value);

var request = new XMLHttpRequest();
request.onreadystatechange = function () {
    if(request.readyState ==  4 & request.status == 200){
        var response = request.responseText;
        //alert(response);
        if (response == "success") {
            window.location = "adminDashboard.php";
        }else{
            document.getElementById("msg").innerHTML = response;
            document.getElementById("msgDiv").className = "d-block";
        }
       
    }
};



request.open("POST","adminSignInProcess.php",true);
request.send(f);

}


function loadUser(){
    
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if(request.readyState ==  4 & request.status == 200){
            var response = request.responseText;
           // alert(response);
            document.getElementById("tb").innerHTML = response;
        }


    };
    request.open("POST","loadUserProcess.php",true);
    request.send();

}



function statusUpdate(){
    var useremail = document.getElementById("uemail");
    //alert(useremail.value);

    var f = new FormData();
    f.append("u",useremail.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function (){

        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);

            if (response == "Deactivate") {
                document.getElementById("msg").innerHTML = "User Deactivate Successfuly";
                document.getElementById("msgDiv").className ="d-block";
                useremail.value = "";
                loadUser();
                
               } else if (response == "Active"){
                document.getElementById("msg").innerHTML = "User Activate Successfuly";
                document.getElementById("msgDiv").className ="d-block";
                useremail.value = "";
                loadUser();
    
               } else {
               
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className ="d-block";
               }

            
        }
    };


    request.open("POST","statusUpdateProcess.php",true);
    request.send(f);

   
}

function reload(){
    location.reload();
}






function brandReg(){

    var brand = document.getElementById("brand");

    var f = new FormData();
    f.append("b",brand.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {

        if(request.readyState ==  4 & request.status == 200){
            var response = request.responseText;
           // alert(response);
           if(response == "Success") {
            document.getElementById("msg1").innerHTML = "brand Registration Successfully";
            document.getElementById("msg1").className = "alert alert-success";
            document.getElementById("msgDiv1").className ="d-block";
            brand.value = "";

           }else{
            document.getElementById("msg1").innerHTML = response;
            document.getElementById("msgDiv1").className ="d-block";
           }

    }

};

request.open("POST","brandRegisterProcess.php",true);
request.send(f);

}



function categoryReg(){

    var cat = document.getElementById("cat");

    var f = new FormData();
    f.append("c",cat.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {

        if(request.readyState ==  4 & request.status == 200){
            var response = request.responseText;
           // alert(response);
           if(response == "Success") {
            document.getElementById("msg2").innerHTML = "category Registration Successfully";
            document.getElementById("msg2").className = "alert alert-success";
            document.getElementById("msgDiv2").className ="d-block";
            cat.value = "";

           }else{
            document.getElementById("msg2").innerHTML = response;
            document.getElementById("msgDiv2").className ="d-block";
           }

    }

};

request.open("POST","categoryRegisterProcess.php",true);
request.send(f);


}



function modelReg(){
    
    var model = document.getElementById("model");

    var f = new FormData();
    f.append("m",model.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {

        if(request.readyState ==  4 & request.status == 200){
            var response = request.responseText;
           // alert(response);
           if(response == "Success") {
            document.getElementById("msg3").innerHTML = "model Registration Successfully";
            document.getElementById("msg3").className = "alert alert-success";
            document.getElementById("msgDiv3").className ="d-block";
            model.value = "";

           }else{
            document.getElementById("msg3").innerHTML = response;
            document.getElementById("msgDiv3").className ="d-block";
           }

    }

};

request.open("POST","modelRegisterProcess.php",true);
request.send(f);
    

}



function loadProduct(x){
    //alert ("ok");
    var select = document.getElementById("basic_select");

    //alert(select.value);
var form = new FormData();
form.append("s",select.value);
form.append("page",x);
    
var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
    if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;
        //alert(response);
        document.getElementById("loadProduct").innerHTML = response;
        
    }
};


    request.open("POST","loadProductProcess.php",true);
    request.send(form);
    
}



   
    
function addProduct() {
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var model = document.getElementById("model");
    var title = document.getElementById("title");
    var cost = document.getElementById("cost");
    var qty = document.getElementById("qty");
    var desc = document.getElementById("desc");
    var image = document.getElementById("imageuploader");

var form = new FormData();
    form.append("ca", category.value);
    form.append("b", brand.value);
    form.append("m", model.value);
    form.append("t", title.value);
    form.append("co", cost.value);
    form.append("q", qty.value);
    form.append("de", desc.value);

    var file_count = image.files.length;

       for (var x = 0; x < file_count; x++) {
        form.append("image" + x, image.files[x]);

    }

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            alert(response);
            reload();
            
        }
    }

    request.open("POST", "addProductProcess.php", true);
    request.send(form);
    }




function stockManagementchangeView(){

    //alert("ok");

    var productManage = document.getElementById("productManage");
    var productUpdate = document.getElementById("productUpdate");
    
    productManage.classList.toggle("d-none");
    productUpdate.classList.toggle("d-none");
    
}


function updateProduct(){
    //alert("ok");
var pname = document.getElementById("selectProduct");
var qty1 = document.getElementById("qty1");
var uprice = document.getElementById("uprice");

//alert(qty.value);
var form = new FormData();
    form.append("p", pname.value);
    form.append("q", qty1.value);
    form.append("up", uprice.value);
    



var request =  new XMLHttpRequest();
    request.onreadystatechange = function () {
     if (request.readyState == 4 & request.status == 200) {
         var response = request.responseText;
         alert(response);
         reload();
     }
 
    };

         request.open("POST","updateProductProcess.php",true);
         request.send(form);


}



function printDiv(){
    var orginalcontent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = orginalcontent;
}    





function searchProduct(x){
    var page = x;
    var product = document.getElementById("product");

    //alert(page);
    //alert(product.value);

    var f = new FormData();
   f.append("p",product.value);
   f.append("pg",page);

   var request =  new XMLHttpRequest();
   request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;
        //alert(response);
        document.getElementById("loadProduct").innerHTML = response;
    }
   };


    request.open("POST","searchProductProcess.php",true);
    request.send(f);

}



function advSearchProduct(x){
    

    var page = x;
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");  
    var model = document.getElementById("model");
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    //alert(brand.value);

    var f = new FormData();
    f.append("pg",page);
    f.append("b",brand.value);
    f.append("cat",cat.value);
    f.append("m",model.value);
    f.append("min",min.value);
    f.append("max",max.value);
   

    var request =  new XMLHttpRequest();
    request.onreadystatechange = function () {
     if (request.readyState == 4 & request.status == 200) {
         var response = request.responseText;
         //alert(response);
         document.getElementById("loadProduct").innerHTML = response;
     }
 
    };
 
    request.open("POST","advSearchProcess.php",true);
    request.send(f);

   
}

//document.getElementById("loadProduct").innerHTML = response;


function uploadImg(){
    //alert("ok");

    var img = document.getElementById("imageUploader");

    var f = new FormData();
     f.append("i",img.files[0]);

     var request =  new XMLHttpRequest();
     request.onreadystatechange = function () {
     if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;
         //alert(response);

         if (response == "empty") {
            alert("Please Select your Profile picture");
         } else {
            document.getElementById("i").src = response;
            img.value = "" ;
         }
         
     }
 
    };
 
    request.open("POST","profileImgUploadProcess.php",true);
    request.send(f);
 }



 function updateData(){
    //alert("ok");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
        //alert(fname.value);

     var f = new FormData();
     f.append("f",fname.value);
    f.append("l",lname.value);
    f.append("m",mobile.value);
    f.append("l1",line1.value);
    f.append("l2",line2.value);

    var request =  new XMLHttpRequest();
    request.onreadystatechange = function () {
     if (request.readyState == 4 & request.status == 200) {
         var response = request.responseText;
         alert(response);
         reload();
         
     }
 
    };
 
    request.open("POST","updateDataProcess.php",true);
    request.send(f);
 }


 function addtoCart(x){

    //alert (x);
var stockId = x;
var qty = document.getElementById("qty");
if (qty.value > 0) {
//alert("ok");

var f = new FormData();

f.append("s",stockId);
f.append("q",qty.value);

var request = new XMLHttpRequest();

request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;
        alert(response);
        qty.value = "";
        
     
    }

   };

request.open("POST","addtoCartProcess.php",true);
request.send(f);


} else {
    alert("Please Enter Valid Quantity")
}
 }


 function loadcart(){
    //alert("ok");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
     if (request.readyState == 4 & request.status == 200) {
         var response = request.responseText;
        //alert(response);
        document.getElementById("cartBody").innerHTML = response;
       
     }
 
    };
    
    request.open("POST","loadCartProcess.php",true);
    request.send();

 }

 function incrementCartQty(x){
    //alert (x);
    var cartId = x;
    var qty = document.getElementById("qty" + x);
     //alert(qty.value);
     var newQty = parseInt(qty.value) + 1;
     //alert(newQty);

     var f = new FormData();
     f.append("c",cartId);
     f.append("q",newQty);

     var request = new XMLHttpRequest();

     request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;
         //alert(response);
         if (response == "Success") {
            qty.value = parseInt(qty.value) + 1;
            loadcart();
         } else {
            alert(response);
         }
         
      }

    };

    request.open("POST","updateCartQtyProcess.php",true);
    request.send(f);
 }

 function decrementCartQty(x){

    //alert (x);
    var cartId = x;
    var qty = document.getElementById("qty" + x);
     //alert(qty.value);
     var newQty = parseInt(qty.value) - 1;
     //alert(newQty);

     var f = new FormData();
     f.append("c",cartId);
     f.append("q",newQty);

     if (newQty > 0) {

        var request = new XMLHttpRequest();

     request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;
         //alert(response);
         if (response == "Success") {
            qty.value = parseInt(qty.value) - 1;
            loadcart();
         } else {
            alert(response);
         }
         
      }

    };

    request.open("POST","updateCartQtyProcess.php",true);
    request.send(f);


        

     }
 }


 function removeCart(x){
    //alert(x);
    if (confirm("Are You shure deleting this item?")) {
        var f = new FormData();
        f.append("c",x);
        
        var request = new XMLHttpRequest();

        request.onreadystatechange = function() {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
               alert(response);
               

               reload();
              
            }
        };

    request.open("POST","removeCartProcess.php",true);
    request.send(f);
        
    }
 }

 function checkOut(){
    //alert("ok");

    var f = new FormData();
    f.append("cart",true);

    var request = new XMLHttpRequest();

        request.onreadystatechange = function() {
            if (request.readyState == 4 & request.status == 200) {
               var response = request.responseText;
               //alert(response);

               var payment = JSON.parse(response);
               doCheckout(payment,"checkoutProcess.php");
               
            }
        };

    request.open("POST","paymentProcess.php",true);
    request.send(f);
        
    }










function  doCheckout(payment, path){
     //alert("ok");
    // Payment completed. It can be a successful failure...............................................................................
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();

        request.onreadystatechange = function() {
            if (request.readyState == 4 & request.status == 200) {
               var response = request.responseText;
               //alert(response);
               if (response == "Success") {
                reload();
               } else {
                alert(response);
               }
           
           }
        };



        request.open("POST",path,true);
        request.send(f);

    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    //document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
   // };

}
    





function buyNow(id){
//alert(id);

      var qty = document.getElementById("qty");

      if (qty.value > 0) {
        //alert("ok");

        var f = new FormData();
        f.append("cart",false);
        f.append("stockId",id);
        f.append("qty",qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 & request.status == 200) {
               var response = request.responseText;
               //alert(response);
               var payment = JSON.parse(response);
               payment.stockId = stockId;
               payment.qty = qty.value;
               doCheckout(payment,"buynowProcess.php");
           
           }
        };


        request.open("POST","paymentProcess.php",true);
        request.send(f);


      } else {
        alert("Please Enter Valid Quantity")
      }

}

