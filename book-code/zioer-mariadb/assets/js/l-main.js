//返回虚拟路径支持showModalDialog
function getAppVirtualDir() {
    var reg = new RegExp("(^|/)([^/]+)/", "i");
    if (reg.test(window.location.pathname)) {
        return "/" + RegExp.$2 + "/";
    }
    return "/";
}

function addEvent(obj, evType, fn, useCapture) {
    if (obj.addEventListener)
    { obj.addEventListener(evType, fn, useCapture); return true; }
    if (obj.attachEvent)
        return obj.attachEvent("on" + evType, fn);
    alert("Unable to add event listener for " + evType + " to " + obj.tagName);
}

function WindowsClose(res) {
    if (res.value != null && res.value != "") {
        var result = res.value.split(',');
        if (result[0] == "Save") {
            if (result.length >= 3) {
                RedirectAfterMessage(result[1], result[result.length - 1]);
            }
            else {
                ShowMessage(result[1]);
            }
        }
        else {
            ShowDialog(result[1]);
        }
    }
}
function closePost(res) {
    if (res.value != null && res.value != "") {
        var result = res.value.split(',');
        if (result[0] == "Save") {
            if (result.length >= 3) {
                AutoHideMessage(result[1]);
                __doPostBack('ctl00$cphMain$pager', '1');
            }
            else {
                ShowMessage(result[1]);
            }
        }
        else {
            ShowDialog(result[1]);
        }
    }
}
//显示提示窗
function ShowDialog(txt) {
    $('#alerttext').html(txt);
    $('#alert').dialog('open');
}
//隐藏提示窗
function HideDialog() {
    $('#alert').dialog('close');
}
//显示消息窗
function ShowMessage(txt) {
    $('#message').show().css('opacity', '1'); //to make sure message is visible before dialog show
    $('#messagetext').html(txt);
    $('#message').dialog('open');
    return $('#message');
}
//隐藏消息窗
function HideMessage() {
    $('#message').dialog('close');
}
//显示消息窗2秒后跳转
function RedirectAfterMessage(txt, url) {
    var dialogContainer = ShowMessage(txt);
    dialogContainer.animate({
        opacity: 0.5
    }, 2000, '', function () {
        dialogContainer.dialog('close');
        if (url) {
            location.href = url;
        }
        else {
            window.returnValue = true;
            window.close();
        }
    });
}
function RedirectAfterMessageDate(res) {
    var txt = "";
    if (res.value != null && res.value != "") {
        txt = res.value;
    }
    var url = "PluginManage.aspx";
    var dialogContainer = ShowMessage(txt);
    dialogContainer.animate({
        opacity: 0.5
    }, 2000, '', function () {
        dialogContainer.dialog('close');
        if (url) {
            location.href = url;
        }
        else {
            window.returnValue = true;
            window.close();
        }
    });
}
//自动隐藏消息窗 默认2秒 
function AutoHideMessage(txt, time) {
    var duration = time || 2000;
    var dialogContainer = ShowMessage(txt);
    dialogContainer.animate({
        opacity: 0.5
    }, duration, '', function () {
        dialogContainer.dialog('close');
    });
}
//显示进度条
function ShowProgress() {
    $('#progressbar').progressbar({
        value: 100
    });
    $('#progress').dialog('open');
}
//隐藏进度条
function HideProgress() {
    $('#progress').dialog('close');
}
//显示确认取消对话框
function ShowConfirm(txt) {
    $('#confirm').html(txt);
    $('#confirm').dialog('open');
}
//隐藏确认取消对话框
function HideConfirm() {
    $('#confirm').dialog('close');
}

function InitCheckAll(ckID, cksName) {
    $('#' + ckID + '').click(function () {
        var ck = $(this).get(0);
        $("input[name='" + cksName + "']").each(function (i) {
            this.checked = ck.checked;
        });
    });
}

function HasChecked(cksName) {
    var hasChecked = false;
    $("input[name='" + cksName + "']").each(function (i) {
        if (this.checked) {
            hasChecked = true;
            return;
        }
    });
    return hasChecked;
}

function CheckStringLength(strString, Length) {
    if (strString != null && strString != "") {
        if (strString.replace(/[^\x00-\xff]/g, "xx").length > Length) {
            var realLength = 0;
            for (var i = 0; i < strString.length; i++) {
                if (strString.charCodeAt(i) <= 255 && strString.charCodeAt(i) >= 0) {
                    realLength++;
                }
                else {
                    realLength += 2;
                }
                if (realLength >= Length) {
                    return strString.substring(0, i) + "...";
                }
            }
        }
        else {
            return strString;
        }
    }
}

function getClientName(sName) {
    return 'ctl00$cphMain$' + sName;
}

function getClientId(sId) {
    return 'ctl00_cphMain_' + sId;
}

function initHMSelect(slt, max) {
    for (var i = 0; i < max; i++) {
        var option = new Option($.format('{0:D}', i), $.format('{0:D}', i));
        slt.options.add(option);
    }
}

function OpenWindow(frmWin, Height, Width) {
    var parm = window.showModalDialog(frmWin, '', "dialogHeight:" + Height + ";dialogWidth:" + Width + ";center:yes;status:no;scroll:no");
    return parm;
}

function BindPlayers() {
    var PlayerInfo = document.getElementById(getClientId('hf_SetPlayerStr')).value;
    var temp = PlayerInfo.split('|');
    var divInfo = document.getElementById("divPlayersList");
    var objul = divInfo.getElementsByTagName("UL")[0];

    if (!objul) {
        objul = document.createElement("ul");
    }
    var DivNodeNum = objul.children.length;
    if (DivNodeNum) {
        var li = objul.getElementsByTagName("LI")
        for (var j = DivNodeNum - 1; j >= 0; j--) {
            li[j].removeNode(true);
        }
    }

    for (var i = 0; i < temp.length - 1; i++) {
        if (temp[i] != "") {
            var li = CreatePlayerInfo(temp[i], false);

            objul.appendChild(li);
        }
    }
    divInfo.appendChild(objul);
}

function BindPlayersGroup() {
    var PlayerInfo = document.getElementById(getClientId('hf_SetPlayerStrGroup')).value;
    var temp = PlayerInfo.split('|');
    var divInfo = document.getElementById("divPlayerGroupsList");
    var objul = divInfo.getElementsByTagName("UL")[0];

    if (!objul) {
        objul = document.createElement("ul");
    }
    var DivNodeNum = objul.children.length;
    if (DivNodeNum) {
        var li = objul.getElementsByTagName("LI")
        for (var j = DivNodeNum - 1; j >= 0; j--) {
            li[j].removeNode(true);
        }
    }

    for (var i = 0; i < temp.length - 1; i++) {
        if (temp[i] != "") {
            var li = CreatePlayerInfo(temp[i], false);

            objul.appendChild(li);
        }
    }
    divInfo.appendChild(objul);
}

function CreatePlayerInfo(results, Istrue) {
    var num = results.split(',').length;
    if (Istrue) {
        var tr = document.createElement("tr");
        for (var i = 0; i < num; i++) {
            var td = document.createElement("td");
            if (i == 0) {
                td.setAttribute('width', '10%');
				td.className = "td_center";
                var ckbox = document.createElement("input");
                ckbox.type = "checkbox";
                ckbox.name = "ckBox1";
				//ckbox.className="input_center";
                if (results != "") {
                    ckbox.value = results.split(',')[i];
                }
                td.appendChild(ckbox);
            }
            else {
                td.setAttribute('width', '30%');
                td.style.overflow = "hidden";
                td.innerHTML = CheckStringLength(results.split(',')[i], 32);
            }
            tr.appendChild(td);
        }
        return tr;
    }
    else {
        var i = document.createElement("li");
        i.style.textAlign = "left";
        i.title = results.split(',')[1];
        i.innerHTML = CheckStringLength(results.split(',')[1], 16);
        return i;
    }
}

function AddSendPlayerGroup() {
    var Url = "AddPlayerGroup.aspx";
    var Height = "510px";
    var Width = "700px";
    var parm = window.showModalDialog(Url, window, "dialogHeight:" + Height + ";dialogWidth:" + Width + ";center:yes;status:no;scroll:no");
    return false;
}

function AddSendPlayer(kind) {
    var Url = "";
    switch (kind) {
        case "1":
            Url = "AddSendPlayers.aspx";
            break;
        case "2":
            Url = "../AddSendPlayers.aspx?type=pplayer";
            break;
    }
    var Height = "510px";
    var Width = "700px";
    var parm = window.showModalDialog(Url, window, "dialogHeight:" + Height + ";dialogWidth:" + Width + ";center:yes;status:no;scroll:no");
    return false;
}

function BindPlayersInfo() {
    document.getElementById(getClientId("hf_PlayersInfo")).value = parm.document.getElementById(getClientId("hf_SetPlayerStr")).value;
    PlayersInfo = document.getElementById(getClientId("hf_PlayersInfo")).value;
    var temp = PlayersInfo.split('|');
    var objTable = document.getElementById("PlayersTable");
    var objTbody = objTable.getElementsByTagName("TBODY")[0];
    for (var i = 0; i < temp.length - 1; i++) {
        if (temp[i] != "") {
            var tr = CreatePlayerInfo(temp[i], true);
			var cells = tr.getElementsByTagName("td"); 
			cells[0].className = "td_center";
            objTbody.appendChild(tr);
        }
    }
    $("#divList1").parent("div").css("overflow-y", "scroll");
}

function HidePlayerInfo() {
    var PlayersArray = new Array();
    var temp;
    if (PlayersInfo != "") {
        temp = PlayersInfo.split('|');
    }
    else {
        temp = parm.document.getElementById(getClientId("hf_SetPlayerStr")).value.split('|');
    }
    for (var i = 0; i < temp.length - 1; i++) {
        if (temp[i] != "") {
            PlayersArray.push(temp[i].split(',')[0]);
        }
    }
    var tabPlayer = document.getElementById("grdPlayer");
    if (tabPlayer != null && tabPlayer.rows.length > 0) {
        var rowNum = tabPlayer.rows.length;
        for (i = rowNum - 1; i >= 0; i--) {
            for (j = 0; j < PlayersArray.length; j++) {
                if (tabPlayer.rows[i].cells[0].childNodes[0].value == PlayersArray[j]) {
                    tabPlayer.deleteRow(i);
                    PlayersArray.splice(j, 1);
                    break;
                }
            }
        }
    }
}

function savePlayers() {
    var ckAll = document.getElementsByName("ckAll");
    for (var i = 0; i < ckAll.length; i++) {
        ckAll[i].checked = false;
    }
    var table = document.getElementById("grdPlayer");
    var objTable = document.getElementById("PlayersTable");
    var objTbody = objTable.getElementsByTagName("TBODY")[0];
    if (table.rows.length > 0 && objTbody.rows.length == 0) {
        var ckb = table.getElementsByTagName("input");
        var ckbLength = ckb.length;
        for (var i = ckbLength - 1; i >= 0; i--) {
            if (ckb[i].checked) {
                ckb[i].checked = false;
                ckb[i].name = "ckBox1";
                var newRow = table.rows[i];
				//ckb[i].className = "input_center";
				var cells = newRow.getElementsByTagName("td"); 
				cells[0].className = "td_center";
                objTbody.appendChild(newRow);
            }
        }
    }
    else
    {
        if (table.rows.length > 0 && objTbody.rows.length > 0) {
            if (table.getElementsByTagName("input").length > 0 && objTbody.getElementsByTagName("input").length > 0) {
                for (var j = table.getElementsByTagName("input").length - 1; j >= 0; j--) {
                    if (table.getElementsByTagName("input")[j].checked) {
                        var isExist = false;
                        for (var k = objTbody.getElementsByTagName("input").length - 1; k >= 0; k--) {
                            if (objTbody.getElementsByTagName("input")[k].defaultValue == table.getElementsByTagName("input")[j].defaultValue) {
                                isExist = true;
                                break;
                            }
                            else {
                                continue; 
                            }
                        }
                        if (isExist == false) {
                            table.getElementsByTagName("input")[j].checked = false;
                            table.getElementsByTagName("input")[j].name = "ckBox1";
							//table.getElementsByTagName("input")[j].className = "input_center";
                            var newRow = table.rows[j];
							var cells = newRow.getElementsByTagName("td"); 
							cells[0].className = "td_center";
							objTbody.appendChild(newRow);
							
                        }
                        else {
                            table.deleteRow(j);
                        }
                    }
                }
            }
        }
    }
    cpage = 1;
    setpage();
}

function deletePlayers() {
    if (HasChecked('ckBox1')) {
        var ckAll = document.getElementsByName("ckAll1");
        for (var i = 0; i < ckAll.length; i++) {
            ckAll[i].checked = false;
        }
        var table = document.getElementById("PlayersTable");
        var objTable = document.getElementById("grdPlayer");
        var objTbody = objTable.getElementsByTagName("TBODY")[0];
        if (table.rows.length > 0 && objTbody.rows.length == 0) {
            var ckb = table.getElementsByTagName("input");
            var ckbLength = ckb.length;
            for (var i = ckbLength - 1; i >= 0; i--) {
                if (ckb[i].checked) {
                    ckb[i].checked = false;
                    ckb[i].name = "ckBox";
					//ckb[i].className = "input_center";
					var newRow = table.rows[i];
					var cells = newRow.getElementsByTagName("td"); 
					cells[0].className = "td_center";
                    
                    objTbody.appendChild(newRow);
                }
            }
        }
        else {
            if (table.rows.length > 0 && objTbody.rows.length > 0) {
                for (var j = table.getElementsByTagName("input").length - 1; j >= 0; j--) {
                    if (table.getElementsByTagName("input")[j].checked) {
                        var isExist = false;
                        for (var k = objTbody.getElementsByTagName("input").length - 1; k >= 0; k--) {
                            if (objTbody.getElementsByTagName("input")[k].defaultValue == table.getElementsByTagName("input")[j].defaultValue) {
                                isExist = true;
                                break;
                            }
                            else {
                                continue;
                            }
                        }
                        if (isExist == false) {
                            table.getElementsByTagName("input")[j].checked = false;
                            table.getElementsByTagName("input")[j].name = "ckBox";
                            var newRow = table.rows[j];
                            newRow.className = "";
                            objTbody.appendChild(newRow);
                        }
                        else {
                            table.deleteRow(j);
                        }
                    }
                }
            }
        }
        cpage = 1;
        setpage();
    }
}

function ConSubmitPlay() {
    var objTable = document.getElementById("PlayersTable");
    var tempPlayersInfo = "";
    for (var i = 0; i < objTable.rows.length; i++) {
        for (var j = 0; j < objTable.rows[i].cells.length; j++) {
            if (j == 0 && tempPlayersInfo == "") {
                tempPlayersInfo = objTable.rows[i].cells[j].childNodes[0].value;
            }
            else if (j == 0) {
                tempPlayersInfo = tempPlayersInfo + objTable.rows[i].cells[j].childNodes[0].value;
            }
            else {
                tempPlayersInfo = tempPlayersInfo + "," + objTable.rows[i].cells[j].innerHTML;
            }
        }
        tempPlayersInfo = tempPlayersInfo + "|";
    }
    parm.document.getElementById(getClientId("hf_SetPlayerStr")).value = tempPlayersInfo;
    //parm.document.getElementById("hf_SetPlayerStr").value = document.getElementById("hf_PlayersInfo").value;
    parm.BindPlayers();
    window.close();
}

function BindTimeInfo() {
    var TimeInfo = document.getElementById(getClientId("hf_SetTimeStr")).value;
    var temp = TimeInfo.split('|');
    var objTable = document.getElementById("showDataInfoTable");
    var objTbody = objTable.getElementsByTagName("TBODY")[0];
    var TableNodeNum = objTable.rows.length;
    for (var j = TableNodeNum - 1; j >= 0; j--) {
        objTable.rows[j].removeNode(true);
    }
    for (var i = 0; i < temp.length - 1; i++) {
        if (temp[i] != "") {
            var tr = CreateTimeItem(temp[i]);
            objTbody.appendChild(tr);
        }
    }
    $("#showDataInfo").parent('div').css("overflow-y", "scroll");
}

function SetProjectTime(kind) {
    var result = document.getElementById(getClientId("id")).value;
    var Url = "";
    switch (kind) {
        case "1":
            Url = "ProjectPropretySet.aspx?PJID=" + result;
            break;
        case "2":
            Url = "../ProjectPropretySet.aspx?PJID=" + result;
            break;
    }
    var Height = "405px";
    var Width = "520px";
    var parm = window.showModalDialog(Url, window, "dialogHeight:" + Height + ";dialogWidth:" + Width + ";center:yes;status:no;scroll:no");
    return false;
}

function BindTimeInfoCycle(pre) {
    changeCycleTitle(pre);
    var TimeInfo = document.getElementById(getClientId("hf_SetTimeStr")).value;
    var temp = TimeInfo.split('|');
    var objTable = document.getElementById("showCycleDataInfoTable");
    var objTbody = objTable.getElementsByTagName("TBODY")[0];
    var TableNodeNum = objTable.rows.length;
    for (var j = TableNodeNum - 1; j >= 0; j--) {
        objTable.rows[j].removeNode(true);
    }

    for (var i = 0; i < temp.length - 1; i++) {
        if (temp[i] != "") {
            var tr = CreateCycleInfo(temp[i], temp.lenght - 2);
            objTbody.appendChild(tr);
        }
    }
    $("#showCycleDataInfo").parent('div').css("overflow-y", "scroll");
}

function CreateCycleInfo(results, itemnum) {
    itemnum = itemnum + 1;
    var tr = document.createElement("tr");

    var td2 = document.createElement("td");
    td2.style.textAlign = "center";
    td2.colspan = "2";
    td2.style.width = "75%";
    td2.innerHTML = results.split(',')[0];
    tr.appendChild(td2);


    var td3 = document.createElement("td");
    td3.style.textAlign = "center";
    td3.style.width = "15%";
    td3.innerHTML = results.split(',')[1];
    tr.appendChild(td3);

    var td4 = document.createElement("td");
    td4.style.textAlign = "center";
    td4.style.width = "15%";
    td4.innerHTML = results.split(',')[2];
    tr.appendChild(td4);

    return tr;
}

function changeCycleTitle(cycle) {
    var obj = document.getElementById(getClientId("CycleTitle"));
    if (cycle == lang["Weak_name"])
        obj.innerText = lang["Period_week"];
    else
        obj.innerText = lang["Period_mon"];
}

function GetCheckBoxValue() {
    var value = "";
    var ckBox = document.all('ckBox');
    if (ckBox != null) {
        if (ckBox.length == null) {
            if (ckBox.checked)
                value = ckBox.value;
        }
        else {
            for (var i = 0; i < ckBox.length; i++) {
                if (ckBox[i].checked)
                    value = value + "," + ckBox[i].value;
            }
        }
    }
    if (value.split(',').length > 1) {
        value = value.substring(1);
    }
    return value;
}

function getObjectforId(id) {
    return document.getElementById ? document.getElementById(id) : null;
}
function ProjectPreview(id, resolution, controlid) {
    var ProjectItemNum = getObjectforId(controlid);
    if (ProjectItemNum.value != "0") {
        width = resolution.split('*')[0];
        heigth = resolution.split('*')[1];
        window.open("ProjectPreview.aspx?id=" + id + "&resolution=" + resolution, "", "height=" + heigth + ",width=" + width + ",location=no,menubar=no,fullscreen=yes,resizable=no,status=no,toolbar=no,titlebar=no", "");
    }
    else {
        ShowDialog(lang["Item_isNull"]);
    }
    return false;
}

function xmlHttp() {
    var http = null;
    try {
        http = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) {
        try {
            http = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (oc) {
            http = null
        }
    }
    if (!http && typeof XMLHttpRequest != "undefined") {
        http = new XMLHttpRequest()
    }
    return http;
}

var curLanguage;
function PreviewPageLoad(strLanguage) {
    curLanguage = strLanguage;
    window.document.oncontextmenu = new Function("event.returnValue=false;");
    window.document.onselectstart = new Function("event.returnValue=false;");
    var id = location.search.split('&')[0];
    id = id.substring(4);
    var resolution = location.search.split('&')[1];
    resolution = resolution.substring(11);
    var weburl = "ProjectPreview.aspx?itemId=" + id;
    var xmlhttp = xmlHttp();
    xmlhttp.open("get", weburl, true);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var result = xmlhttp.responseText;
            //alert (result);
            PreviewPage(result, resolution);
        }
    }
    xmlhttp.send(null);
}

var PageNum = 0;
function PreviewPage(strInfo, resolution) {
    var iframe = document.getElementById("PreviewFrame");
    iframe.style.width = resolution.split('*')[0];
    //alert(iframe.style.width);
    iframe.style.height = resolution.split('*')[1];
    //alert(iframe.style.height);
    var InfoArray = strInfo.split(",");
    if (PageNum < InfoArray.length - 1) {
        var UrlAndTime = InfoArray[PageNum].split("|");
        iframe.src = UrlAndTime[0];
        setTimeout("PreviewPage('" + strInfo + "','" + resolution + "')", UrlAndTime[1] * 1000);
        //setTimeout('iframe.src = UrlAndTime[0]', UrlAndTime[1] * 1000);
        PageNum++;
        //alert(PageNum);
    }
    else {
        iframe.src = "Replay.htm?lang=" + curLanguage;
    }
}
function CreateTimeItem(results) {
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    td1.style.textAlign = "center";
    td1.style.width = "20%";
    td1.innerHTML = "&nbsp;";
    tr.appendChild(td1);

    var td2 = document.createElement("td");
    td2.style.textAlign = "center";
    td2.style.width = "20%";
    td2.innerHTML = results.split(',')[0];
    tr.appendChild(td2);

    var td3 = document.createElement("td");
    td3.style.textAlign = "center";
    td3.style.width = "20%";
    td3.innerHTML = results.split(',')[1];
    tr.appendChild(td3);

    var td4 = document.createElement("td");
    td4.style.textAlign = "center";
    td4.style.width = "20%";
    td4.innerHTML = results.split(',')[2];
    tr.appendChild(td4);

    var td5 = document.createElement("td");
    td5.style.textAlign = "center";
    td5.style.width = "20%";
    td5.innerHTML = results.split(',')[3];
    tr.appendChild(td5);
    return tr;
}

//绑定导航栏数据
function BindSetupSet() {
    var projectSetObject = document.getElementById("projectSet");
    if(projectSetObject==undefined || projectSetObject=="" || projectSetObject==null){	
	}else{
		projectSetObject.setAttribute("className", "procenotto");
	}
	
    var publishSetObject = document.getElementById("publishSet");
    if(publishSetObject==undefined || publishSetObject=="" || publishSetObject==null){	
	}else{
		publishSetObject.setAttribute("className", "procenotto");
	}
	
    var projectAuditObject = document.getElementById("projectAudit");
    if(projectAuditObject==undefined || projectAuditObject=="" || projectAuditObject==null){	
	}else{
		projectAuditObject.setAttribute("className", "procenotto");
	}
	
    var projectRepeatObject = document.getElementById("projectRepeat");
    if(projectRepeatObject==undefined || projectRepeatObject=="" || projectRepeatObject==null){	
	}else{
		projectRepeatObject.setAttribute("className", "procenotto");
	}
	
    var publishSuccessObject = document.getElementById("publishSuccess");
    if(publishSuccessObject==undefined || publishSuccessObject=="" || publishSuccessObject==null){	
	}else{
		publishSuccessObject.setAttribute("className", "procesucnotto");
	}
	
    //总共审批层级
    var approveLevel = document.getElementById(getClientId("hf_ApproveLevel")).value;
    if (approveLevel == 0) {
        var projectAuditObject = document.getElementById("projectAudit");
		if(projectAuditObject==undefined || projectAuditObject=="" || projectAuditObject==null){	
		}else{
			projectAuditObject.setAttribute("className", "hidden");
		}
        
        var projectRepeatObject = document.getElementById("projectRepeat");
        if(projectRepeatObject==undefined || projectRepeatObject=="" || projectRepeatObject==null){	
		}else{
			projectRepeatObject.setAttribute("className", "hidden");
		}
		
    }
    else if (approveLevel == 1) {
        var projectRepeatObject = document.getElementById("projectRepeat");
        if(projectRepeatObject==undefined || projectRepeatObject=="" || projectRepeatObject==null){	
		}else{
			 projectRepeatObject.setAttribute("className", "hidden");
		}
    }

}

//节目制作步骤
function NavigateProjectSet() {
    var projectSetObject = document.getElementById("projectSet");
	if(projectSetObject==undefined || projectSetObject=="" || projectSetObject==null){	
		}else{
			projectSetObject.setAttribute("className", "procenow");
		}
}

//发布设置步骤
function NavigatePublishSet() {
    var projectSetObject = document.getElementById("projectSet");
    projectSetObject.setAttribute("className", "proceto");

    var publishSetObject = document.getElementById("publishSet");
    publishSetObject.setAttribute("className", "procenow");
}

//审批步骤
function navigateProjectAudit() {
    var filePath = document.location.pathname;
    var index = filePath.toLowerCase().indexOf("projectaudit.aspx");
    if (index != -1) {
        var curLevel = document.getElementById(getClientId("hf_CurrentAuditLevel")).value;
        if (curLevel == 1) {
            var publishSetObject = document.getElementById("publishSet");
            publishSetObject.setAttribute("className", "proceto");

            var projectAuditObject = document.getElementById("projectAudit");
            projectAudit.setAttribute("className", "procenow");
        }
        else if (curLevel == 2) {
            var projectAuditObject = document.getElementById("projectAudit");
            projectAudit.setAttribute("className", "proceto");

            var projectRepeatObject = document.getElementById("projectRepeat");
            projectRepeatObject.setAttribute("className", "procenow");
        }
    }
}

//节目管理步骤设置
function navigateProjectManage() {
    //审批状态 0表示审批中 1表示已审批
    var approveState = document.location.search.split('&')[1].split('=')[1];
    //审批结果 0表示不通过 1表示已通过
    var approveResult = document.getElementById(getClientId("hf_LastAuditResult")).value;
    //总共审批层级
    var approveLevel = document.getElementById(getClientId("hf_ApproveLevel")).value;
    //当前审批层级
    var curLevel = document.getElementById(getClientId("hf_CurrentAuditLevel")).value;

    //获取步骤对象
    var publishSetObject = document.getElementById("publishSet");
    var projectAuditObject = document.getElementById("projectAudit");
    var projectRepeatObject = document.getElementById("projectRepeat");
    var publishSuccessObject = document.getElementById("publishSuccess");

    //文件路径
    var filePath = document.location.pathname;
    var index = filePath.toLowerCase().indexOf("publishmanage.aspx");
    if (index != -1) {
        if (approveLevel == 0) {
            if (approveResult == 1 || approveResult == "") {
                publishSetObject.setAttribute("className", "proceto");
                publishSuccessObject.setAttribute("className", "procesucnow");
                publishSuccessObject.insertAdjacentText("afterBegin", lang["PublishSuccessful"]);
            }
            else {
                publishSetObject.setAttribute("className", "proceto");
                publishSuccessObject.setAttribute("className", "procesucnow");
                publishSuccessObject.insertAdjacentText("afterBegin", lang["Unpublished"]);
            }
        }
        else if (approveLevel == 1) {
            if (approveState == 0) {
                publishSetObject.setAttribute("className", "proceto");
                projectAuditObject.setAttribute("className", "procenow");
                publishSuccessObject.setAttribute("className", "procesucnotto");
                publishSuccessObject.insertAdjacentText("afterBegin", lang["Unfinished"]);
            }
            else {
                projectAuditObject.setAttribute("className", "proceto");
                publishSuccessObject.setAttribute("className", "procesucnow");
                if (approveResult == 0) {
                    publishSuccessObject.insertAdjacentText("afterBegin", lang["Unpublished"]);
                }
                else {
                    publishSuccessObject.insertAdjacentText("afterBegin", lang["PublishSuccessful"]);
                }
            }
        }
        else {
            if (approveState == 0) {
                if (curLevel == 1) {
                    publishSetObject.setAttribute("className", "proceto");
                    projectAuditObject.setAttribute("className", "procenow");
                    projectRepeatObject.setAttribute("className", "procenotto");
                    publishSuccessObject.setAttribute("className", "procesucnotto");
                    publishSuccessObject.insertAdjacentText("afterBegin", lang["Unfinished"]);
                }
                else if (curLevel == 2) {
                    projectAuditObject.setAttribute("className", "proceto");
                    projectRepeatObject.setAttribute("className", "procenow");
                    publishSuccessObject.setAttribute("className", "procesucnotto");
                    publishSuccessObject.insertAdjacentText("afterBegin", lang["Unfinished"]);
                }
            }
            else {
                projectRepeatObject.setAttribute("className", "proceto");
                publishSuccessObject.setAttribute("className", "procesucnow");
                if (approveResult == 0) {
                    publishSuccessObject.insertAdjacentText("afterBegin", lang["Unpublished"]);
                }
                else {
                    publishSuccessObject.insertAdjacentText("afterBegin", lang["PublishSuccessful"]);
                }
            }
        }
    }
}

function InitCheck(all, name) {
    $("#" + all + "").click(function () {
        $("input[name='" + name + "']").each(function (i, dom) {
            colorchange(this);
        });
    });
    $("input[name='" + name + "']").each(function (i, dom) {
        $(dom).click(function () {
            colorchange(dom);
        });
    });
}

//选中是改变tr对象的背景色
function colorchange(dom) {
	return;
    var p = $(dom.parentNode.parentNode);
    if (dom.checked) {
        if (p.attr("x") == undefined) {
            p.attr("x", p.css("background-color"));
        }
        p.css("background-color", "#597fbe");
        p.css("color", "white");
    } else {
        p.css("background-color", p.attr("x"));
        p.css("color", "black");
    }
}

//对元素mouseover/mouseout的冒泡停止判断（防止内部子元素触发）
function isMouseLeaveOrEnter(e, handler) {
    if (e.type != 'mouseout' && e.type != 'mouseover') return false;
    var reltg = e.relatedTarget ? e.relatedTarget : e.type == 'mouseout' ? e.toElement : e.fromElement;
    while (reltg && reltg != handler)
        reltg = reltg.parentNode;
    return (reltg != handler);
}

//针对LED日志点击内容显示
function ShowMessageOther(obj) {

    var txt = $(obj).attr("SpanText");
    $('#message').show().css('opacity', '1'); //to make sure message is visible before dialog show
    $("#message div[class='ui-widget']").css({ "height": "400px" });
    $("#message div[class='ui-widget']").css({ "overflow-y": "auto" });

    $('#messagetext').html(txt);
    $('#message').dialog('open');
    return $('#message');
}
