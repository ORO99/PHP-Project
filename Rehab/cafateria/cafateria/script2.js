let arr = [];
let arr2 = [];
let priceArr = [];
let priceOnly = [];
let numberArr = [];
var productCount = "";
var productPriceArr = [];
var allproduct = document.getElementsByClassName("allproduct");
var totalAmountSpan = document.getElementById("totalAmount");
var productCountList = document.getElementsByClassName("productCount");
var searchInput = document.getElementById("search");
searchInput.addEventListener("change", function(e) {
    document.cookie = "seachVal=" + searchInput.value;

});
var sum = 0;
for (let i = 0; i < allproduct.length; i++) {
    allproduct[i].addEventListener("click", (e) => {
        let price = e.target.nextElementSibling.nextElementSibling.nextElementSibling.innerText
        let name = e.target.nextElementSibling.nextElementSibling.innerText
        if (arr.length == 0) {
            arr.push({
                "name": name,
                "price": price,
                "num": 1
            })
            createOrderDiv(name, price, 1);
            arr2.push(name)
            priceOnly.push(price);
            priceArr.push(price);
            numberArr.push(1);
        } else {
            if (arr2.indexOf(name) != -1) {
                for (let j = 0; j < arr.length; j++) {
                    if (arr[j].name == name) {
                        var numVar = arr[j].num++
                            numberArr[j] = ++numVar;

                        updateOrderCount(arr[j].name, price);
                    }
                }
            } else {
                arr2.push(name)
                priceOnly.push(price);
                priceArr.push(price);
                numberArr.push(1);
                arr.push({
                    "name": name,
                    "price": price,
                    "num": 1
                })

                createOrderDiv(name, price, 1);
            }


        }

        console.log(price, name)
        console.log(arr.length);

    })
}
var ordercontent = document.getElementById("productContainer");


function createOrderDiv(name, price) {
    var orderRow = document.createElement("div");
    orderRow.dataset.value = name.trim();
    var nameLabel = document.createElement("label");
    nameLabel.setAttribute("class", "productName");
    nameLabel.setAttribute("name", "productName");
    productCount = document.createElement("input");
    productCount.type = "number";
    productCount.name = "inputPrice";
    productCount.id = "inputPrice";
    productCount.setAttribute("class", "productCount");
    productCount.setAttribute("name", "productCount");
    productCount.setAttribute("min", "1");
    productCount.value = "1";
    nameLabel.innerText = name;
    var priceSpan = document.createElement("span");
    priceSpan.setAttribute("class", "productprice");
    priceSpan.setAttribute("name", "productprice");
    priceSpan.innerText = price;
    var EGPSpan = document.createElement("span");
    EGPSpan.setAttribute("class", "EGP");
    EGPSpan.innerText = "EGP";
    ordercontent.appendChild(orderRow);
    orderRow.appendChild(nameLabel);
    orderRow.appendChild(productCount);
    orderRow.appendChild(priceSpan);
    orderRow.appendChild(EGPSpan);
    ordercontent.appendChild(orderRow);
    productPriceArr = document.getElementsByClassName("productprice");
    sum += parseInt(price);
    totalAmountSpan.innerText = sum;
    console.log("sum =" + sum);
    updatePriceSpan();

}


function updateOrderCount(namex, price) {
    var productNames = document.getElementsByClassName("productName");
    productPriceArr = document.getElementsByClassName("productprice");

    for (let k = 0; k < productNames.length; k++) {
        var x = ((productNames[k].innerText).trim()).localeCompare(namex.trim());
        if ((productNames[k].innerText).trim().localeCompare(namex.trim()) == 0) {
            var count = productNames[k].nextElementSibling.value;
            productNames[k].nextElementSibling.value = ++count;
            priceArr[k] = price * count;
            productNames[k].nextElementSibling.nextElementSibling.innerText = price * count;


        }
    }
    sum = 0;
    priceArr.forEach(element => {
        sum += parseInt(element);
    });

    totalAmountSpan.innerText = sum;

}
console.log(priceArr);
console.log(numberArr);

var confirmBtnId = document.getElementById("confirmBtn");

console.log(productCountList.length);
confirmBtnId.addEventListener("click", function(e) {
    console.log("length" + productCountList.length);
    for (let indexVal = 0; indexVal < productCountList.length; indexVal++) {
        console.log(productCountList[indexVal].value);
        numberArr[indexVal] = productCountList[indexVal].value;

    }
    document.cookie = "orderItems=" + arr2.toString();
    document.cookie = "orderprice=" + priceArr.toString();
    document.cookie = "orderNumber=" + numberArr.toString();
    // document.cookie("orders", arr);
});

function updatePriceSpan() {

    console.log("length=> " + productCountList.length);
    for (let p = 0; p < productCountList.length; p++) {
        productCountList[p].addEventListener("change", function(e) {
            productPriceArr[p].innerText = parseInt(priceOnly[p]) * parseInt(productCountList[p].value);
            priceArr[p] = parseInt(priceOnly[p]) * parseInt(productCountList[p].value);
            sum = 0;
            priceArr.forEach(element => {
                sum += parseInt(element);
            });

            totalAmountSpan.innerText = sum;
        });
    }


}