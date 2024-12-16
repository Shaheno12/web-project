const cartIcon= document.querySelector("#cart-icon");
const cart= document.querySelector(".cart");
const closeCart= document.querySelector("#close-cart");
const buyButton= document.querySelector(".btn-buy");

//open cart

cartIcon.onclick= () => {
  cart.classList.add("active");
};
//close cart
closeCart.onclick=() =>{
  cart.classList.remove("active");
};

buyButton.onclick=() =>{
alert("Your Order Has Been Placed!")
  };
  