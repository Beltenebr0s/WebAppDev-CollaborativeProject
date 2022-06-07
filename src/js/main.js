function GoToMainPage(){
    window.location.href = "main_page.php";
}

function SeeProductDetails(id){
    window.location.href = "../../src/php/product.php?id=" + id;
}

function SearchProducts(text){
    console.log(text);
    // This fucntion should filter the list of products based on the content of the search bar
    let productList = document.getElementsByClassName("product");
    console.log(productList);
}

function NewPost(){
    window.location.href = "new_post_form.php";
}

function DeletePost(id){
    console.log("Delete post ", id);
    // Create confirmation popup
    let popup = document.createElement("div");
    popup.style.background = "white";
    popup.style.border = "3px solid orange";
    popup.style.margin = "0 auto";
    popup.style.textAlign = "center";
    // Create the text
    let p = document.createElement("p");
    p.textContent = "Do you want to delete this product?";
    popup.appendChild(p);
    // Create the confirmation button
    let btn_yes = document.createElement("button");
    btn_yes.type = "button";
    btn_yes.textContent = "Yes";
    btn_yes.addEventListener('click', () => {
        // Go to the delete product page
        console.log("clicked on delete");
        location.href = "../php/delete_post.php?id="+id;
    });
    popup.appendChild(btn_yes);
    let btn_no = document.createElement("button");
    btn_no.type = "button";
    btn_no.textContent = "No";
    btn_no.addEventListener('click', () => {
        // Remove the popup
        console.log("clicked on cancel");
        popup.style.display = "none";
        document.getElementById(id).removeChild(popup);    
    });
    popup.appendChild(btn_no);

    // Show the confirmation popup
    document.getElementById(id).appendChild(popup);
}

function EditPost(id){
    console.log("Edit post ", id);
}

function DisplayUserMenu(){
    let menu = document.getElementById("user-menu");
    if(menu.style.display == "none"){
        menu.style.display = "block";
    } else {
        menu.style.display = "none";
    }
}

function EditProfile(){
    window.location.href = "../php/edit_profile_form.php";
}

function ManagePosts(){
    window.location.href  = "../php/user_posts.php";
}

function LogOut(){
    RemoveCookie("PHPSESSID");
    window.location.href = "../../index.html";
}

function RemoveCookie(cookieName)
{
    cookieValue = "";
    cookieLifetime = -1;
    var date = new Date();
    date.setTime(date.getTime()+(cookieLifetime*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
    document.cookie = cookieName+"="+JSON.stringify(cookieValue)+expires+"; path=/";
}