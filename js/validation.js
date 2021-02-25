/**
 *  This file will contain all the form validation we need some of them front end and others backend using AJAX
 */

function Form1Validaton() {

    // form 1 validation

    let form1Submit = document.getElementById('withincome');

    form1Submit.addEventListener('submit', (e) => {
        // get Elements
        let income = document.getElementById('f1_hotel_income');
        let host = document.getElementById('f1_host_percent');
        let date = document.getElementById('f1_date');
        let food = document.getElementById('f1_food_percent');
        let drink = document.getElementById('f1_drink_percent');

        // get feedback elements
        let incomeFeed = document.getElementById('f1_hotel_income_feedback');
        let hostFeed = document.getElementById('f1_host_percent_feedback');
        let dateFeed = document.getElementById('f1_date_feedback');
        let foodFeed = document.getElementById('f1_food_percent_feedback');
        let drinkFeed = document.getElementById('f1_drink_percent_feedback');

        let errorsNumber = 0;
        /**
         * Validation
         */

        // Validate income
        if (income.value === '') {
            income.classList.add('is-invalid');
            incomeFeed.innerText = 'Income is required';
            errorsNumber++;
        } else if (Number(income.value) < 5000 || Number(income.value) > 50000) {
            income.classList.add('is-invalid');
            incomeFeed.innerText = 'Income must be greater than 5000 and lower than 50000';
            errorsNumber++;
        } else {
            // valid income
            income.classList.remove('is-invalid');
            income.classList.add('is-valid');
            income.innerText = '';
        }
        // Validate host
        if (host.value === '') {
            host.classList.add('is-invalid');
            hostFeed.innerText = 'Host is required';
            errorsNumber++;
        } else if (Number(host.value) > 100) {
            host.classList.add('is-invalid');
            hostFeed.innerText = 'Max value for host percent is 100%';
            errorsNumber++;
        } else if (Number(host.value) < 0) {
            host.classList.add('is-invalid');
            hostFeed.innerText = 'Min value for host percent is 0%';
            errorsNumber++;
        } else {
            host.classList.remove('is-invalid');
            host.classList.add('is-valid');
            host.innerText = '';
        }
        // Validate date
        if (date.value === '') {
            date.classList.add('is-invalid');
            dateFeed.innerText = 'Date is required';
            errorsNumber++;
        } else {
            date.classList.remove('is-invalid');
            date.classList.add('is-valid');
            dateFeed.innerText = '';
        }
        // Validate food
        if (food.value === '') {
            food.classList.add('is-invalid');
            foodFeed.innerText = 'Food field is required';
            errorsNumber++;
        }
        // Validate drink
        if (drink.value === '') {
            drink.classList.add('is-invalid');
            drinkFeed.innerText = 'Drink field is required';
            errorsNumber++;
        } else if (Number(drink.value) + Number(food.value) != 100) {
            // we should get 100% between food and drink %
            food.classList.add('is-invalid');
            foodFeed.innerText = 'The % of food + the % of drink must be equal to 100';
            drink.classList.add('is-invalid');
            drinkFeed.innerText = 'The % of food + the % of drink must be equal to 100';
            errorsNumber++;
        } else {
            // valid
            food.classList.remove('is-invalid');
            food.classList.add('is-valid');
            foodFeed.innerText = '';
            drink.classList.remove('is-invalid');
            drink.classList.add('is-valid');
            drinkFeed.innerText = '';
        }

        if (errorsNumber > 0) {
            e.preventDefault(); // cancel submit if there this errors
        } else {
            e.preventDefault();
            // inputs valid and we will check the result to see if there is something missing
            let fd = new FormData();
            fd.append('income', income.value);
            fd.append('host', host.value);
            fd.append('date', date.value);
            fd.append('food_percent', food.value);
            fd.append('drink_percent', drink.value);
            fd.append('ajax', 'true');
            fd.append('withincome', 'submit');
            // Fetch API
            fetch('/api/withincome.php', {
                method: 'POST',
                body: fd
            }).then(function(res) {
                return res.json();
            }).then(function(data) {
                if (roomsValidation(data.result) != 0) {
                    swal("Based on the income you entered and the rooms hotel and other data it seems like you will have some false data do you want to continue ?", {
                        buttons: {
                            cancel: "Cancel Submission",
                            catch: {
                                text: "Continue Anyway",
                                value: "catch"
                            }
                        }
                    }).then((value) => {
                        if (value == "catch") {
                            form1Submit.submit();
                        } else {
                            return 0;
                        }
                    })
                } else {
                    form1Submit.submit();
                }
            }).catch(function(err) {
                swal("Error", "Error in server maybe internet connection", "error"); // Sweet alert js
            })
        }
    });
}

function Form2Validation() {
    let form2Submit = document.getElementById('withnights');

    form2Submit.addEventListener('submit', (e) => {
        // get Elements
        let single = document.getElementById('f2_single_nights');
        let dual = document.getElementById('f2_dual_nights');
        let host = document.getElementById('f2_host_percent');
        let date = document.getElementById('f2_date');
        let food = document.getElementById('f2_food_percent');
        let drink = document.getElementById('f2_drink_percent');

        // get feedback elements
        let singleFeed = document.getElementById('f2_single_nights_feedback');
        let dualFeed = document.getElementById('f2_dual_nights_feedback');
        let hostFeed = document.getElementById('f2_host_percent_feedback');
        let dateFeed = document.getElementById('f2_date_feedback');
        let foodFeed = document.getElementById('f2_food_percent_feedback');
        let drinkFeed = document.getElementById('f2_drink_percent_feedback');

        let errorsNumber = 0;
        /**
         * Validation
         */

        // Validate single
        if (single.value === '') {
            single.classList.add('is-invalid');
            singleFeed.innerText = 'Income is required';
            errorsNumber++;
        } else if (Number(single.value) < 10 || Number(single.value) > 500) {
            single.classList.add('is-invalid');
            singleFeed.innerText = 'Income must be greater than 10 and lower than 500';
            errorsNumber++;
        } else {
            // valid income
            single.classList.remove('is-invalid');
            single.classList.add('is-valid');
            single.innerText = '';
        }
        // Validate dual
        if (dual.value === '') {
            dual.classList.add('is-invalid');
            dualFeed.innerText = 'Income is required';
            errorsNumber++;
        } else if (Number(dual.value) < 10 || Number(dual.value) > 500) {
            dual.classList.add('is-invalid');
            dualFeed.innerText = 'Income must be greater than 10 and lower than 500';
            errorsNumber++;
        } else {
            // valid income
            dual.classList.remove('is-invalid');
            dual.classList.add('is-valid');
            dual.innerText = '';
        }
        // Validate host
        if (host.value === '') {
            host.classList.add('is-invalid');
            hostFeed.innerText = 'Host is required';
            errorsNumber++;
        } else if (Number(host.value) > 100) {
            host.classList.add('is-invalid');
            hostFeed.innerText = 'Max value for host percent is 100%';
            errorsNumber++;
        } else if (Number(host.value) < 0) {
            host.classList.add('is-invalid');
            hostFeed.innerText = 'Min value for host percent is 0%';
            errorsNumber++;
        } else {
            host.classList.remove('is-invalid');
            host.classList.add('is-valid');
            host.innerText = '';
        }
        // Validate date
        if (date.value === '') {
            date.classList.add('is-invalid');
            dateFeed.innerText = 'Date is required';
            errorsNumber++;
        } else {
            date.classList.remove('is-invalid');
            date.classList.add('is-valid');
            dateFeed.innerText = '';
        }
        // Validate food
        if (food.value === '') {
            food.classList.add('is-invalid');
            foodFeed.innerText = 'Food field is required';
            errorsNumber++;
        }
        // Validate drink
        if (drink.value === '') {
            drink.classList.add('is-invalid');
            drinkFeed.innerText = 'Drink field is required';
            errorsNumber++;
        } else if (Number(drink.value) + Number(food.value) != 100) {
            // we should get 100% between food and drink %
            food.classList.add('is-invalid');
            foodFeed.innerText = 'The % of food + the % of drink must be equal to 100';
            drink.classList.add('is-invalid');
            drinkFeed.innerText = 'The % of food + the % of drink must be equal to 100';
            errorsNumber++;
        } else {
            // valid
            food.classList.remove('is-invalid');
            food.classList.add('is-valid');
            foodFeed.innerText = '';
            drink.classList.remove('is-invalid');
            drink.classList.add('is-valid');
            drinkFeed.innerText = '';
        }

        if (errorsNumber > 0) {
            e.preventDefault();
        } else {
            e.preventDefault();
            // inputs valid and we will check the result to see if there is something missing
            let fd = new FormData();
            fd.append('single_nights', single.value);
            fd.append('dual_nights', dual.value);
            fd.append('host', host.value);
            fd.append('date', date.value);
            fd.append('food_percent', food.value);
            fd.append('drink_percent', drink.value);
            fd.append('ajax', 'true');
            fd.append('withnights', 'submit');
            // Fetch API
            fetch('/api/withnights.php', {
                method: 'POST',
                body: fd
            }).then(function(res) {
                return res.json();
            }).then(function(data) {
                if (roomsValidation(data.result) != 0) {
                    swal("Based on the income you entered and the rooms hotel and other data it seems like you will have some false data do you want to continue ?", {
                        buttons: {
                            cancel: "Cancel Submission",
                            catch: {
                                text: "Continue Anyway",
                                value: "catch"
                            }
                        }
                    }).then((value) => {
                        if (value == "catch") {
                            form2Submit.submit();
                        } else {
                            return 0;
                        }
                    })
                } else {
                    form2Submit.submit();
                }
            }).catch(function(err) {
                swal("Error", "Error in server maybe internet connection", "error"); // Sweet alert js
            })
        }
    });
}

function roomsValidation(data) {
    // return true if the number of rooms in the hotel exceed the saved number
    let hotelRooms = getCookieValue('room_number');
    let totalExededDays = 0;
    for (let i = 0; i < data.length; i++) {
        if (Number(data[i].night.sum) > Number(hotelRooms)) {
            totalExededDays++;
        }
    }
    return totalExededDays;
}