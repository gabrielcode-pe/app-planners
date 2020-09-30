// Carrito de compras

function ShoppingCart(){

    this.allItems = JSON.parse(localStorage.getItem('shopping_cart')) || [];

}


ShoppingCart.prototype.addItem = function addItem(item){

    let itemExists = this.allItems.find(itemItem =>{
        return itemItem.id == item.id;
    });

    if(itemExists) return;

    
    this.allItems.push(item);

    localStorage.setItem('shopping_cart', JSON.stringify(this.allItems));
}


ShoppingCart.prototype.removeCourse = function removeCourse(itemId){

    let newList = this.allItems.filter(currentItem =>{
        return currentItem.id != itemId;
    });

    this.allItems = newList;

    localStorage.setItem('shopping_cart', JSON.stringify(this.allItems));

}


ShoppingCart.prototype.removeAllItems = function removeAllItems(){

    this.allItems = [];
    localStorage.setItem('shopping_cart', JSON.stringify(this.allItems));
}


