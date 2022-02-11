
class Menu_Item{
    constructor(menu_item_id, section, item_name, item_description, item_price, item_img){
        this.menu_item_id = menu_item_id;
        this.section = section;
        this.item_name = item_name;
        this.item_description = item_description;
        this.item_img = item_img;
        this.item_price = item_price;
        this.ingredients = new Array();
    }
    addIngredient(ingredient){
        this.ingredients.push(ingredient);
        return(this.ingredients)
    }
    addToDatabase(){
        $.ajax({
            url : "../models/ajaxHandler.php",
            method : "POST",
            data:{
                'action' : 'addToDB',
                'item' : this,
            }
        })
        .fail(function(e) {console.log(e)})
        .done(function(data){
            return(data);
        })
    }
    updateItem(){
        $.ajax({
            url : "../models/ajaxHandler.php",
            method : "POST",
            data:{
                'action' : 'updateItem',
                'item' : this,
            }
        })
        .fail(function(e) {console.log(e)})
        .done(function(data){
            return(data);
        })
    }
    static async deleteItem(menu_item_id){
        let data = await $.ajax({
            url : "../models/ajaxHandler.php",
            method : "POST",
            data:{
                'action' : 'deleteItem',
                'menu_item_id' : menu_item_id
            }
        })
        .fail(function(e) {console.log(e)})
        .done(function(data){
            return(data);
        })
        return data.trim();
    }
    
}


class Section{
    constructor(section_id, section_name){
        this.section_id = section_id;
        this.section_name = section_name;
    }
}

class Ingredient {
    constructor(ingredient_id, ingredient_name, ingredient_price, is_default){
        this.ingredient_id = ingredient_id;
        this.ingredient_name = ingredient_name;
        this.ingredient_price = parseFloat(ingredient_price);
        this.is_default = is_default;
    }
    static deleteIngredient(ingredient_id, menu_item_id){
        
        $.ajax({
            url : "../models/ajaxHandler.php",
            method : "POST",
            data:{
                'action' : 'deleteIngredient',
                'ingredient_id' : ingredient_id,
                'menu_item_id' : menu_item_id
            }
        })
        .fail(function(e) {console.log(e)})
        .done(function(data){
            return(data);
        })
        
    }
}
