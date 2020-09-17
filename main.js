let editBtn = document.querySelectorAll('.editBtn');

editBtn.forEach(item => {
    item.addEventListener('click', (e) => {
        let productId = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
        let productName = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
        let productPrice = e.target.parentElement.previousElementSibling.previousElementSibling.textContent.substring(1);
        let oldImage = e.target.parentElement.previousElementSibling.firstElementChild.src.substring(27);

        let inputProductName = document.querySelector('.inputProductName');
        let inputProductPrice = document.querySelector('.inputProductPrice');
        let inputProductId = document.querySelector('.inputProductId');
        let oldImageSrc = document.querySelector('.oldImageName');

        inputProductId.value = productId;
        inputProductName.value = productName;
        inputProductPrice.value = productPrice;
        oldImageSrc.value = oldImage;

        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    })
})

let deleteBtn = document.querySelectorAll('.deleteBtn');

deleteBtn.forEach(item => {
    item.addEventListener('click', (e) => {
        let productId = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
        let productName = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
        let productPrice = e.target.parentElement.previousElementSibling.previousElementSibling.textContent.substring(1);

        let inputProductId = document.querySelector('.deleteProductId');
        let inputProductName = document.querySelector('.deleteProductName');
        let inputProductPrice = document.querySelector('.deleteProductPrice');

        inputProductId.value = productId;
        inputProductName.value = productName;
        inputProductPrice.value = productPrice;

        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    })
})