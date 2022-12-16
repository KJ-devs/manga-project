
let totalPrice = 0;
let listOfProduct = [];
let selectProduct = document.querySelectorAll('.select-product');
let idManga
let quantity
let price
let shippingPrice = 2;
let list = [];

selectProduct.forEach(function (selectProduct) {
    totalPrice = 0;
    idManga = selectProduct.parentElement.parentElement.querySelector('.idManga').value;
    quantity = selectProduct.value;
    price = selectProduct.parentElement.parentElement.querySelector('.prix').value;
    listOfProduct[idManga] = [quantity, price];
    listOfProduct.forEach(function (product) {
        totalPrice += product[0] * product[1];

    });
    
    if (Object.keys(listOfProduct).length - 1 > 0) {
        shippingPrice += 1;
        totalPrice += shippingPrice;
    } else {
        totalPrice += shippingPrice;
    }
    selectProduct.addEventListener('change', function () {
        totalPrice = 0;
        shippingPrice = 2;
        idManga = selectProduct.parentElement.parentElement.querySelector('.idManga').value;
        quantity = selectProduct.value;
        price = selectProduct.parentElement.parentElement.querySelector('.prix').value;
        listOfProduct[idManga] = [quantity, price];
        list = listOfProduct[idManga];
        listOfProduct.forEach(function (product) {
            totalPrice += product[0] * product[1];
        });
        for (let i = 0; i < Object.keys(listOfProduct).length -2; i++) {
        if (i > 0) {
            shippingPrice += 1;
           
        } else {
            totalPrice += shippingPrice;
        }
    }
    totalPrice += shippingPrice;
        document.querySelector('.totalPrice').innerHTML = "Total :" + totalPrice + ' €';
    })


    document.querySelector('.totalPrice').innerHTML = "Total :" + totalPrice + ' €';
});
// Create an XMLHttpRequest object
