let btnAddedToCart = document.querySelector('#addCart');

 btnAddedToCart.addEventListener('click', () =>{
	 btnAddedToCart.innerText = 'Item is unavailable';
	 btnAddedToCart.style.backgroundColor = '#AC9797';
 })