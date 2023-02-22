function signin(x) {//herer  using current time for both sign in and sing off
    //for ajax we can create another parameter time which would take value of time from database and a
    //accordingly the js will do rest of the work
    console.log(x);
    var mainrow = document.getElementById(x);
    var tabledata = mainrow.getElementsByTagName("td");
    var signinspan = tabledata[2].firstChild;
    var signoutspan = tabledata[3].firstChild;
    var remark = tabledata[4];
    const btn = signinspan.firstChild;
    const ptag = document.createElement("p");
    const node = document.createTextNode(currtime);
    ptag.setAttribute("class", "text-primary");
    ptag.appendChild(node);
    signinspan.removeChild(btn);
    signinspan.appendChild(ptag);

    var date = new Date();
    var tdate = new Date();
    tdate.setHours(10, 00);//office time of start 10 AM
    if (date.getHours() > tdate.getHours()) {
        console.log("late");
        removeRemark(remark);
        addRemarkbatch(remark, "signin");
        addRemarkbatch(remark, "late");
        signoutspan.firstChild.removeAttribute("disabled");
    }
    else if (date.getHours() = tdate.getHours()) {
        if (date.getMinutes() > tdate.getMinutes()) {
            console.log("late");
            removeRemark(remark);
            addRemarkbatch(remark, "signin");
            addRemarkbatch(remark, "late");

        }
        else {
            console.log("normal");
            removeRemark(remark);
            addRemarkbatch(remark, "signin");
        }
    }
    else {
        console.log("normal");
        removeRemark(remark);
        addRemarkbatch(remark, "signin");
    }
}
function signout(x) {
    var mainrow = document.getElementById(x);
    var tabledata = mainrow.getElementsByTagName("td");
    var signoutspan = tabledata[3].firstChild;
    var remark = tabledata[4];
    const ptag = document.createElement("p");
    const node = document.createTextNode(currtime);
    ptag.setAttribute("class", "text-primary");
    ptag.appendChild(node);
    const btn = signoutspan.firstChild;
    signoutspan.removeChild(btn);
    signoutspan.appendChild(ptag);

    var date = new Date();
    var closingdate = new Date();
    closingdate.setHours(17, 00);//closing time of start 17 PM

    if (date.getHours() < closingdate.getHours()) {
        console.log("halfday");
        removeRemark(remark);
        removeRemark(remark);
        addRemarkbatch(remark, "halfday");
    }
    else if (date.getHours() == closingdate.getHours()) {
        if (date.getMinutes() > closingdate.getMinutes() + 30) {
            console.log("overtime");
            removeRemark(remark);
            removeRemark(remark);
            addRemarkbatch(remark, "overtime");
            addRemarkbatch(remark, "present");
        }
        else {
            console.log("present");
            removeRemark(remark);
            removeRemark(remark);
            addRemarkbatch(remark, "present");
            //addRemarkbatch(remark, "signin");
        }
    }
    else {
        console.log("overtime");
        removeRemark(remark);
        removeRemark(remark);
        addRemarkbatch(remark, "overtime");
        addRemarkbatch(remark, "present");
    }

}
function addRemarkbatch(tablecolumn, remark) {
    if (remark == "late") {
        const spantaglate = document.createElement("span");
        spantaglate.setAttribute("class", "badge text-dark bg-warning");
        const late = document.createTextNode("Late");
        spantaglate.appendChild(late);
        tablecolumn.appendChild(spantaglate);

    }
    else if (remark == "signin") {
        const spantagsignin = document.createElement("span");
        spantagsignin.setAttribute("class", "badge text-dark bg-primary");
        const signined = document.createTextNode("Signed");
        spantagsignin.appendChild(signined);
        tablecolumn.appendChild(spantagsignin);
    }
    else if (remark == "halfday") {
        const spantaghalfday = document.createElement("span");
        spantaghalfday.setAttribute("class", "badge text-dark bg-warning");
        const halfday = document.createTextNode("Halfday");
        spantaghalfday.appendChild(halfday);
        tablecolumn.appendChild(spantaghalfday);
    }
    else if (remark == "present") {

        const spantagpresent = document.createElement("span");
        spantagpresent.setAttribute("class", "badge text-light bg-success");
        const present = document.createTextNode("Present");
        spantagpresent.appendChild(present);
        tablecolumn.appendChild(spantagpresent);
    }
    else if (remark == "overtime") {
        const spantagovertime = document.createElement("span");
        spantagovertime.setAttribute("class", "badge text-dark bg-secondary");
        const overtime = document.createTextNode("Overtime");
        spantagovertime.appendChild(overtime);
        tablecolumn.appendChild(spantagovertime);
    }
}
function removeRemark(tablecolumn) {

    console.log("remarks removed");
    tablecolumn.removeChild(tablecolumn.firstChild);
}