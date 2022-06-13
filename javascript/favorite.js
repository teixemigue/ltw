const request = new XMLHttpRequest();

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function restaurantFavorite(element, id) {
    if (element.textContent == '\u2606') {
        request.open("get", "../api/api_favorite_restaurant.php?" + encodeForAjax({id: id}));
        request.send();
        element.textContent = '\u2605';
    } else {
        request.open("get", "../api/api_unfavorite_restaurant.php?" + encodeForAjax({id: id}));
        request.send();
        element.textContent = '\u2606';
    }
}

function dishFavorite(element, id) {
    if (element.textContent == '\u2606') {
        request.open("get", "../api/api_favorite_dish.php?" + encodeForAjax({id: id}));
        request.send();
        element.textContent = '\u2605';
    } else {
        request.open("get", "../api/api_unfavorite_dish.php?" + encodeForAjax({id: id}));
        request.send();
        element.textContent = '\u2606';
    }
}