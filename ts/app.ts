function collapse_form() {
    let parentElement = (<HTMLInputElement>document.getElementById('restaurantion'));
    let childElemnt = (<HTMLInputElement>document.getElementById('restaurantion-child'));
    if (parentElement.value != null ) {
        childElemnt.classList.add("show");
        console.log(parentElement.value);
    }else if (parentElement.value == null || parentElement.value == '' ) {
        childElemnt.classList.remove("show");
    }
}