var currtime;
var currdate;
function viewdate() {
    const today = new Date();
    const yyyy = today.getFullYear();
    let mm = today.getMonth() + 1; // Months start at 0!
    let dd = today.getDate();

    if (dd < 10) dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;

    const formattedToday = dd + '/' + mm + '/' + yyyy;
    document.getElementById("date").innerHTML = currdate = formattedToday;
    updateClock();
}
function updateClock() {
    const today = new Date();
    document.getElementById("time").innerHTML = currtime = today.toLocaleTimeString('en-US', { hour: "numeric", minute: "numeric" });
}