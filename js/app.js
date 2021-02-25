// set Language

let setLangButton = document.getElementById('setLanguageButton');
if (setLangButton) {

    // event listener
    setLangButton.addEventListener('click', () => {
        let languageSelect = document.getElementById('setLanguage');
        let language = '';
        let error = false;
        switch (languageSelect.value) {
            case 'en':
                language = 'English';
                break;
            case 'fr':
                language = 'French';
                break;
            case 'ar':
                language = 'Arabic';
                break;
            default:
                error = true;
                break;
        }
        // set cookie
        if (error == true) {
            swal("Error", "Invalid value", "error");
            return 0;
        } else {
            document.cookie = "language=" + languageSelect.value;
            swal({
                title: "Done!",
                text: "Language has been changed to " + language + " press F5 to see changes",
                icon: "success",
                buttons: {
                    cancel: "Cancel",
                    catch: { text: "Reload", value: "reload" }
                },
            }).then((value) => {
                if (value) {
                    location.reload();
                }
            });
            return 0;
        }
    });
}
// set Hotel Rooms

let hotelRooms = document.getElementById('setHotelRoomsBtn');
if (hotelRooms) {
    hotelRooms.addEventListener('click', () => {
        let hotelRooms = document.getElementById('hotelRooms');
        // set cookie
        if (hotelRooms.value < 20 || hotelRooms.value > 100) {
            swal("Error", "Hotel Rooms must be lower then 100 and higher than 20", "error");
            return 0;
        } else {
            document.cookie = "room_number=" + hotelRooms.value;
            swal({
                title: "Done!",
                text: "Rooms number has been changed to " + hotelRooms.value + " press F5 to see changes",
                icon: "success",
                buttons: {
                    cancel: "Cancel",
                    catch: { text: "Reload", value: "reload" }
                },
            }).then((value) => {
                if (value) {
                    location.reload();
                }
            });
            return 0;
        }
    });
}
// set Hotel Rooms Price

let roomsPrice = document.getElementById('setRoomsPricesBtn');
if (roomsPrice) {
    roomsPrice.addEventListener('click', () => {
        let single = document.getElementById('singleRoom');
        let dual = document.getElementById('dualRoom');
        // set cookie
        if (single.value == '' || dual.value == '') {
            swal("Error", "Single and dual are required", "error");
            return 0;
        } else {
            document.cookie = "single=" + single.value;
            document.cookie = "dual=" + dual.value;
            swal({
                title: "Done!",
                text: "Single Room price has been changed to " + single.value + " and Dual Room price has been changed to " + dual.value + " press F5 to see changes",
                icon: "success",
                buttons: {
                    cancel: "Cancel",
                    catch: { text: "Reload", value: "reload" }
                },
            }).then((value) => {
                if (value) {
                    location.reload();
                }
            });
            return 0;
        }
    });
}

// set selected option based on current language

function selectSelectedLanguage() {
    document.getElementById('setLanguage').value = getCookieValue('language');
}
// set hotel rooms value based on saved cookie
function setCurrentHotelRooms() {
    document.getElementById('hotelRooms').value = getCookieValue('room_number');
}
// set single and dual rooms prices value based on saved cookie
function setCurrentSingleDualValues() {
    document.getElementById('singleRoom').value = getCookieValue('single');
    document.getElementById('dualRoom').value = getCookieValue('dual');
}


// convert table row to PDF file

function CreatePDF(id) {
    let mounthData = document.getElementById('monthlyStatTable').cloneNode(true); // don't affect the HTML
    let heading = document.getElementById('headingTable').cloneNode(true);
    let element = document.getElementById('rowNum' + id).cloneNode(true);
    let elementNode = element.childNodes;
    element.removeChild(elementNode[elementNode.length - 1]); // remove table "Print" col

    heading.childNodes[1].childNodes[9].remove();

    let finalTable = document.createElement('table');
    finalTable.className = 'table table-sm mt-4 mb-5 table-bordered';
    finalTable.insertAdjacentElement('afterbegin', heading);
    finalTable.insertAdjacentElement('beforeend', element);

    // title

    let title = document.createElement('h1');
    title.className = "text-center mb-3";
    title.innerHTML = 'Hotel Name';

    let conatiner = document.createElement('div');
    conatiner.appendChild(title);
    conatiner.appendChild(mounthData);
    conatiner.appendChild(finalTable);

    html2pdf(conatiner, {
        margin: 1,
        filename: Date.now() + '.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { dpi: 192, letterRendering: true },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
    });
}

function CreatePDFV2(id) {
    // ES6 version not compatible with IE

    // ask for confirmation first
    swal({
            title: "Are you sure?",
            text: "You are going to download the data or day number " + id,
            icon: "warning",
            buttons: {
                cancel: "Cancel",
                catch: {
                    text: "Download",
                    value: "download"
                }
            },
        })
        .then((value) => {
            // get table titles based by language
            if (value) {
                // fetch to get table titles with the correct language
                fetch('/api/pdf_titles.php').then(function(response) {
                    return response.json();
                }).then(function(data) {
                    if (data.result) {
                        let titles = data.result;

                        let rowElement = document.getElementById('rowNum' + id);
                        let monthRowElement = document.getElementById('monthlyStatTable');
                        let MonthIncome = monthRowElement.children[1].childNodes[0].childNodes[1].textContent;
                        let MonthNight = monthRowElement.children[1].childNodes[0].childNodes[2].textContent;
                        let Host = monthRowElement.children[1].childNodes[0].childNodes[3].textContent;
                        let DayN = rowElement.children[0].textContent;
                        let Day = rowElement.children[1].textContent;
                        let Income = rowElement.children[2].textContent;
                        let Nights = rowElement.children[3].textContent;
                        let SingleRoom = rowElement.children[4].textContent;
                        let DualRooms = rowElement.children[5].textContent;
                        let nutrition = rowElement.children[6].textContent;
                        let Drink = rowElement.children[7].textContent;
                        let Food = rowElement.children[8].textContent;
                        // ------
                        let today = new Date();
                        let date = (today.getMonth() + 1) + '-' + today.getDate() + '-' + today.getFullYear();
                        let time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                        let dateTime = date + ' ' + time;
                        // ------
                        let htmlElement = document.createElement('div');
                        htmlElement.classList.add('container');
                        htmlElement.innerHTML = `
           <div class="row">
            <div class="col">
                <!--<h1 class="text-left">
                    Logo
                </h1>-->
                <img src="../assets/tunvita3.png" alt="Hotel Logo" width="30%">
            </div>
            <div class="col">
                <h6 class="text-right mt-2">${dateTime}</h6>
            </div>
        </div>
        <h1 class="text-center mt-3">Title</h1>
        <div class="row">
            <div class="col">
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">${titles.month.income}</th>
                            <th scope="col">${titles.month.nights}</th>
                            <th scope="col">${titles.month.host}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">${titles.month.total}:</th>
                            <td>${MonthIncome}</td>
                            <td>${MonthNight}</td>
                            <td>${Host}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered mt-2">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" colspan="2" class="text-center">${titles.data_table.days}</th>
                            <th scope="col"></th>
                            <th scope="col" colspan="3" class="text-center">${titles.data_table.nights}</th>
                            <th scope="col" colspan="3" class="text-center">${titles.data_table.nutrition}</th>
                        </tr>
                        <tr>
                            <th scope="col">${titles.data_table.day_n}</th>
                            <th scope="col">${titles.data_table.day}</th>
                            <th scope="col">${titles.data_table.income}</th>
                            <th scope="col">${titles.data_table.nights}</th>
                            <th scope="col">${titles.data_table.single}</th>
                            <th scope="col">${titles.data_table.dual}</th>
                            <th scope="col">${titles.data_table.nutrition}</th>
                            <th scope="col">${titles.data_table.drink}</th>
                            <th scope="col">${titles.data_table.food}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">${DayN}</th>
                            <th scope="col">${Day}</th>
                            <th scope="col">${Income}</th>
                            <th scope="col">${Nights}</th>
                            <th scope="col">${SingleRoom}</th>
                            <th scope="col">${DualRooms}</th>
                            <th scope="col">${nutrition}</th>
                            <th scope="col">${Drink}</th>
                            <th scope="col">${Food}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3">
                <div class="signature text-right mr-5">
                    <img src="../assets/signature.png" alt="Signature" width="20%">
                </div>
            </div>
        </div>
    `;
                        let fileName = Date.now();
                        html2pdf(htmlElement, {
                            margin: 1,
                            filename: fileName + '.pdf',
                            image: { type: 'jpeg', quality: 0.98 },
                            html2canvas: { dpi: 192, letterRendering: true },
                            jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
                        });

                        swal("Your file " + fileName + " has been downloaded ", {
                            icon: "success",
                        });
                    } else if (data.error) {
                        swal("Oops!", data.error, {
                            icon: "error",
                        });
                    }
                }).catch(function(err) {
                    swal("Oops!", "Something went wrong please try again", {
                        icon: "error",
                    });
                })
            } else {
                return 0;
            }
        });
}

function getCookieValue(a) {
    // read cookie by name solution from Stack Over flow
    // https://stackoverflow.com/questions/5639346/what-is-the-shortest-function-for-reading-a-cookie-by-name-in-javascript
    let b = document.cookie.match('(^|;)\\s*' + a + '\\s*=\\s*([^;]+)');
    return b ? b.pop() : '';
}