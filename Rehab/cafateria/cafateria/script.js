// var arr = document.getElementsByClassName("all");
// for(i = 0; i < 7; i++){
//     arr[i].addEventListener("click",(e)=>{
//         console.log("clicked")
//     })
// }



// function selectedImage(i)
// {   

//     var parentdiv=document.getElementsByClassName("all")[i].children;

//     console.log(parentdiv)
//     var productname=parentdiv[2].innerHTML;
//     var productprice=parentdiv[3].innerHTML;
//     console.log(productname);
//     console.log(productprice);

// }

// var pare = document.getElementById("allproductcontent");
// pare.addEventListener('click',(e)=>{
//     console.log("ameh")
// });
/*
var hany = document.getElementById("hany");
hany.addEventListener("click",()=>{
    console.log("ttttttttttttttttttt")
})

/*
let cards = document.getElementById("cards");
let cart = document.getElementById("cart");
let completeOrder = document.getElementById("complete_order");
completeOrder.addEventListener("click", function(){
    if(cart.children.length > 4){

        let Some = {};
        let allDivs = cart.children;
        for (const div of allDivs) {
            if(div.dataset.value){
                Some[div.children[0].innerHTML.split(":")[0]] = div.children[2].value;
                // Some.push(div.children[0].innerHTML.split(":")[0]);
                // Some.push(div.children[2].value);
            }
        }
        Some["notes"] = document.getElementById("note").value;
        Some["room"] = document.getElementsByTagName("select")[0].value;
        console.log(Some);
        Some = JSON.stringify(Some);
        console.log(Some);
        // Some.push(document.getElementById("note").value)
        // Some.push(document.getElementsByTagName("select")[0].value);
        location.assign(`../php/user_make_order.php?order=${Some}`);
    }
})
*/

// var s=document.getElementsByClassName("allproduct");
// // console.log(s);
// var arr = Array.from(s);
// // console.log(arr);

// for( i = 0;i<arr.length;i++){
//  arr[i].addEventListener("click",function(e){
//      e.stopPropagation();
//     console.dir(e);
// });


// }




/*
function selectedImage(){
   var sondos=document.getElementsByClassName("all")[2].children;
   var name=sondos[2].innerHTML;
   document.writeln(name);   
}
function selectedImage(){
    var selectedimage=document.getElementsByClassName("productname")[0].innerHTML;
    document.writeln(selectedimage);
 }

var parentdiv=document.getElementById("allproduct");
parentdiv.addEventListener("click",function(e){
    document.writeln("hello");
console.dir(e);
});



var plusLabel = document.getElementById("plus");
var minusLabel = document.getElementById("minus");
var quantityInput = document.getElementById("inputPrice");
var quantityValue = document.getElementById("inputPrice").value;

plusLabel.addEventListener("click", function() {
    quantityValue++;
    quantityInput.value = quantityValue;
    console.log(quantityValue)

});

minusLabel.addEventListener("click", function() {
    if (quantityValue > 1) {
        quantityValue--;
    }
    quantityInput.value = quantityValue;
});
*/