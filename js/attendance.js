function signinUpdateDom(x, datetimeobj, attendid) {//taking id of row,date object and attendance id to be set of sigup buttons
    console.log(x);
    var siginobj = { late: false };
    var mainrow = document.getElementById(x);
    var tabledata = mainrow.getElementsByTagName("td");
    var signinspan = tabledata[3].firstChild;
    var signoutspan = tabledata[4].firstChild;
    var remark = tabledata[5];
    const btn = signinspan.firstChild;
    const ptag = document.createElement("p");
    const node = document.createTextNode(getUserformatTime(datetimeobj));
    ptag.setAttribute("class", "text-primary");
    ptag.appendChild(node);
    signinspan.removeChild(btn);
    signinspan.appendChild(ptag);

    var datetimeobj = new Date();
    var tdate = new Date();
    tdate.setHours(10, 00);//office time of start 10 AM
    if (datetimeobj.getHours() > tdate.getHours()) {
        removeRemark(remark);
        addRemarkbatch(remark, "signin");
        addRemarkbatch(remark, "late");
        siginobj["late"] = true;
        signoutspan.firstChild.removeAttribute("disabled");
    }
    else if (datetimeobj.getHours() == tdate.getHours()) {
        if (datetimeobj.getMinutes() > tdate.getMinutes()) {
            removeRemark(remark);
            addRemarkbatch(remark, "signin");
            addRemarkbatch(remark, "late");
            siginobj["late"] = true;
            signoutspan.firstChild.removeAttribute("disabled");

        }
        else {

            removeRemark(remark);
            addRemarkbatch(remark, "signin");
            signoutspan.firstChild.removeAttribute("disabled");
        }
    }
    else {

        removeRemark(remark);
        addRemarkbatch(remark, "signin");
        signoutspan.firstChild.removeAttribute("disabled");
    }
    signoutspan.firstChild.setAttribute("id", attendid);
    return siginobj;
}
function signoutUpdateDom(x, datetimeobj) {
    var signoutobj = { halfday: false, overtime: false, present: false, totalot: 0 };
    var mainrow = document.getElementById(x);
    var tabledata = mainrow.getElementsByTagName("td");
    var signoutspan = tabledata[4].firstChild;
    var remark = tabledata[5];
    const ptag = document.createElement("p");
    const node = document.createTextNode(getUserformatTime(datetimeobj));
    ptag.setAttribute("class", "text-primary");
    ptag.appendChild(node);
    const btn = signoutspan.firstChild;
    signoutspan.removeChild(btn);
    signoutspan.appendChild(ptag);
    var datetimeobj = new Date();
    var closingdate = new Date();
    closingdate.setHours(17, 00);//closing time of start 17 PM

    if (datetimeobj.getHours() < closingdate.getHours()) {

        removeRemark(remark);
        removeRemark(remark);
        addRemarkbatch(remark, "halfday");
        signoutobj["halfday"] = true;
    }
    else if (datetimeobj.getHours() == closingdate.getHours()) {
        if (datetimeobj.getMinutes() > closingdate.getMinutes() + 30) {
            removeRemark(remark);
            removeRemark(remark);
            addRemarkbatch(remark, "overtime");
            addRemarkbatch(remark, "present");
            signoutobj["present"] = true;
            signoutobj["overtime"] = true;
            var totalot = getDifferenceeinHour(closingdate, datetimeobj);
            signoutobj["totalot"] = totalot;
        }
        else {
            removeRemark(remark);
            removeRemark(remark);
            addRemarkbatch(remark, "present");
            signoutobj["present"] = true;
            //addRemarkbatch(remark, "signin");
        }
    }
    else {
        removeRemark(remark);
        removeRemark(remark);
        addRemarkbatch(remark, "overtime");
        addRemarkbatch(remark, "present");
        signoutobj["overtime"] = true;
        signoutobj["present"] = true;
        var totalot = getDifferenceeinHour(closingdate, datetimeobj);
        signoutobj["totalot"] = totalot;
    }
    return signoutobj;
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
    tablecolumn.removeChild(tablecolumn.firstChild);
}

async function signin(elename) {
    let currdate = new Date();
    var resobj = signinUpdateDom(elename, currdate);
    var tdate = getDBdate(new Date());
    var time = getcurrTime();
    let delresp = await fetch("/HR-Management-System/api/attendanceAPI.php?type=signin&empid=" + elename + "&date=" + tdate + "&signintime=" + time + "&islate=" + resobj.late);
    let resjson = await delresp.json();
    if (resjson.status == "success") {
        var mainrow = document.getElementById(elename);
        var tabledata = mainrow.getElementsByTagName("td");
        var signoutspan = tabledata[4].firstChild;
        signoutspan.firstChild.setAttribute("id", resjson.attendid);//SETTING ATTENDID RETURNED BY API AS ID OF SIGNOUT BTN
    }
}
async function signout(elename, attendance_id) {
    let currdate = new Date();
    let resobj = signoutUpdateDom(elename, currdate);
    var time = getcurrTime();
    let delresp = await fetch("/HR-Management-System/api/attendanceAPI.php?type=signout&attendid=" + attendance_id + "&signouttime=" + time + "&isHalfday=" + resobj.halfday + "&isPresent=" + resobj.present + "&isOvertime=" + resobj.overtime + "&totalot=" + resobj.totalot);
    let resjson = await delresp.json();
}

function getDifferenceeinHour(obj1, obj2) {
    var diff = obj2.getTime() - obj1.getTime();
    var msec = diff;
    var hh = Math.floor(msec / 1000 / 60 / 60);
    return hh;
}
async function getTodaysData() {
    var tdate = getDBdate(new Date());//todays date as db fromat
    let daydataresp = await fetch("/HR-Management-System/api/attendanceAPI.php?type=daydata&date=" + tdate);
    let resultAsjson = await daydataresp.json();
    for (let i = 0; i < resultAsjson.data.length; i++) {
        var sidate = new Date(tdate + "T" + resultAsjson.data[i].attendance_sign_in);//converting db time to iso formate for constructing date object
        if (resultAsjson.data[i].attendance_sign_out != null) {
            var sodate = new Date(tdate + "T" + resultAsjson.data[i].attendance_sign_out);
            signoutUpdateDom(resultAsjson.data[i].fkemployee_id, sodate);
        }
        signinUpdateDom(resultAsjson.data[i].fkemployee_id, sidate, resultAsjson.data[i].attendance_id);//passing values to update dom(signindom)
    }

}