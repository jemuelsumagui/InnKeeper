let today = new Date();
let currentDay = new Date();

let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");
let daysInCalendar = 150; //numero di giorni visualizzati nel calendario
let preDays = 3; //numero di giorni precedenti all'oggi del calendario
let arrayDB = []; //arrey di supporto con le date

//document.getElementById("demo").innerHTML = arrayDB.toString();
let months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];

let monthAndYear = document.getElementById("monthAndYear");
monthAndYear.innerHTML = today.getDate() + " " + months[today.getMonth()] + " " + today.getFullYear();
showCalendarMounths(today.getFullYear(), today.getMonth(), today.getDate());
showCalendar(today.getFullYear(), today.getMonth(), today.getDate());

//funzione per tornare all'oggi sul calendario
function oggi() {
    today = new Date();
    showCalendar(today.getFullYear(), today.getMonth(), today.getDate());
    showCalendarMounths(today.getFullYear(), today.getMonth(), today.getDate());
    showCalendarRows();
}

//funzione per spostarsi di mese/anno. Inizia sempre dal primo del mese
function jump() {
    today.setDate(1);
    today.setMonth(parseInt(selectMonth.value));
    today.setFullYear(parseInt(selectYear.value));

    showCalendar(today.getFullYear(), today.getMonth(), 1);
    showCalendarMounths(today.getFullYear(), today.getMonth(), 1);
    showCalendarRows();
}


//funzione che crea la riga di giorni
function showCalendar(year, mounth, day) {
    let iterDay = new Date(year, mounth, day - preDays); //variabile locale di supporto

    let tbl = document.getElementById("calendar-thead");
    tbl.innerHTML = "";

    selectYear.value = year;
    selectMonth.value = mounth;

    let row = document.createElement("tr");
    let giornoSettimana = " ";
    //aggiungo una casella alla riga
    let cell = document.createElement("td");
    let cellText = document.createTextNode("");
    cell.appendChild(cellText);
    row.appendChild(cell);

    for (let j = 0; j < daysInCalendar; j++) {
        //mi trovo il giorno della settimana
        switch (iterDay.getDay()) {
            case 0:
                giornoSettimana = "dom";
                break;
            case 1:
                giornoSettimana = "lun";
                break;
            case 2:
                giornoSettimana = "mar";
                break;
            case 3:
                giornoSettimana = "mer";
                break;
            case 4:
                giornoSettimana = "gio";
                break;
            case 5:
                giornoSettimana = "ven";
                break;
            case 6:
                giornoSettimana = "sab";
                break;
            default:
                giornoSettimana = "panic";
                break;
        }


        let cell = document.createElement("td");

        let cellText = document.createTextNode(iterDay.getDate() + "  " + giornoSettimana);
        let tzoffset = iterDay.getTimezoneOffset() * 60000; //offset in millisecondi
        let iterDayConOffset = (new Date(iterDay - tzoffset)).toISOString();
        arrayDB[j] = iterDayConOffset.substr(0, 10); //array del calendario formato YYYY-MM-GG
        if (iterDay.getDate() == currentDay.getDate() && iterDay.getMonth() == currentDay.getMonth() && iterDay.getFullYear() == currentDay.getFullYear()) {
            cell.classList.add("cellOggi");
        } else if (iterDay.getDate() == 1) {
            if (iterDay.getDay() == 0) {
                cell.classList.add("cellDomPrimo");
            } else if (iterDay.getDay() == 6) {
                cell.classList.add("cellSabPrimo");
            } else {
                cell.classList.add("cellPrimo");
            }

        } else if (iterDay.getDay() == 0) {
            cell.classList.add("cellDom");
        } else if (iterDay.getDay() == 6) {
            cell.classList.add("cellSab");
        } else {
            cell.classList.add("tb400");
        }

        cell.appendChild(cellText);
        row.appendChild(cell);
        iterDay.setDate(iterDay.getDate() + 1);
    }
    tbl.appendChild(row);
    //document.getElementById("demo").innerHTML = arrayDB.toString();
}

//funzione per visualizzare i mesi nel calendario
function showCalendarMounths(year, mounth, day) {
    let iterDay = new Date(year, mounth, day - preDays); //variabile locale di supporto

    let tbl = document.getElementById("calendar-mounths");
    tbl.innerHTML = "";

    let row = document.createElement("tr");

    let cell = document.createElement("td");
    let cellText = document.createTextNode("");
    cell.appendChild(cellText);
    row.appendChild(cell);

    for (let j = 0; j < daysInCalendar; j++) {

        let cell = document.createElement("td");
        let cellText = document.createTextNode("");

        if (iterDay.getDate() == 1) {
            cellText = document.createTextNode(months[iterDay.getMonth()]);
            cell.colSpan = 3;
            iterDay.setDate(iterDay.getDate() + 2);
        } else {
            cellText = document.createTextNode("");
        }


        if (iterDay.getMonth() % 2) {
            cell.classList.add("cellMese");
        }


        cell.appendChild(cellText);
        row.appendChild(cell);
        iterDay.setDate(iterDay.getDate() + 1);
    }
    tbl.appendChild(row);
    //document.getElementById("demo").innerHTML = arrayDB.toString();
}



//tutto provvisorio da qui in poi
showCalendarRows();


function showCalendarRows() {
    //let numero_strutture = array_strutture.length;  //conto il numero di strutture
    //variabili provvisorie da sostituire con le variabili prese dal php
    //let numero_strutture = 3;
    //let numero_stanze = 1;
    //fine varibili provvisorie da sostituire con le variabili prese dal php
    let stepColore = 2;
    let tbl = document.getElementById("calendar-tbody");
    tbl.innerHTML = " ";

    if (numero_strutture == 0) {
        let row = document.createElement("tr");
        let cell = document.createElement("td");
        let cellText = document.createTextNode("nessuna struttura registrata");
        cell.appendChild(cellText);
        row.appendChild(cell);
        tbl.appendChild(row);
    }

    for (let i = 0; i < numero_strutture; i++) {

        let check_nessuna_stanza = true;
        let row = document.createElement("tr");
        let cell = document.createElement("td");
        let cellText = document.createTextNode(array_strutture[i]["nome"]);
        cell.classList.add("tb200");
        cell.appendChild(cellText);
        row.appendChild(cell);
        tbl.appendChild(row); //creo la cell con il nome della struttura


        for (let j = 0; j < numero_stanze; j++) {


            if (array_stanze[j]["fkstrutturaid"] == array_strutture[i]["id"]) {

                check_nessuna_stanza = false;
                row = document.createElement("tr");
                cell = document.createElement("td");
                cellText = document.createTextNode(array_stanze[j]["nome"]);
                cell.classList.add("tb500");
                cell.appendChild(cellText);
                row.appendChild(cell);
                tbl.appendChild(row); //creo la cell con il nome della stanza

                for (let n = 0; n < daysInCalendar; n++) {
                    //creo le cell del calendario

                    cell = document.createElement("td");
                    /*if (arrayDB[n] == currentDay.toISOString().substr(0, 10)) {
                        //cell.setAttribute("class", "colorazione-sfondo")
                        //cell.classList.add("cellGiornoRiferimento");
                    }*/
                    //PROVVISORIO
                    let prenotazioni_consecutive = false; //bool per controllare se ci sono due prenotazioni consecutive
                    //controllo se la cell nel determinato giorno ha una prenotazione
                    for (let x = 0; x < numero_prenotazioni; x++) { //controllo tutte le prenotazioni


                        if (array_prenotazioni[x]["id_stanza"] == array_stanze[j]["id"]) { //se esiste una prenotazione con l'id stanza che corrisponde all'id della stanza nella riga, allora controllo se la data della cella è uguale ad una data nelle prenotazioni
                            let colore = rainbow(stepColore, stepColore + 1);
                            let colorePrecedente = rainbow(stepColore - 1, stepColore);
                            let coloreSuccessivo = rainbow(stepColore + 1, stepColore + 2);

                            for (let h = 0; h < numero_prenotazioni; h++) { //uso questo ciclo per capire se ci sono due prenotazioni consecutive per colorare in maniera corretta le celle
                                if (array_prenotazioni[h]["data_arrivo"] == arrayDB[n] && array_prenotazioni[x]["data_partenza"] == arrayDB[n]) {
                                    if (array_prenotazioni[h]["id"] != array_prenotazioni[x]["id"]) {

                                        prenotazioni_consecutive = true;

                                    }
                                }
                            }


                            if (array_prenotazioni[x]["data_arrivo"] < arrayDB[n] && arrayDB[n] < array_prenotazioni[x]["data_partenza"]) {
                                cell.style.background = colore;
                            }
                            if (arrayDB[n] == array_prenotazioni[x]["data_partenza"]) {
                                cell.style.background = "linear-gradient(to bottom right, " + colore + " 50%, white 51%)";
                                stepColore++;

                            }
                            if (arrayDB[n] == array_prenotazioni[x]["data_arrivo"]) {

                                if (prenotazioni_consecutive) {

                                    cell.style.background = "linear-gradient(to bottom top, " + colorePrecedente + " 50%, " + colore + " 51%)";
                                    prenotazioni_consecutive = false;
                                } else {
                                    cell.style.background = "linear-gradient(to bottom right, white 50%, " + colore + " 51%)";
                                }
                            }

                        }

                    }
                    //PROVVISORIOs
                    row.appendChild(cell);

                }
            }
        }

        if (check_nessuna_stanza) {
            let row = document.createElement("tr");
            let cell = document.createElement("td");
            let cellText = document.createTextNode("non ci sono stanze in questa struttura");
            cell.appendChild(cellText);
            row.appendChild(cell);
            tbl.appendChild(row);
            stepColore--;
        }

    }
}




function rainbow(numOfSteps, step) {
    // script per assegnare colori diversi alle prenotazioni da visualizzare sul calendario
    var r, g, b;
    var h = step / numOfSteps;
    var i = ~~(h * 6);
    var f = h * 6 - i;
    var q = 1 - f;
    switch (i % 6) {
        case 0:
            r = 1;
            g = f;
            b = 0;
            break;
        case 1:
            r = q;
            g = 1;
            b = 0;
            break;
        case 2:
            r = 0;
            g = 1;
            b = f;
            break;
        case 3:
            r = 0;
            g = q;
            b = 1;
            break;
        case 4:
            r = f;
            g = 0;
            b = 1;
            break;
        case 5:
            r = 1;
            g = 0;
            b = q;
            break;
    }
    var colore = "#" + ("00" + (~~(r * 255)).toString(16)).slice(-2) + ("00" + (~~(g * 255)).toString(16)).slice(-2) + ("00" + (~~(b * 255)).toString(16)).slice(-2);
    return (colore);
}
