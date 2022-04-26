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
    window.location.href = "../../new_post_form.html";
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
    window.location.href = "../../index.html";
}