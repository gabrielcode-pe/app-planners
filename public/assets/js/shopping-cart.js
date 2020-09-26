// Carrito de compras

function ShoppingCart(){

    this.allItems = JSON.parse(localStorage.getItem('shopping_cart')) || [];

}


ShoppingCart.prototype.addCourse = function addCourse(course){

    let courseExists = this.allItems.find(courseItem =>{
        return courseItem.id == course.id;
    });

    if(courseExists) return;

    
    this.allItems.push(course);

    localStorage.setItem('shopping_cart', JSON.stringify(this.allItems));
}


ShoppingCart.prototype.removeCourse = function removeCourse(courseId){

    let newList = this.allItems.filter(courseItem =>{
        return courseItem.id != courseId;
    });

    this.allItems = newList;

    localStorage.setItem('shopping_cart', JSON.stringify(this.allItems));

}


