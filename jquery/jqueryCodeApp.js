$(document).ready(function () {
    $("#submitcommentbtn").click(function () {
        var username = $("#commentname").val();
        var usercomment = $("#comment").val();
        var productkey = $("#productkey").val();

        if (username === "") {
            let username = "annonymous";
            if (usercomment === "") {
                if ($("#textdisplay2").val() === "") {
                    $("#textdisplay2").text("please enter your comment.");
                    $("#textdisplay").text("");                    
                }
            } else {
                $.ajax({
                    type: "POST",
                    url: "uploadusercomment.php",
                    data: {
                        name: username,
                        comment: usercomment,
                        key: productkey
                    },
                    cache: false,
                    success: function (data) {
                        $("#textdisplay").text(data);
                        $("#textdisplay2").text("");
                        
                        //empty the textbox
                        $("#commentname").val("");
                        $("#comment").val("");
                        // alert(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr);
                    }
                });
            }
        } else {
            if (usercomment === "") {
                if ($("#textdisplay2").val() === "") {
                    $("#textdisplay2").text("please enter your comment.");
                    $("#textdisplay").text("");                    
                }
            } else {
                $.ajax({
                    type: "POST",
                    url: "uploadusercomment.php",
                    data: {
                        name: username,
                        comment: usercomment
                    },
                    cache: false,
                    success: function (data) {
                        // alert(data);
                        $("#textdisplay").text(data);
                        $("#textdisplay2").text("");

                        //empty the textbox
                        $("#commentname").val("");
                        $("#comment").val("");
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr);
                    }
                });
            }
        }
    });

    //encrypt page
    $(".encryptBtn").click(function () {

        var getlocaldata = localStorage.getItem("userpageid");               
        //get user password
        let encryptPassword = $("#encryptedPassword").val();
        $.ajax({
            type: "post",
            url: "serverEncryptPage.php",
            data: {
                password: encryptPassword,
                param: getlocaldata
            },
            cache: false,
            success: function (data) {
                // check data response
                if (data == "Incorrect password.") {
                    // display error msg          
                    $(".displayTextEncrypt").html(data);
                } else if (data == "please try to login properly.") {         
                    // display error msg          
                    $(".displayTextEncrypt").html(data);
                }else{
                    // redirect the user 
                    location.href = data;
                }              
                
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });

    //search for a store
    $("#searchShopBtn").click(function () {
        var usersearch = $("#searchShopInput").val();
        //alert(usersearch);
        $.ajax({
            type: "POST",
            url: "searchstore.php",
            data: {
                userSearchResult: usersearch
            },
            cache: false,
            success: function (data) {
                $(".result").html(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);                
            }
        });
    });

    //get and submit user email for news notification
    $("#submitNewsMail").click(function (){
        //get user input mail
        let userEmail = $("#newsMail").val();
        let mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        // alert(userEmail);
        if (userEmail === "") {
            //send error msg
            $("#displayResultDataMail").text("Empty input..");
            userEmail.value = "";
        } else {
            if (userEmail.value.match(mailFormat)) {
                $.ajax({
                    type: "post",
                    url: "NewsMail.php",
                    data: {
                        email: userEmail
                    },
                    cache: false,
                    success: function (data) {
                        $(".displayResultDataMail").text(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr);
                    }
                });
            } else {
                //send error msg
                $("#displayResultDataMail").text("Invaild Email Entered..");
                userEmail.value = "";
            }
        }
    });
    
    //sending feedback to seller
    $(".feedBackBTN").click(function (){
        let userName = $("#userName").val();
        let userEmail = $("#userEmail").val();
        let sellerEmail = $("#sellerEmail").val();
        let userMessage = $("#userMessage").val();

        $.ajax({
            type: "POST",
            url: "sendmail.php",
            data: {
                userName: userName,
                userEmail: userEmail,
                sellerEmail: sellerEmail,
                userMessage: userMessage
            },
            cache: false,
            success: function (data) {
                $(".resultData").html(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);                
            }
        });

    });
    //funtion that connect to the php backend side for user products managements
    $(".updateProductNameBtn").click(function () {
        var productNewName = $(".ProductNewName").val();

        $.ajax({
            type: "POST",
            url: "newname.php",
            data: {
                productNewName: productNewName
            },
            cache: false,
            success: function (data) {
                $(".newResultData").text(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);                
            }
        });
        
    });
    $(".updateProductPriceBtn").click(function () {
        var productNewPrice = $(".ProductNewPrice").val();

        $.ajax({
            type: "POST",
            url: "newprice.php",
            data: {
                productNewPrice: productNewPrice
            },
            cache: false,
            success: function (data) {
                $(".newPriceResultData").text(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);                
            }
        });
        
    });
    $(".updateProductDescriptionBtn").click(function () {
        var ProductNewDescription = $(".ProductNewDescription").val();

        $.ajax({
            type: "POST",
            url: "newdescription.php",
            data: {
                ProductNewDescription: ProductNewDescription
            },
            cache: false,
            success: function (data) {
                $(".newDescriptionResultData").text(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);                
            }
        });
        
    });

});