var currtime;
var currdate;
function viewdate() {//userformat
    const today = new Date();
    document.getElementById("date").innerHTML = currdate = today.toLocaleDateString();
    updateClock();
}
function getDBdate(today) {//returning date for db purpose
    const yyyy = today.getFullYear();
    let mm = today.getMonth() + 1; // Months start at 0!
    let dd = today.getDate();
    if (dd < 10) dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;
    let formatdate = yyyy + '-' + mm + '-' + dd;
    return formatdate;
}
function updateClock() {
    const today = new Date();
    document.getElementById("time").innerHTML = currtime = getUserformatTime(today);
}
function getcurrTime() {//database format time
    let today = new Date();
    return today.toLocaleTimeString();
}
function getUserformatTime(datetimeobj) {
    let time = datetimeobj.toLocaleTimeString('en-US', { hour: "numeric", minute: "numeric" });
    return time;
}